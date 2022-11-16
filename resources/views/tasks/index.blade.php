@extends('layout')

@section('title')
    Tasks
@endsection

@section('contents')
    <h1>Tasks List</h1>
    <ul>
        @foreach ( $tasks as $task)
            <li>title: {{ $task->title }} Created at: {{ $task->title }}</li>
        @endforeach
    </ul>
@endsection