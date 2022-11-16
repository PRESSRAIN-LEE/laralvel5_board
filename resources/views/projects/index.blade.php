@extends('layout')

@section('contents')
    <h1> Project...</h1>
    @foreach ( $projects as $project)
        제목: {{ $project->title }} <br>
        내용: {{ $project->description }} <br> <br>
    @endforeach
@endsection