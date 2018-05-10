@extends('layouts.master')

@section('title')
    {{ $project->upgrade_type }}
@endsection

@

@section('content')

    <style>
        table, th, td {
            border: 1px solid black; margin: auto; text-align: center; padding: 7px;
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
        </thead>

        <tbody>
                <tr>
                    <td>{{$project->id }} </td>
                    <td>{{$project->upgrade_type }}</td>
                    <td>{{$project->frame_size }}</td>
                    <td>{{ $project->original_control }}</td>
                    <td>{{ $project->fuel_type }}</td>
                    <td>{{ $project->operation }}</td>
                </tr>


        </tbody>
    </table>
@endsection