@extends('layouts.layout')

@section('head_tag')

@endsection

@section('content')
<h1>게시판 List</h1>

<table class="table table-hover">
    <thead class="table-dark">
      <tr>
        <th scope="col">#</th>
        <th scope="col">아이디</th>
        <th scope="col">이름</th>
        <th scope="col">제목</th>
        <th scope="col">첨부파일</th>
        <th scope="col">조회</th>
        <th scope="col">등록일</th>
      </tr>
    </thead>
    <tbody>
      @foreach ( $reply_board as $board)
      <tr onClick='javascript:goView({{ $board->id }});' style='cursor:pointer;'>
        <th scope="row">{{ $board->id }}</th>
        <td>{{ $board->member_seq }}</td>
        <td>{{ $board->member_name }}</td>
        <td>
          @if ($board->files)
            <a href=''>파일</a>
          @endif
        </td>
        <td>{{ $board->view }}</td>
        <td>{{ $board->created_at }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>

  {{ $reply_board->links() }}

  <a href='{{ url('reply_board/create') }}' class='btn btn-primary'>글쓰기</a>
@endsection

@section('body_end_tag')
<script>
    function goView(pa){
        var url = "/reply_board/" + pa + "/viewCnt/"

        $.ajax({
            type: "GET",
            url: url,
            //dataType: "JSON",
            success: function(result) {
                // 성공시 http status code 200
                //console.log(result);
                location.href = "/reply_board/" + pa + "/show/"
            },
            error: function(xhr, status, error) {
                // 실패시 http status code 200 이 아닌 경우
                console.log(xhr);
            }
        });
    }
</script>
@endsection