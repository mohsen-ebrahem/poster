<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\DB;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::resource('/post',PostController::class);
Route::resource('/user',UserController::class);

Route::post('/save-post',function(){
    
    DB::table('post_saved_user')->insert([
        ['user_id' => 1, 'post_id' => 1],
        ['user_id' => 1, 'post_id' => 2],
    ]);
});