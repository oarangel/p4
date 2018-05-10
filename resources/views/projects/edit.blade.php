@extends('layouts.master')

@section('title')
    Edit Project
@endsection

@push('head')
    <link href='/css/form.css' type='text/css' rel='stylesheet'>
@endpush


@section('content')

    <h1>Edit a Project</h1>

    <form method='POST' action='/projects/{{ $project->id }}'>
        {{ method_field('put') }}
        {{ csrf_field() }}

        <div class='details'>* Required fields</div>

        <div>
        <label for='upgrade_type'>* Upgrade Type</label>
        <input type='text' name='upgrade_type' id='upgrade_type' value='{{ old('upgrade_type', $project->upgrade_type) }}'>
        @include('modules.error-field', ['field' => 'upgrade_type'])
        </div>
        {{--
        <div>
        <label for='frame_size'>* Frame Size </label>
        <select name='frame_size' id='framesize_id'>
            <option value='framesize_id'> {{ old('framesize_id', $project->framesize_id) }}...</option>
            <option value='9FA'> Frame 9FA</option>
            <option value='1'> Frame 7FA</option>
            <option value='7EA'> Frame 7EA</option>
            <option value='71B'> Frame 71B</option>
            <option value='6FA'> Frame 6FA</option>
            <option value='61B'> Frame 61B</option>
            <option value='51P'> Frame 51P</option>
        </select>
        @include('modules.error-field', ['field' => 'framesize_id'])
        </div>--}}

            <label for='framesize_id'>* Framesize</label>
            <select name='framesize_id' id='framesize_id'>
                <option value=''>Choose one...</option>
                @foreach($framesizesForDropdown as $id => $framesizeName)
                    {{--   <option value='{{ $id }}' {{ (old('framesize_id', $project->$framesize_id) == $id) ? 'selected' : '' }}>{{ $framesizeName }}</option>--}}
                    <option value='{{ $id }}'> {{ $framesizeName }}</option>
                @endforeach
            </select>
            @include('modules.error-field', ['field' => 'framesize_id'])


        <div>
        <label for='original_control'>* Original Control</label>
        <input type='text' maxlength='8' name='original_control' id='original_control' value='{{ old('original_control', $project->original_control) }}'>
        @include('modules.error-field', ['field' => 'original_control'])
        </div>

        <div>

        <label for='fuel_type'>* Fuel Type </label>
        <select name='fuel_type' id='fuel_type'>
            <option value='fuel_type'> {{ old('fuel_type', $project->fuel_type) }}..</option>
            <option value='Natural Gas'> Natural Gas</option>
            <option value='Liquid'> Liquid</option>
            <option value='Dual'> Dual</option>
        </select>
        @include('modules.error-field', ['field' => 'original_control'])
        </div>

        <label for='operation'>* Operation</label>
        <input type='text' maxlength='4' name='operation' id='operation' value='{{ old('operation', $project->operation) }}'>
        @include('modules.error-field', ['field' => 'operation'])

        @foreach($tagsForCheckboxes as $tagId => $tagName)
            <ul class='remove'>
                <li>
                    <label>
                        <input
                            {{ (in_array($tagId, $tags)) ? 'checked' : '' }}
                            type='checkbox'
                            name='tags[]'
                            value='{{ $tagId }}'>
                        {{ $tagName }}
                    </label>
                </li>
            </ul>
        @endforeach

        <input type='submit' value='Save Changes' class='btn btn-primary'>
    </form>

    @include('modules.error-form')



@endsection

