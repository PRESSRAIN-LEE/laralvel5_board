@extends('layouts.forum')

@section('content')
	<div class="container">
		<div class="row my-3">
			<div class="col-12">
				<form method='POST' action='/category/store'>
					@csrf
					<input type="text" class="form-control" name='title'>
					<div class="d-grid gap-2 d-md-flex justify-content-md-end mt-3">
						<button class="btn btn-sm btn-primary" type='submit'>Save</button>
					</div>
				</form>
			</div>
		</div>

		<div class="row">
			<div class="col-12">
				<ul class="list-group">
					@foreach($categories as $category)
					<li class="list-group-item">
						<a href='{{url('/')}}/category/{{$category->id}}/view'>{{$category->title}}</a>
					</li>
					@endforeach
				</ul>
			</div>
		</div>
	</div>
@endsection