@extends('layouts.forum')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-12 border border-1 mt-5">
				<h3>{{$post -> title}}</h3>
				<p>{!!$post -> content!!}</p>
				<hr>
				<div class="d-grid gap-2 d-md-flex justify-content-md-end mb-3">
					<a href='{{url('/')}}/{{$post -> id}}/edit' class="btn btn-secondary me-md-2">수정</a>
					<button class="btn btn-danger" type="button">삭제</button>
				  </div>
			</div>
		</div>

		<div class="row my-3">
			<div class="col-12">
				<div class="d-grid gap-2 col-3 mx-auto">
					<button class="btn btn-outline-danger fs-4"><i class="fa-solid fa-heart"></i>32</button>
				  </div>
			</div>
		</div>

		<div class="row my-3">
			<div class="col-12">
				<ul class="list-group">
					<li class="list-group-item list-group-item-action">A second item</li>
					<li class="list-group-item list-group-item-action">A third item</li>
					<li class="list-group-item list-group-item-action">A fourth item</li>
					<li class="list-group-item list-group-item-action">And a fifth one</li>
				</ul>
			</div>
		</div>

		<div class="row my-3">
			<div class="col-12">
				<input type="text" class="form-control">
			</div>
		</div>
		<div class="row my-3">
			<div class="col-12">
				<div class="d-grid gap-2 d-md-flex justify-content-md-end">
					<button class="btn btn-primary" type="button">저장</button>
		  		</div>
			</div>
		</div>
	</div>
@endsection