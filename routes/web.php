<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/contact', 'HomeController@index');
/*
Route::get('/contact', function(){
    $books = [
        'Harry',
        'Laravel',
        '<script>alert(\'Laravel\')</script>'
    ];
    //return view('contact', [
    //    'books' => $books
    //]);
    return view('contact')->with([
        'books' => $books
    ]);
});
*/

Route::get('/projects', 'ProjectController@index');

//tasks라는 그룹으로 묶는다
Route::prefix('tasks') -> middleware('auth') -> group(function(){
    //Route::get('/tasks', 'TaskController@index')->middleware('auth');           //리스트
    Route::get('/', 'TaskController@index');           //리스트
    Route::get('/create', 'TaskController@create');   //등록화면
    Route::post('/', 'TaskController@store');          //저장
    Route::get('/{task}', 'TaskController@show');          //상세
});

Route::get('/boards', 'BoardController@index');           //리스트
Route::get('/boards/create', 'BoardController@create');   //등록화면
Route::get('/boards/{board}}', 'BoardController@show');   //상세
Route::post('/boards', 'BoardController@store');          //저장
//Route::post('/boards', 'BoardController@store');          //삭제


Auth::routes();     //로그인

Route::get('/home', 'HomeController@index')->name('home');  //로그인, 회원가입 후 페이지 이동
