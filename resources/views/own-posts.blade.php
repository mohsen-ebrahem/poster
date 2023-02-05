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
use App\Models\Post;
$userId=Auth::id();
$posts=Post::all()->where('user_id','=',$userId);


?>

@foreach($posts as $singlePost)
<div class="blog"><div class="head-blog"><div class="user">Mohsen Ebrahem</div><div></div></div>
         <div class="post-content" onclick="window.location.href='{{url('/whole-post/'.$singlePost->id)}}';  
        "> {{$singlePost->content}}
        </div><div class="set">
            <!-- <i style="margin-left: 20px;" class="fa fa-bookmark"></i> -->
            <i class="fa fa-trash"></i>
        </div></div>
@endforeach

       
</div>
   </div>
  
    </body>
   
</html>