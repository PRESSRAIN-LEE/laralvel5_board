@extends('layouts.forum')

@section('content')
	<div class="container">
		<div class="row my-3">
			<div class="col-12">
				<form method='POST' action='/category/{{$category->id}}/update'>
					@method('PUT')
					@csrf
				<input type="text" class="form-control" value="{{$category->title}}" name='title'>
			</div>
		</div>

		<div class="row my-3">
			<div class="col-12">
				<div class="d-grid gap-2 d-md-flex justify-content-md-end mb-3">
					<button class="btn btn-info me-md-2" type="submit">Update</button>
					</form>

					<form method='POST' action='/category/{{$category->id}}/delete'>
						@method('DELETE');  2:42:19
						@csrf
						<button class="btn btn-danger" type="submit">삭제</button>
					</form>
				  </div>
			</div>
		</div>
	</div>
@endsection