<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;       //Task.php에 있는 namespace를 사용

class TaskController extends Controller
{
    public function index(){
        $tasks = Task::all();
        return view('tasks.index', [
            'tasks' => $tasks
        ]);
    }

    public function create(){
        return view('tasks.create');
    }

    public function store(Request $request){
        $task = Task::create([
            //디비 테이블의 필드명 => 입력단에서 남어옴 입력 필드
            'title'=>$request->input('title'),
            'body'=>$request->input('body')
        ]); //모델

        return redirect('/tasks');
    }

    public function show(Task $task){
        return view('tasks.show', [
            'task' => $task
        ]);
    }
}
