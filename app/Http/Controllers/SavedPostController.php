<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class SavedPostController extends Controller
{
    public function SavePost($postId){
        $userId=Auth::id();
        DB::table('post_saved_user')->insert([
            ['user_id' => $userId, 'post_id' => $postId],
        ]);
        return redirect('home');
    }


    public function unSavePost($postId){
        $userId=Auth::id();
        DB::table('post_saved_user')->where(
            'user_id','=', $userId
        )->where('post_id','=',$postId)->delete();
        return redirect(url()->previous());
    }

}
