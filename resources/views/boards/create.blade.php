@extends('layout')

@section('title', '게시판 글쓰기')

@section('contents')
    <h1>게시판 글쓰기</h1>
    <form action="/boards" method="POST">
        @csrf
        <label for="title">제목: </label>
        <input type="text" name="title" id="title"><br>

		<label for="title">이름: </label>
        <input type="text" name="name" id="name"><br>

        <label for="body">내용: </label>
        <textarea name="body" id="body" cols="30" rows="10"></textarea><br>

        <button>저장</button>
        <a href="{{ url('boards') }}">목록</a>
    </form>
@endsection