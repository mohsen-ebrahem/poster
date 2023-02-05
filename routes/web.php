<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use Illuminate\Http\Request;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SavedPostController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/home',function(){
    return view('home');
})->name('home');

Route::get('/save-post/{postId}',[SavedPostController::class, 'SavePost']);
Route::get('/unsave-post/{postId}',[SavedPostController::class, 'unSavePost']);


Route::get('/delete-post/{postId}',[PostController::class, 'destroy']);

Route::get('/whole-post/{id}',function($id){
    return view('whole-post')->with(['id'=>$id]);
})->name('whole-post');



Route::get('/input-post',function(){
    return view('input-post');
})->name('write-post')->middleware('auth');




// Route::get('/test',function(){
//     return view('test');
// });


Route::get('/own-posts',function(){
    return view('own-posts1');
})->name('own-posts')->middleware('auth');


Route::get('/add-post',[PostController::class,'store'])->name('add-post');


Route::get('/delete-user/{id}',[UserController::class,'destroy']);
 
Route::get('/admin-user/{id}',[UserController::class,'assignAdminRole']);

Route::get('/admin-assistant-user/{id}',[UserController::class,'assignAdminAssistantRole']);


Route::get('/saved-posts',function(){
    return view('saved-posts1');
})->name('saved-posts')->middleware('auth');

Route::get('/admin-panel',function(){
    return view('admin-panel');
})->name('admin-panel')->middleware('checkadminrole');

Route::get('not-found-page',function(){
    return view('not-found-page');
});

Route::get('assistant-not-found-page',function(){
    return view('assistant-not-found-page');
});

require __DIR__.'/auth.php';
