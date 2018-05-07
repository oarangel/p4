@extends('layouts.master')

@push('head')
    <link href='/css/p4.css' rel='stylesheet'>
@endpush

@section('title')
    <img src='images/Oscar_Rangel.jpg' alt='Oscar Rangel Photograph' width="250">


    All the Projects
@endsection

@section('content')

    <img src='images/controls-markvie_pc.png' alt='MarkVie Panel'>

    <h1>All Combustion Upgrade Projects</h1>
    <table>
        <thead>
            <tr>
                <th> Project </th>
                <th> Type of Unit </th>
                <th> Frame Size </th>
                <th> Original Control </th>
        </thead>

        <tbody>
    @if(count($projects) > 0)
        @foreach($projects as $project)
         <tr>
            <td>{{$project->id }} </td>
            <td>{{$project->Upgrade_Type }}</td>
             <td>{{$project->Frame_Size }}</td>
            <td>{{ $project->Original_Control }}</td>
         </tr>

        @endforeach
    @endif
        </tbody>
    </table>

@endsection
