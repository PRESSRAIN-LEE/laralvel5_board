<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
<<<<<<< HEAD
use App\Board;			//"Board 라는 데이터베이스를 사용한다" 선언(Model)

=======
//use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

//use Intervention\Image\Facades\Image;

use App\Board;       //Board.php에 있는 namespace를 사용
>>>>>>> 05be93f9353a951ccee3be3f08b76db6f57d3107

class BoardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
<<<<<<< HEAD
        $boards = Board::where('board_state', 'Y')
        ->orderby('grp', 'DESC')
        ->orderby('depth', 'ASC')
        ->orderby('id', 'DESC')
        ->paginate(10);
        //->get();
        return view('board.index')
=======
        $boards = Board::where('status', 'Y')
        ->orderby('id', 'desc')
        ->paginate(10);
        //->get();
        
        return view('boards.index')
>>>>>>> 05be93f9353a951ccee3be3f08b76db6f57d3107
        ->with('boards', $boards);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
<<<<<<< HEAD
        return view('board.create');
=======
        return view('boards.create');
>>>>>>> 05be93f9353a951ccee3be3f08b76db6f57d3107
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
<<<<<<< HEAD
        //$request->file('board_file1');

        // 파일 업로드 확인
        //$request->hasFile('board_file1');

=======
>>>>>>> 05be93f9353a951ccee3be3f08b76db6f57d3107
        //$validator = Validator::make($data = Input::all(), Board::$rules);
        //if($validator->fails()){
         //   return redirect()->back()->withErrors($validator->errors())->withInput();
        //}

<<<<<<< HEAD
        #$files1 = $request->file('board_file1');
        #$files2 = $request->file('board_file2');
        //return($files->getClientOriginalName());
        //dd(storage_path());

        if($request->hasFile('board_file1')){
            $path1 = $request->file('board_file1')->store('board');     //저장 될 폴더명
            $originalFileName1 = $request->file('board_file1')->getClientOriginalName();
            $saveFileName1 = $request->file('board_file1')->hashName();
        }else{
            $originalFileName1 = "";
            $saveFileName1 = "";
        }
        
        if($request->hasFile('board_file2')){
            $path2 = $request->file('board_file2')->store('board');     //저장 될 폴더명
            $originalFileName2 = $request->file('board_file2')->getClientOriginalName();
            $saveFileName2 = $request->file('board_file2')->hashName();
        }else{
            $originalFileName2 = "";
            $saveFileName2 = "";
        }

        //$path = $request->file('files')->store('D:\work\00.GIT\uploads\attachFiles');
        //$path = $request->file('files')->store(Storage::disk('public'));
        //dd($path1);
        
        //dd($request->file('files')->getClientOriginalName());
        $board = Board::create([
            //디비 테이블의 필드명 => 입력단에서 넘어옴 입력 필드
            'grp' => $request->input('grp'),
            'sort' => $request->input('sort'),
            'depth' => $request->input('depth'),

            'member_seq' =>$request->input('member_seq'),

            'board_title' => $request->input('board_title'),
            'member_name' =>$request->input('member_name'),
            'board_content' =>$request->input('board_content'),

            'board_file1' => $saveFileName1,
            'board_file1_ori' => $originalFileName1,
            'board_file2' => $saveFileName2,
            'board_file2_ori' => $originalFileName2,
        ]);

        //$result = $request -> all();
        //$data = array(
        //    'result' => $request
        //);
        //return response() -> json($data);

        return redirect('/board');
=======
        $files = $request->file('files');
        //return($files->getClientOriginalName());
        //dd(storage_path());

        $path = $request->file('files')->store('board');
        //$path = $request->file('files')->store('D:\work\00.GIT\uploads\attachFiles');
        //$path = $request->file('files')->store(Storage::disk('public'));
        //dd($path);
        
        //dd($request->file('files')->getClientOriginalName());
        $originalFileName = $request->file('files')->getClientOriginalName();
        $saveFileName = $request->file('files')->hashName();
        
        $board = Board::create([
            //디비 테이블의 필드명 => 입력단에서 남어옴 입력 필드
            'title'=>$request->input('title'),
            'name'=>$request->input('name'),
            'body'=>$request->input('body'),
            'files'=>$saveFileName,
            'files_ori'=>$originalFileName,
            //'view'=>$request->input('view')
        ]); //모델

        return redirect('/boards');
>>>>>>> 05be93f9353a951ccee3be3f08b76db6f57d3107
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
<<<<<<< HEAD
        $board = Board::find($id);
        return view('board.show')
        ->with('board', $board);
=======
         $board = Board::find($id);
         return view('boards.show')
         ->with('board', $board);
>>>>>>> 05be93f9353a951ccee3be3f08b76db6f57d3107
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $board = Board::find($id);
<<<<<<< HEAD
        return view('board.edit')
=======
        return view('boards.edit')
>>>>>>> 05be93f9353a951ccee3be3f08b76db6f57d3107
        ->with('board', $board);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
<<<<<<< HEAD
        //
=======
        //return 'OK';
        //$path = $request->file('files')->store('board');
        //dd($path);
        

        //$files = $request->file('files');
        //return($files->getClientOriginalName());
        //dd(storage_path());
        

        //$path = $request->file('files')->update('board');
        //$path = $request->file('files')->store('D:\work\00.GIT\uploads\attachFiles');
        //$path = $request->file('files')->store(Storage::disk('public'));
        //dd($path);
        
        //dd($request->file('files')->getClientOriginalName());
        //$originalFileName = $request->file('files')->getClientOriginalName();
        //$saveFileName = $request->file('files')->hashName();

        $board = Board::find($id);
        $board->title = $request->title;
        $board->name = $request->name;
        $board->body = $request->body;
        //if($saveFileName){
        //    $board->files = $saveFileName;
        //    $board->files_ori = $originalFileName;
        //}
        //dd($request->fileDel);
        $board->save();

        //파일 삭제
        //if(($request->fileDel) == "Y"){
            //return 'Y';
        //}

        return redirect('/boards/' . $id . '/show');
>>>>>>> 05be93f9353a951ccee3be3f08b76db6f57d3107
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
<<<<<<< HEAD
    public function destroy($id)
    {
        //
    }

    //조횟수 증가
    public function viewCnt(Request $request, $id){
        //return ($id);
        $board = Board::find($id);
        $board->board_read = ($board->board_read + 1);
        $board->save();
    }

    //답변(reply)
    public function reply($id)
    {
        $board = Board::find($id);
        return view('board.reply')
        ->with('board', $board);
=======
    //완전 삭제
    public function delete($id)
    {
        $board = Board::find($id);
        $board->delete();

        return redirect('/boards/');
    }

    //삭제 - 상태값 업데이트
    public function updateState(Request $request, $id){
        $board = Board::find($id);
        $board->status = 'N';
        $board->save();

        return redirect('/boards/');
    }

    //조횟수 증가 시키기
    public function viewCnt(Request $request, $id){
        //return ($id);
        $board = Board::find($id);
        $board->view = ($board->view + 1);
        $board->save();
    }

    //첨부파일 다운로드 - 사용 안함
    public function fileDownload($fileName){
        //return $fileName;
        //return Storage::download(url('/') . '\storage\app\public\board/' . $fileName);

        //return response()->download(url('/') . '\storage\app\public\board/' . $fileName);
        //return Storage::disk('attachFiles')->download('', $fileName);
        //dd(Storage::disk('attachFiles')->download(storage_path('/app/public/board/') . $fileName));

        //return response()->file(storage_path('/app/public/board/') . $fileName);    //파일 보기
        //return response()->download(storage_path('/app/public/board/') . $fileName, $fileName);

        //return response()->download(url('/') . '\storage\app\public\board/' . $fileName, $fileName); 
        //return Response::download('On5VtKLc0lE964C0WcnoRCYiIfsfgBinu1RB0HHH.jpeg');
    }

    //첨부파일 다운로드 (DB)
    public function fileDownloadDb(Request $request, $id){
        $board = Board::find($id);
        //return response()->file(storage_path('/app/public/board/') . $board->files, $board->files_ori);
        //return '첨부파일 다운로드 (DB)';
        //dd(response()->file(storage_path('/app/public/board/') . $board->files, $board->files_ori));
        return response()->download(storage_path('/app/public/board/') . $board->files, $board->files_ori);
>>>>>>> 05be93f9353a951ccee3be3f08b76db6f57d3107
    }
}
