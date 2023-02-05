<!DOCTYPE html>
<html>
    <head>
        <title>Poster website</title>
        <!-- <link rel="stylesheet" href="./nav-style.css"> -->
        <link rel="stylesheet" href={{ URL::asset('css/idea-style.css') }}>
        <link rel="stylesheet" href={{ URL::asset('fontawesome-free-6.2.0-web/css/all.css') }}>
        <style>
           

        </style>
    </head>

    <body>
   <div class="par">
    <div class="nav">
        <div id="poster">Poster</div>
        <div id="navid">
        <a href={{route('home')}}><i class="fa fa-house"></i></a>
            <a href={{route('saved-posts')}}><i class="fa fa-bookmark"></i></a>
            <a href={{route('own-posts')}}><i class="fa-solid fa-address-card"></i></a>
            <a href={{route('write-post')}}><i class="fa-sharp fa-solid fa-pen-to-square"></i></a>
            <a href={{route('admin-panel')}}><i class="fa fa-gear"></i></a>
        </div>
    </div>
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
<div class="blog"><div class="head-blog"><div class="user">{{$user->name}}</div><div></div></div>
         <div class="post-content" onclick="window.location.href='{{url('/whole-post/'.$post->id)}}'"> 
        {{$post->content}}
        </div><div class="set">
        
        <i class="fa fa-bookmark" onclick="window.location.href='{{url('/unsave-post/'.$post->id)}}'"></i>
        </div></div>
@endforeach


       
</div>
   </div>
  
    </body>
   
</html>