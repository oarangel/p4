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
            border: 1px solid black; margin: auto; text-align: center;%; padding: 5px;
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
    @if(count($projects) > 0)
        @foreach($projects as $project)
         <tr>
            <td>{{$project->id }} </td>
            <td>{{$project->Upgrade_Type }}</td>
             <td>{{$project->Frame_Size }}</td>
            <td>{{ $project->Original_Control }}</td>
             <td>{{ $project->Fuel_Type }}</td>
             <td>{{ $project->Operation }}</td>
         </tr>

        @endforeach
    @endif
        </tbody>
    </table>

@endsection
