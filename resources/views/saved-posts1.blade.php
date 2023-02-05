@extends('layouts.lay')


@section('content')
<div class="content">

<?php
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\User;
$userId=Auth::id();

$savedPosts = DB::table('post_saved_user')->where('user_id','=',$userId)->get();

?>

@foreach($savedPosts as $singlesavedPost)
<?php

$post=Post::findOrFail($singlesavedPost->post_id);
$user=User::findOrFail($post->user_id);
?>
<div style=" cursor: pointer;" class="blog"><div class="head-blog"><div class="user">{{$user->name}}</div><div></div></div>
         <div class="post-content" onclick="window.location.href='{{url('/whole-post/'.$post->id)}}'"> 
        {{$post->content}}
        </div><div class="set">
        
        <i class="fa fa-bookmark" onclick="window.location.href='{{url('/unsave-post/'.$post->id)}}'"></i>
        </div></div>
@endforeach


       
</div>


@endsection