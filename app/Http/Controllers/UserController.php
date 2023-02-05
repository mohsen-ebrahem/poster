<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return User::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user=new User($request->all());
        $user->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $posts=Post::all()->where('user_id','=',$id);
        foreach($posts as $post){
            
                DB::table('post_saved_user')->where('post_id','=',$post->id)->delete();
                

                $post->delete();
        }
        DB::table('post_saved_user')->where('user_id','=',$id)->delete();
        DB::table('model_has_roles')->where('model_id','=',$id)->delete();
        $user=User::findOrFail($id);
        $user->delete();
        return redirect('admin-panel');
        
    }

    public function assignAdminRole($id){
        $user=User::findOrFail($id);
        $user->assignRole('Admin');
        return redirect('admin-panel');
    }

    
    public function assignAdminAssistantRole($id){
        $user=User::findOrFail($id);
        $user->assignRole('Admin assistant');
        return redirect('admin-panel');
    }


}
