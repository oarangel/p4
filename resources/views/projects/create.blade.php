@extends('layouts.master')

@section('title')
    New Project
@endsection

@push('head')
    <link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css'
          rel='stylesheet' integrity='sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm'
          crossorigin='anonymous'>
    <link href='/css/form.css' type='text/css' rel='stylesheet'>
@endpush


@section('content')

    <h1>Add a new Project</h1>

    <form method='POST' action='/projects'>
        {{ csrf_field() }}

        @include('projects.projectFormInputs')

        <input type='submit' value='Add a Project' class='btn btn-primary'>
    </form>
    <div>
    @include('modules.error-form')
    </div>
@endsection