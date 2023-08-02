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
        <th scope="col">파일1</th>
        <th scope="col">파일2</th>
        <th scope="col">조회</th>
        <th scope="col">등록일</th>
      </tr>
    </thead>
    <tbody>
      @foreach ( $boards as $board)
      <tr style='cursor:pointer;'>
        <th scope="row">{{ $board->id }}</th>
        <td>{{ $board->member_seq }}</td>
        <td>{{ $board->member_name }}</td>
        <td>
            <a href='javascript:goView({{ $board->id }});'>
              @if($board->sort > 0)
                @for ($i=0; $i<$board->sort; $i++)
                  &nbsp;&nbsp;
                @endfor
                └{{ $board->board_title }}
              @else
                {{ $board->board_title }}
              @endif
            </a>
        </td>
        <td>
          @if ($board->board_file1)
            <a href=''>파일</a>
          @endif
        </td>
        <td>
          @if ($board->board_file2)
            <a href=''>파일</a>
          @endif
        </td>
        <td>{{ $board->board_read }}</td>
        <td>{{ $board->created_at }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>

  {!! $boards->links() !!}

  <a href='{{ url('boards/create') }}' class='btn btn-primary'>글쓰기</a>
@endsection

@section('body_end_tag')
<script>
    function goView(pa){
        var url = "/board/" + pa + "/viewCnt/"
        $.ajax({
            type: "GET",
            url: url,
            //dataType: "JSON",
            success: function(result) {
                // 성공시 http status code 200
                //console.log(result);
                location.href = "/board/" + pa + "/show/"
            },
            error: function(xhr, status, error) {
                // 실패시 http status code 200 이 아닌 경우
                console.log(xhr);
            }
        });
    }
</script>
@endsection