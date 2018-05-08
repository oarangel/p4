<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Log;
use App\Framesize;
use App\Project;


class ProjectController extends Controller
{
    /*
     * GET /projects
     */
    public function index()
    {
        $projects = Project::orderBy('Upgrade_Type')->get();

        # Query the database to get the last 3 projects added
        # $newProjects = Project::latest()->limit(3)->get();

        # [Better] Query the existing Collection to get the last 3 books added
        $newProjects = $projects->sortByDesc('created_at')->take(3);

        return view('projects.index')->with([
            'projects' => $projects,
            'newProjects' => $newProjects,
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
                ['alert' => 'Project ' .$id. ' not found.']
            );
        }

        return view('projects.show')->with([
            'project' => $project
        ]);
    }

    public function search(Request $request)
    {
        # Start with an empty array of search results; projects that
        # match our search query will get added to this array
        $searchResults = [];

        # Store the searchTerm in a variable for easy access
        # The second parameter (null) is what the variable
        # will be set to *if* searchTerm is not in the request.
        $searchTerm = $request->input('searchTerm', null);

        # Only try and search *if* there's a searchTerm
        if ($searchTerm) {
            # Open the books.json data file
            # database_path() is a Laravel helper to get the path to the database folder
            # See https://laravel.com/docs/helpers for other path related helpers
            $booksRawData = file_get_contents(database_path('/books.json'));

            # Decode the book JSON data into an array
            # Nothing fancy here; just a built in PHP method
            $books = json_decode($booksRawData, true);

            # Loop through all the book data, looking for matches
            # This code was taken from v0 of foobooks we built earlier in the semester
            foreach ($books as $title => $book) {
                # Case sensitive boolean check for a match
                if ($request->has('caseSensitive')) {
                    $match = $title == $searchTerm;
                    # Case insensitive boolean check for a match
                } else {
                    $match = strtolower($title) == strtolower($searchTerm);
                }

                # If it was a match, add it to our results
                if ($match) {
                    $searchResults[$title] = $book;
                }
            }
        }

        # Return the view, with the searchTerm *and* searchResults (if any)
        return view('books.search')->with([
            'searchTerm' => $searchTerm,
            'caseSensitive' => $request->has('caseSensitive'),
            'searchResults' => $searchResults
        ]);
    }

    /**
     * Show the form to create a new book
     * GET /books/create
     */

        public function create(Request $request)
    {
        return view('projects.create')->with([
            'project' => new Project(),
        ]);




        #    'project' => new Project()]);
    }

    /**
     * Process the form to create a new book
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
            'frame_size' => 'required',
            'original_control' => 'required',
            'fuel_type' => 'required',
            'operation' => 'required',

        ], $messages);

        # Save the project to the database
        $project = new Project();
        $project->upgrade_type = $request->upgrade_type;
        #$project->frame_size = $request->frame_size_id;
        $project->frame_size = $request->frame_size;
        $project->original_control = $request->original_control;
        $project->fuel_type = $request->fuel_type;
        $project->operation = $request->operation;
        $project->save();

        #$project->tags()->sync($request->input('tags'));

        # Logging code just as proof of concept that this method is being invoked
        # Log::info('Add the book ' . $book->title);

        # Send the user back to the page to add a project; include the upgrade_type as part of the redirect
        # so we can display a confirmation message on that page
        return redirect('/projects/create')->with([
            'alert' => 'Your Project ' . $project->upgrade_type . ' was successfully added.'
        ]);
    }

    /**
     * Show the form to edit an existing book
     * GET /books/{id}/edit
     */
    public function edit($id)
    {
        # Get this book and eager load its tags
        #$book = Book::with('tags')->find($id);
        $project = Project::find($id);
        # Handle the case where we can't find the given project
        if (!$project) {
            return redirect('/projects')->with(
                ['alert' => 'Project ' . $id . ' not found.']
            );
        }

        # Show the project edit form
        return view('projects.edit')->with(['project' => $project]);
    }

    /* Process the form to edit an existing projects
    * PUT /projectss/{id} */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'upgrade_type' => 'required',
            'frame_size' => 'required',
            'original_control' => 'required',
            'fuel_type' => 'required',
            'operation' => 'required',
        ]);

        # Fetch the project we want to update
        $project = Project::find($id);

        #Update Data

        $project->upgrade_type = $request->upgrade_type;
        #$project->frame_size = $request->frame_size_id;
        $project->frame_size = $request->frame_size;
        $project->original_control = $request->original_control;
        $project->fuel_type = $request->fuel_type;
        $project->operation = $request->operation;
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
     * DELETE /books/{id}/delete
     */
    public function destroy($id)
    {
        $project = Project::find($id);

        # Before we delete the book we have to delete any tag associations
        #$project->tags()->detach();

        $project->delete();

        return redirect('/projects')->with([
            'alert' => '“' . $project->upgrade_type . '” was deleted.'
        ]);
    }
}