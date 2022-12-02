@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('게시판 글 수정') }}</div>

                <div class="card-body">
                    
                    <form method='POST' action='/boards/{{$board->id}}/update'>
                        @method('PUT')
                        @csrf

                        <div class="form-group row">
                            <label for="title" class="col-md-2 col-form-label text-md-right">{{ __('제목') }}</label>

                            <div class="col-md-10">
                                <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ $board->title }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('이름') }}</label>

                            <div class="col-md-10">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $board->name }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="body" class="col-md-2 col-form-label text-md-right">{{ __('내용') }}</label>

                            <div class="col-md-10">
                                <textarea name="body" id="body" rows="10" class="form-control{{ $errors->has('body') ? ' is-invalid' : '' }}" required autofocus>{{ $board->body }}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('첨부파일') }}</label>

                            <div class="col-md-10">
                                @if($board->files_ori)
                                    <a href='{{ url('/') }}/boards/fileDownloadDb/{{ $board->id }}'>{{ $board->files_ori }}</a>
                                    <input type='checkbox' name='fileDel' id='fileDel' value='Y'>파일 삭제<br>
                                @endif
                                <input id="files" type="file" class="form-control-file" name="files">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('저장') }}
                                </button>
                                <a href="{{ url('boards') }}" class="btn btn-secondary">{{ __('목록') }}</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection