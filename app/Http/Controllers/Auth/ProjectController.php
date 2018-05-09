<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Log;
use App\Framesize;
use App\Project;
use App\Tag;

class ProjectController extends Controller
{
    /*
     * GET /projects
     */
    public function index()
    {
        $projects = Project::orderBy('Upgrade_Type')->get();

        return view('projects.index')->with([
            'projects' => $projects,

        ]);
    }

    /*
     * GET /projects/{id}
     */
    public function show($id)
    {
        $project = Project::find($id);

        if (!$project) {
            return redirect('/projects')->with(
                ['alert' => 'Project ' . $id . ' not found.']
            );
        }

        return view('projects.show')->with([
            'project' => $project
        ]);
    }

    /**
     * Show the form to create a new project
     * GET /project/create
     */
    public function create(Request $request)
    {
        {
            $tags = Tag::orderBy('name')->get();
            $tagsForCheckboxes = [];

            foreach ($tags as $tag) {
                $tagsForCheckboxes[$tag->id] = $tag->name;
            }
        }

        $framesizes = Framesize::orderBy('size')->get();

        $framesizesForDropdown = [];
        foreach ($framesizes as $framesize) {
            $framesizesForDropdown [$framesize->id] = $framesize->size;
        }

        return view('projects.create')->with([
            'framesizesForDropdown' => $framesizesForDropdown,
            'tagsForCheckboxes' => $tagsForCheckboxes,
            'project' => new Project(),
            'tags' => [],
        ]);
    }

    /**
     * Process the form to create a new project
     * POST /
     */

    public function store(Request $request)
    {
        # Custom validation messages
        $messages = [
            'upgrade_type_id.required' => 'The unit type is required.',
        ];

        $this->validate($request, [
            'upgrade_type' => 'required',
            'framesize_id' => 'required',
            'original_control' => 'required',
            'fuel_type' => 'required',
            'operation' => 'required',

        ], $messages);

        # Save the project to the database
        $project = new Project();
        $project->upgrade_type = $request->upgrade_type;
        $project->framesize_id = $request->framesize_id;
        $project->original_control = $request->original_control;
        $project->fuel_type = $request->fuel_type;
        $project->operation = $request->operation;
        $project->save();

        $project->tags()->sync($request->input('tags'));

        # Send the user back to the page to add a project; include the upgrade_type as part of the redirect
        # so we can display a confirmation message on that page
        return redirect('/projects/create')->with([
            'alert' => 'Your Project ' . $project->upgrade_type . ' was successfully added.'
        ]);
    }

    public function edit(Request $request, $id)
    {
        {
            $tags = Tag::orderBy('name')->get();
            $tagsForCheckboxes = [];

            foreach ($tags as $tag) {
                $tagsForCheckboxes[$tag->id] = $tag->name;
            }
        }
        $framesizes = Framesize::orderBy('size')->get();
        $project = Project::find($id);

        $framesizesForDropdown = [];
        foreach ($framesizes as $framesize) {
            $framesizesForDropdown [$framesize->id] = $framesize->size;
        }

        return view('projects.edit')->with([
            'framesizesForDropdown' => $framesizesForDropdown,
            'tagsForCheckboxes' => $tagsForCheckboxes,
            'tags' => $project->tags()->pluck('tags.id')->toArray(),
            'project' => $project
        ]);
    }

    /* Process the form to edit an existing projects
    * PUT /projects/{id} */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'upgrade_type' => 'required',
            'framesize_id' => 'required',
            'original_control' => 'required',
            'fuel_type' => 'required',
            'operation' => 'required',
        ]);

        # Fetch the project we want to update
        $project = Project::find($id);

        #Update Data

        $project->upgrade_type = $request->upgrade_type;
        #$project->frame_size = $request->frame_size_id;
        $project->framesize_id = $request->framesize_id;
        $project->original_control = $request->original_control;
        $project->fuel_type = $request->fuel_type;
        $project->operation = $request->operation;
        $project->tags()->sync($request->input('tags'));
        $project->save();

        # Send the user back to the edit page in case they want to make more edits
        return redirect('/projects/' . $id . '/edit')->with([
            'alert' => 'Your changes were saved'
        ]);
    }

    public function delete($id)
    {
        $project = Project::find($id);

        if (!$project) {
            return redirect('/projects')->with('alert', 'Project not Found');
        }

        return view('projects.delete')->with([
            'project' => $project,
        ]);
    }

    /** * Actually deletes the project
     * DELETE /projects/{id}/delete
     */
    public function destroy($id)
    {
        $project = Project::find($id);

        # Before we delete the project we have to delete any tag associations
        $project->tags()->detach();

        $project->delete();

        return redirect('/projects')->with([
            'alert' => '“' . $project->upgrade_type . '” was deleted.'
        ]);
    }
}