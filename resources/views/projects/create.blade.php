@extends('layouts.master')

@section('title')
    New Project
@endsection

@push('head')
    <link href='/css/form.css' type='text/css' rel='stylesheet'>
@endpush


@section('content')

    <h1>Add a new Project</h1>

    <form method='POST' action='/projects'>
        {{ csrf_field() }}

        @include('projects.projectFormInputs')

        <input type='submit' value='Add a Project' class='btn btn-primary'>
    </form>

    @include('modules.error-form')

@endsection