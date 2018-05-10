@extends('layouts.master')

@push('head')
    <link href='/css/p4.css' rel='stylesheet'>
@endpush

@section('title')



    All the Projects
@endsection

@section('content')

    {{--}}<img src='images/controls-markvie_pc.png' alt='MarkVie Panel'>--}}

    <h1>All Combustion Upgrade Projects</h1>
    <style>
        table, th, td {
            border: 1px solid black; margin: auto; text-align: center; padding: 5px;
        }
    </style>
    <table>
        <thead>
            <tr>
                <th> Project   </th>
                <th> Type of Unit </th>
                <th> Frame Size </th>
                <th> Original Control </th>
                <th> Fuel Type </th>
                <th> Operation </th>
                <th> Edit </th>
                <th> Delete </th>

        </thead>

        <tbody>
    @if(count($projects) > 0)
        @foreach($projects as $project)

         <tr>
            <td>{{$project->id }} </td>
            <td>{{$project->upgrade_type }}</td>
             <td>{{$project->framesize_id }}</td>
            <td>{{ $project->original_control }}</td>
             <td>{{ $project->fuel_type }}</td>
             <td>{{ $project->operation }}</td>
             <td><a href='/projects/{{ $project->id }}/edit'><i class="fas fa-trash-alt"></i> Edit</a></td>
             <td><a href='/projects/{{ $project->id }}/delete'><i class="fas fa-trash-alt"></i> Delete</a></td>
         </tr>

        @endforeach
    @endif
        </tbody>
    </table>

@endsection
