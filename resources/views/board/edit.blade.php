@extends('layouts.forum')

@section('inside_head_tag')
	<script src="https://cdn.ckeditor.com/ckeditor5/35.3.1/classic/ckeditor.js"></script>
@endsection

@section('content')
<form name='frm' id='frm' method='POST' enctype="multipart/form-data">
	{{-- <form method="POST" name='frm' id='frm' action='/board/store' aria-label="{{ __('create') }}" enctype="multipart/form-data"> --}}
	@csrf
	{{-- @method('POST') --}}
	<input type="TEXT" class="form-control" name='member_seq' id='member_seq' value='{{$board -> member_seq}}'>
	<input type="TEXT" class="form-control" name='board_content' id='board_content'>
	<input type="TEXT" class="form-control" name='grp' id='grp' value="{{ $board -> grp}}">
	<input type="TEXT" class="form-control" name='sort' id='sort' value="{{ $board -> sort}}">
	<input type="TEXT" class="form-control" name='depth' id='depth' value="{{ $board -> depth}}">

	<div class="container">
		<div class="row mt-5">
			<div class="col-12">
				<label>이름</label>
				<input type="text" class="form-control" name='member_name' id='member_name' value='{{$board -> member_name}}'>
			</div>
		</div>
		<div class="row mt-5">
			<div class="col-12">
				<label>제목</label>
				<input type="text" class="form-control" name='board_title' id='board_title' value='{{$board -> board_title}}'>
			</div>
		</div>
		<div class="row my-3">
			<div class="col-12">
				<label>내용</label>
				<div id="editor">{!!$board -> board_content!!}</div>
			</div>
		</div>
		<div class="row mt-5">
			<div class="col-12">
				<label>첨부파일1</label>
				<input type="file" class="form-control" name='board_file1' id='board_file1'>
			</div>
		</div>
		<div class="row mt-5">
			<div class="col-12">
				<label>첨부파일2</label>
				<input type="file" class="form-control" name='board_file2' id='board_file2'>
			</div>
		</div>
		<div class="row my-3">
			<div class="col-12">
				<div class="d-grid gap-2 d-md-flex justify-content-md-end mt-3">
					<button class="btn btn-sm btn-success" type='button' id='btnSave'>저장(A)</button>
					<button class="btn btn-sm btn-default" type='button' id='btnList'>목록</button>
				</div>
			</div>
		</div>
	</div>
</form>
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
		$(document).ready(function(){
			$("#btnList").click(function(){
            	location.href='/board';
        	});
			$("#btnSave").click(function(){
            	goSave();
        	});
		});

		function goSave(){
			let content = $(".ck-content").html(); 
			$("#board_content").val(content);

			var form = $('#frm')[0];
			var formData = new FormData(form);
			//var formData = new FormData();
			//var files = $('#files');
			//formData.append('files',$(files)[0].files[0]);
			
			$.ajax({
				type: 'POST',
				url: '/board/store',
				data: formData,
				contentType: false,
				processData: false,
				success: function(response){
					console.log(response);
					//$('#fileSaveName').val(response);
				},
				error : function(request, status, error ) {   // 오류가 발생했을 때 호출된다.
					//console.log('code:'+request.status+'\n'+'message:'+request.responseText+'\n'+'error:'+error);
					console.log('code:'+request.status+'\n'+'error:'+error);
				}
			});
			
		}
	</script>
@endsection