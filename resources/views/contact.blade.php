@extends('layout')

@section('title')
    Contact
@endsection

@section('contents')
<ul>
    @foreach ($books as $book)
        <li>{{ $book }}</li>
        {{-- <li><?#=$book;?></li> --}}
    @endforeach
</ul>
@endsection