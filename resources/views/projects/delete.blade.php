@extends('layouts.master')

@push('head')
    <link href='/css/p4.css' rel='stylesheet'>
@endpush

@section('title')
    Confirm deletion: {{ $project-> upgrade_type}}
@endsection

@section('content')
    <h1>Confirm deletion</h1>

    <p>Are you sure you want to delete <strong>{{ $project->upgrade_type }}</strong>?</p>

    <form method='POST' action='/projects/{{ $project->id }}'>
        {{ method_field('delete') }}
        {{ csrf_field() }}
        <input type='submit' value='Yes, delete Project!' class='btn btn-danger btn-small'>
    </form>

    <p class='cancel'>
        <a href='/projects/{{ $project->id }}'>No, do not delete the Project.</a>
    </p>

@endsection