@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('게시판 글쓰기') }}</div>

                <div class="card-body">
                    <form method="POST" name='frm' id='frm' action='/reply_board' aria-label="{{ __('create') }}" enctype="multipart/form-data" onsubmit="return goSave();">
                        <input id="member_id" type="text" name="member_id" value="">

                        @csrf

                        <div class="form-group row">
                            <label for="title" class="col-md-2 col-form-label text-md-right">{{ __('제목') }}</label>

                            <div class="col-md-10">
                                <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ old('title') }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="member_name" class="col-md-2 col-form-label text-md-right">{{ __('이름') }}</label>

                            <div class="col-md-10">
                                <input id="member_name" type="text" class="form-control{{ $errors->has('member_name') ? ' is-invalid' : '' }}" name="member_name" value="{{ old('member_name') }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="memo" class="col-md-2 col-form-label text-md-right">{{ __('내용') }}</label>

                            <div class="col-md-10">
                                <textarea name="memo" id="memo" rows="5" class="form-control{{ $errors->has('memo') ? ' is-invalid' : '' }}" {{ old('memo') }} required autofocus></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('첨부파일1') }}</label>

                            <div class="col-md-10">
                                <input id="files" type="file" class="form-control-file" name="files1">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('첨부파일2') }}</label>

                            <div class="col-md-10">
                                <input id="files" type="file" class="form-control-file" name="files2">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">{{ __('저장') }}</button>
                                <button type="button" class="btn btn-primary" id='btnSave'>{{ __('저장(A)') }}</button>
                                <a href="{{ url('reply_board') }}" class="btn btn-secondary">{{ __('목록') }}</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@if($errors->any())
    <div class="alert alert-danger" role='alert'>
        <span class='glyphicon glyphicon-exclamation-sign' area-hidden="true"></span>
        <span class='sr-only'>Errors: </span>
        @foreach($errors->all() as $message)
            {{ $message }}
        @endforeach
    </div>
@endif

<script>
    $( document ).ready(function() {
        $("#btnSave").click(function(){
            goSave();
        });
    });

    function goSave(){
        return;
        
        var form = $('#frm')[0];
		var formData = new FormData(form);

        //var formData = new FormData();
        //var files = $('#files');
        //formData.append('files',$(files)[0].files[0]);
        $.ajax({
            type: 'POST',
            url: '/reply_board',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response){
                alert(response);
                $('#fileSaveName').val(response);
            },
            error : function(request, status, error ) {   // 오류가 발생했을 때 호출된다.
                alert('code:'+request.status+'\n'+'message:'+request.responseText+'\n'+'error:'+error);
            }
        });
    }
</script>

@endsection