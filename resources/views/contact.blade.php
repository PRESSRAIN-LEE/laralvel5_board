@extends('layout')

@section('title')
    Contact
@endsection

<<<<<<< HEAD
@section('content')
    Contact Contents1
=======
@section('contents')
<ul>
    @foreach ($books as $book)
        <li>{{ $book }}</li>
        {{-- <li><?#=$book;?></li> --}}
    @endforeach
</ul>
>>>>>>> 05be93f9353a951ccee3be3f08b76db6f57d3107
@endsection