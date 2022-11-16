@extends('layout')

@section('title')
    게시판
@endsection

@section('contents')
    <h1>게시판 List</h1>
    <ul>
        {{-- @foreach ( $tasks as $task)
            <li>title: {{ $task->title }} Created at: {{ $task->title }}</li>
        @endforeach --}}
    </ul>
	<a href='{{ url('boards/create') }}'>글쓰기</a>
@endsection