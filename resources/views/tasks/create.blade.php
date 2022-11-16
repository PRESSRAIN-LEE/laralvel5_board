@extends('layout')

@section('title', 'Create Tasks')

@section('contents')
    <h1>Create Tasks</h1>
    <form action="/tasks" method="POST">
        @csrf
        <label for="title">title: </label>
        <input type="text" name="title" id="title"><br>
        <label for="body">body: </label>
        <textarea name="body" id="body" cols="30" rows="10"></textarea><br>
        <button>Save</button>
    </form>
@endsection