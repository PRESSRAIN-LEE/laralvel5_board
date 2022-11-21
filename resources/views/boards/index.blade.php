@extends('layouts.app')

@section('content')
    <h1>게시판 List</h1>
    <ul>
        @foreach ( $boards as $board)
            <!--<li><a href='{{ url('/boards') }}/{{ $board->id }}/show'>title: {{ $board->title }} Created at: {{ $board->created_at }}</a></li>-->
            <li><a href='javascript:goView({{ $board->id }});'>title: {{ $board->title }} Created at: {{ $board->created_at }}</a></li>
        @endforeach
    </ul>
	<a href='{{ url('boards/create') }}'>글쓰기</a>
@endsection

<script>
    function goView(pa){
        // url + get으로 보낼 데이터
        var url = "/boards/" + pa + "/viewCnt/"

        $.ajax({
            type: "GET",
            url: url,
            success: function(result) {
                // 성공시 http status code 200
                console.log(result);
                location.href = "/boards/" + pa + "/show/"
            },
            error: function(xhr, status, error) {
                // 실패시 http status code 200 이 아닌 경우
                console.log(xhr);
            }
        });
    }
</script>