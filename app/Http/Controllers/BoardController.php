<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

//use Intervention\Image\Facades\Image;

use App\Board;       //Board.php에 있는 namespace를 사용

class BoardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $boards = Board::where('status', 'Y')
        ->orderby('id', 'desc')
        ->paginate(10);
        //->get();
        
        return view('boards.index')
        ->with('boards', $boards);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('boards.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$validator = Validator::make($data = Input::all(), Board::$rules);
        //if($validator->fails()){
         //   return redirect()->back()->withErrors($validator->errors())->withInput();
        //}

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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $board = Board::find($id);
         return view('boards.show')
         ->with('board', $board);
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
        return view('boards.edit')
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
    }
}
