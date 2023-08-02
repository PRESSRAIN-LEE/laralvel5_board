@extends('layouts.layout')

@section('head_tag')
@endsection

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-12 border border-1 mt-5">
				<h3>{{$board -> board_title}}</h3>
				<p>{!!$board -> board_content!!}</p>
				<hr>
				<div class="d-grid gap-2 d-md-flex justify-content-md-end mb-3">
					<a href='{{url('/')}}/board/{{$board -> id}}/edit' class="btn btn-secondary me-md-2">수정</a>
					<a href='{{url('/')}}/board/{{$board -> id}}/reply' class="btn btn-warning me-md-2">답변</a>
					<a href='javascript:goDel({{$board -> id}});'class="btn btn-danger me-md-2">삭제</a>
					{{-- <button class="btn btn-danger" type="button" id='btnDel'>삭제</button> --}}
				  </div>
			</div>
		</div>
	</div>
@endsection

@section('body_end_tag')
	<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>

	<script>
		$(document).ready(function(){
			$("#btnDel").click(function(){
            	//goDel();
        	});
		});

		function goDel(pa){
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
