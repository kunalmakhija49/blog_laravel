<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;

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

Route::get('/',[Controller::class,'index']);

Route::get('/blog',[BlogController::class,'show']);

Route::get('/blog/create',[BlogController::class,'create'])->name('blog.create');
Route::post('/blog/add',[BlogController::class,'store']);
Route::get('/blog_desc/{id}',[BlogController::class,'singlepost']);

//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth'])->name('dashboard');

Route::get('/dashboard',[BlogController::class,'listview'])->name('dashboard');

Route::get('/update/{id}',[BlogController::class,'update']);
//Route::post('/update/{id}',[BlogController::class],'edit');//
Route::post('/update/{id}',[BlogController::class,'edit']);
Route::get('/delete/{id}',[BlogController::class,'delete']);
Route::post('/addcomment',[CommentController::class,'storecomment']);

Route::post('/addreply',[CommentController::class,'storereply']);
Route::post('/',[Controller::class,'index']);
Route::get('/comment/{comment}',[CommentController::class,'destroy']);


require __DIR__.'/auth.php';


