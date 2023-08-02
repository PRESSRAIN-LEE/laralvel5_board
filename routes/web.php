<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BoardController;

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


//참고사이트 https://www.youtube.com/watch?v=lM4nd2jTHZo

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [ForumController::class, 'index']);
Route::get('/{id}/view', [ForumController::class, 'view']);

Route::get('/{id}/edit', [ForumController::class, 'edit']);
Route::post('/update', [ForumController::class, 'update']);

Route::get('/create', [ForumController::class, 'create']);
Route::post('/store', [ForumController::class, 'store']);
Route::get('/{id}/category', [ForumController::class, 'category']);

Route::get('/category', [CategoryController::class, 'index']);
Route::post('/category/store', [CategoryController::class, 'store']);
Route::get('/category/{id}/view', [CategoryController::class, 'view']);
Route::delete('/category/{id}/delete', [CategoryController::class, 'delete']);
Route::put('/category/{id}/update', [CategoryController::class, 'update']);

//계층형게시판
//Route::resource('/board','BoardController');
//Route::resource('board', BoarsController::class);

Route::get('/board', [BoardController::class, 'index']);
Route::get('/board/create', [BoardController::class, 'create']);
Route::post('/board/store', [BoardController::class, 'store']);

Route::get('/board/{id}/reply', [BoardController::class, 'reply']);

Route::get('/board/{id}/show', [BoardController::class, 'show']);
Route::get('/board/{id}/viewCnt', [BoardController::class, 'viewCnt']);	//상세 - 조횟수 증가

Route::get('/board/{id}/edit', [BoardController::class, 'edit']);		//수정
Route::put('/board/{id}/update', [BoardController::class, 'update']);	//수정 저장


route::get('/hello', function (){
    return view('hello');
});

Route::get('/contact', function(){
    return view('contact');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

