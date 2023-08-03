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
Route::post('/board/{id}/replyStore', [BoardController::class, 'replyStore']);

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

Route::get('/', function () {
	return view('welcome');
});
Route::get('/contact', 'HomeController@index');
Route::get('/projects', 'ProjectController@index');

//tasks라는 그룹으로 묶는다
Route::prefix('tasks') -> middleware('auth') -> group(function(){
	//Route::get('/tasks', 'TaskController@index')->middleware('auth');           //리스트
	Route::get('/', 'TaskController@index');		//리스트
	Route::get('/create', 'TaskController@create');	//등록화면
	Route::post('/', 'TaskController@store');		//저장
	Route::get('/{task}', 'TaskController@show');	//상세
});

//게시판
Route::get('/boards', 'BoardController@index');		//리스트

Route::get('/boards/create', 'BoardController@create');	//등록화면
Route::post('/boards', 'BoardController@store');		//저장

Route::get('/boards/{id}/show', 'BoardController@show');		//상세
Route::get('/boards/{id}/viewCnt', 'BoardController@viewCnt');	//상세 - 조횟수 증가

Route::get('/boards/{id}/edit', 'BoardController@edit');		//수정
Route::put('/boards/{id}/update', 'BoardController@update');	//수정 저장

Route::put('/boards/{id}/updateState', 'BoardController@updateState');	//삭제 - 상태값 update
Route::put('/boards/{id}/delete', 'BoardController@delete');			//삭제 - delete

Route::get('/boards/fileDownload/{fileName}', 'BoardController@fileDownload');	//첨부파일 다운로드(파일명으로) - 사용 안함
Route::get('/boards/fileDownloadDb/{id}', 'BoardController@fileDownloadDb');	//첨부파일 다운로드(디비 seq로)

Auth::routes();     //로그인

Route::get('/home', 'HomeController@index')->name('home');  //로그인, 회원가입 후 페이지 이동

//계층형 게시판
Route::prefix('reply_board') -> middleware('auth') -> group(function(){
	Route::get('/', 'BbsController@index');			//목록
	Route::get('/create', 'BbsController@create');	//등록화면
	//Route::get('/test', 'BbsController@test');	//테스트
});

//Route::resources([
//    'Bbs' => BbsController::class,
//]);

