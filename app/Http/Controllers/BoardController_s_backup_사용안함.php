<?php

namespace App\Http\Controllers;

use App\Board;                  //"Board 라는 데이터베이스를 사용한다" 선언
use Illuminate\Http\Request;

class BoardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $boards = Board::where('board_state', 'Y')
        ->orderby('grp', 'DESC')
        ->orderby('depth', 'ASC')
        ->orderby('id', 'DESC')
        ->paginate(10);
        //->get();
        return view('board.index')
        ->with('boards', $boards);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('board.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$request->file('board_file1');

        // 파일 업로드 확인
        //$request->hasFile('board_file1');

        //$validator = Validator::make($data = Input::all(), Board::$rules);
        //if($validator->fails()){
         //   return redirect()->back()->withErrors($validator->errors())->withInput();
        //}

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
            //디비 테이블의 필드명 => 입력단에서 남어옴 입력 필드
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
        return view('board.show')
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
        return view('board.edit')
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
    }
}
