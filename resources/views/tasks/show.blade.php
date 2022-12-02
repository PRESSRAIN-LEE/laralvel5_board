@extends('layout')

@section('title', 'Task View')

@section('contents')
    <h1>Task Detail</h1>
    title: {{ $task->title }} <br>
    body: {{ $task->body }}
@endsection