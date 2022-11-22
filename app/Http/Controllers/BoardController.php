<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        $files = $request->file('files');
        //return($files->getClientOriginalName());
        $path = $request->file('files')->store('public/board');
        //dd($request->file('files')->getClientOriginalName());
        $originalFileName = $request->file('files')->getClientOriginalName();
        $saveFileName = $request->file('files')->hashName();
        
        $board = Board::create([
            //디비 테이블의 필드명 => 입력단에서 남어옴 입력 필드
            'title'=>$request->input('title'),
            'name'=>$request->input('name'),
            'body'=>$request->input('body'),
            'files'=>$saveFileName,
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
        $board = Board::find($id);
        $board->title = $request->title;
        $board->name = $request->name;
        $board->body = $request->body;
        $board->save();

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
    public function viewCnt($id){
        //return ($id);
        $board = Board::find($id);
        $board->view = ($board->view + 1);
        $board->save();
    }
}
