@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('게시판 글상세') }}</div>

                <div class="card-body">
					<div class="form-group row">
						<label for="title" class="col-md-2 col-form-label text-md-right">{{ __('제목') }}</label>

						<div class="col-md-10">
							{{ $board->title }}
						</div>
					</div>

					<div class="form-group row">
						<label for="name" class="col-md-2 col-form-label text-md-right">{{ __('이름') }}</label>

						<div class="col-md-10">
							{{ $board->name }}
						</div>
					</div>

					<div class="form-group row">
						<label for="body" class="col-md-2 col-form-label text-md-right">{{ __('내용') }}</label>

						<div class="col-md-10">
							{!! nl2br($board->body) !!}
							{{-- {{ str_replace(array("\r\n","\r","\n"),'<br>', $board->body) }} --}}
						</div>
					</div>

					<div class="form-group row">
						<label for="body" class="col-md-2 col-form-label text-md-right">{{ __('첨부파일') }}</label>

						<div class="col-md-10">
							<!--<a href='{{ url('/') }}/boards/fileDownload/{{ $board->files }}'>{{ $board->files_ori }}(파일명)</a><br>-->
							<a href='{{ url('/') }}/boards/fileDownloadDb/{{ $board->id }}'>{{ $board->files_ori }}</a>
						</div>
					</div>

					<div class="form-group row mb-0">
						<div class="col-md-12 offset-md-2">
							<a href='{{ url('/') }}/boards/{{ $board->id }}/edit' class="btn btn-primary">{{ __('수정') }}</a>
							<a href="{{ url('boards') }}" class="btn btn-secondary">{{ __('목록') }}</a>

							<!--<a href='{{ url('/') }}/boards/{{ $board->id }}/delete' class="btn btn-danger">{{ __('삭제') }}</a>-->
							<a href='javascript:goDelete();' class="btn btn-danger">{{ __('삭제(U)') }}</a>
							<a href='javascript:goDeleteExe();' class="btn btn-danger">{{ __('삭제(D)') }}</a>
						</div>
					</div>

                </div>
            </div>
        </div>
    </div>
</div>

{{-- 삭제 --}}
<form method='POST' name='DEL_FORM'>
	@method('PUT')
	@csrf
</form>
@endsection

<script>
	function goDelete(){
		if(confirm("삭제하시겠습니까?")){
			document.DEL_FORM.action='/boards/{{$board->id}}/updateState';
			document.DEL_FORM.submit();
		}
	}

	function goDeleteExe(){
		if(confirm("삭제하시겠습니까?")){
			document.DEL_FORM.action='/boards/{{$board->id}}/delete';
			document.DEL_FORM.submit();
		}
	}

	//첨부파일 다운로드
	function goFileDown(){
		//
	}
</script>