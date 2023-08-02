@extends('layouts.forum')

@section('inside_head_tag')
	<script src="https://cdn.ckeditor.com/ckeditor5/35.3.1/classic/ckeditor.js"></script>
@endsection

@section('content')
	<div class="container">
		<div class="row mt-5">
			<div class="col-12">
				<label>title</label>
				<input type="text" class="form-control" name='title' id='title' value="{{$post -> title}}">
			</div>
		</div>
		<div class="row my-3">
			<div class="col-12">
				<label>category</label>
				<select class="form-select" name='category_id' id='category_id'>
					@foreach($categories as $category)
					<option value="{{ $category -> id}}" {{$category -> id == $post -> id ? "selected" : ""}}>{{ $category -> title}}</option>
					@endforeach
				</select>
			</div>
		</div>
		<div class="row my-3">
			<div class="col-12">
				<div id="editor">{!!$post -> content!!}</div>
			</div>
		</div>
		<div class="row my-3">
			<div class="col-12">
				<div class="d-grid gap-2 d-md-flex justify-content-md-end mt-3">
					<button class="btn btn-sm btn-success" type='button' id='submit'>저장</button>
				</div>
			</div>
		</div>
	</div>
	<input type="hidden" id='post_id' value="{{$post -> id}}">
	3:51:18
@endsection

@section('before_body_end_tag')
	<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>

	<script>
		ClassicEditor
			.create( document.querySelector( '#editor' ) )
			.catch( error => {
				console.error( error );
			} );
	</script>

	<script>
		let CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

		$(document).ready(function(){
			$("#submit").click(function(){
				let post_id = $("#post_id").val();
				let title = $("#title").val();
				let category_id = $("#category_id").val();
				let content = $(".ck-content").html(); 
				
				$.ajax({
					type: "POST",
					url: "/update",
					data: {
						_token: CSRF_TOKEN,
						post_id: post_id,
						title: title,
						category_id: category_id,
						content: content,
					},
					dataType: "JSON",
					success: function success(data){
						console.log("A : " + data.result);
						window.location.href='/'
					},
					error: function(response){
						console.log("B:" + response);
					}
				});

			});
		});
	</script>
@endsection