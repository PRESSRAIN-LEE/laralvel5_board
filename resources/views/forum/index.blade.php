@extends('layouts.forum')

@section('content')
  <div calss='container'>
    <div class="row my-3">
      <div class="col-12">
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
          <a href="{{url('/')}}/create" class="btn btn-success" type="button">New Post</a>
        </div>
      </div>
    </div>
    <hr>

    @php
      $categories = App\Category::orderby('title', 'asc')
      ->get();     
    @endphp

    @if(count($categories) > 0)
      @foreach($categories as $category)
        @php
          $posts = App\Post::where('category_id', $category->id)
          ->orderby('created_at', 'desc')
          ->limit(3)    //take(3)
          ->get();
        @endphp

        @if(count($posts) > 0)
        <div clcass='row mt-3'>
          <div class='col-12'>
            <h4>{{$category->title}}</h4>
            <ul class="list-group">
              @foreach($posts as $post)
              <li class="list-group-item list-group-item-action">
                <a href="{{url('/')}}/{{$post -> id}}/view" class='text-dark'>{{$post -> title}}</a>
                <span class="badge rounded-pill bg-info"><i class="fa-solid fa-comment-dots"></i>2</span>
                
                <span class="badge rounded-pill bg-danger"><i class="fa-solid fa-heart"></i>32</span>
                <br>
                <small>{{$post -> created_at}} | by writer</small>
              </li>
              @endforeach
            </ul>
          </div>
          <div class='col-12 my-3'>
            <div class="d-grid gap-2 col-6 mx-auto">
              <a href='{{url('/')}}/{{$category -> id}}/category' class="btn btn-dark">All {{$category->title}}</a>
            </div>
          </div>
        </div>
        @endif
    <hr>
    @endforeach
    @endif

  </div>
@endsection