<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;			//"Category라는 데이터베이스를 사용한다" 선언
use App\Post;			//"Post라는 데이터베이스를 사용한다" 선언

class ForumController extends Controller
{
    public function index(){
        return view('forum.index');
    }
    
    public function view($id){
        $post = Post::find($id);

        return view('forum.view')
        ->with('post', $post);
    }

    public function edit($id){
        $categories = Category::orderby('title', 'asc')->get();
        $post = Post::find($id);

        return view('forum.edit')
        ->with('post', $post)
        ->with('categories', $categories);
    }

    public function create(){
        $categories = Category::orderby('title', 'asc')->get();
        return view('forum.create')
        ->with('categories', $categories);
    }

    public function store(Request $request){
        $post = Post::find($request->$post_id);
        $post -> title = $request -> title;
        $post -> category_id = $request -> category_id;
        $post -> content= $request -> content;
        $post -> save();
        //return ('forum.create');
        $result = $request -> all();
        $data = array(
            'result' => $request
        );
        return response() -> json($data);
    }

    public function update(Request $request){
        $post = new Post;
        $post -> title = $request -> title;
        $post -> category_id = $request -> category_id;
        $post -> content= $request -> content;
        $post -> save();
        //return ('forum.create');
        $result = $request -> all();
        $data = array(
            'result' => $request
        );
        return response() -> json($data);
    }

    public function category($id){
        $category = Category::find($id);
        $category_title = $category->title;

        $posts = Post::where('category_id', $id)
        ->orderby('created_at', 'desc')
        ->get();
        return view('forum.category')
        ->with('posts', $posts)
        ->with('category_title', $category_title);
    }
}
