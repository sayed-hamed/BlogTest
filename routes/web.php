<?php

use App\Http\Controllers\Dashboard\CommentController;
use App\Http\Controllers\Dashboard\HomeController;
use App\Http\Controllers\Dashboard\PostContoller;
use Illuminate\Support\Facades\Route;

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

Route::middleware(['auth'])->name('admin.')->group(function (){

    Route::get('/dashboard',[HomeController::class,'index'])->name('index');
    Route::resource('posts',PostContoller::class);
    Route::resource('comments',CommentController::class);
    Route::get('trash',[CommentController::class,'trash'])->name('trash');
    Route::delete('deleteTrash',[CommentController::class,'deleteTrash'])->name('deleteTrash');
    Route::post('trashBack',[CommentController::class,'trashBack'])->name('trashBack');

});

require __DIR__.'/auth.php';
