<!DOCTYPE html>
<html>
    <head>
        <title>Poster website</title>
        <link rel="stylesheet" href="./nav-style.css"> 
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
use App\Http\Controllers\PostController;
use App\Models\User;
$post=new PostController();
$posts= $post->index();

?>


@foreach($posts as $singlePost)
<?php

$user=User::findOrFail($singlePost->user_id);
// print($singlePost->id);
// $post=DB::table('post_saved_user')->where('user_id','=',$singlePost->user_id)->where(function ($query) {
    
//     $query->where('post_id', '=',$singlePost->id);
// })->get();
//print($post);
?>
<div class="blog"><div class="head-blog"><div class="user">{{$user->name}}</div><div>
    <!-- <i class="fa fa-ellipsis-vertical"></i> -->

</div></div>
         <div class="post-content" onclick="window.location.href='{{url('/whole-post/'.$singlePost->id)}}'"> 
        {{$singlePost->content}}
        </div><div class="set">
       
           
            @if(Auth::check() && (Auth::id() != $singlePost->user_id ) )

        
            <i style="margin-left: 20px;" class="fa fa-bookmark" onclick="window.location.href='{{url('/save-post/'.$singlePost->id)}}'"></i>
          

            @endif

            
            @if(Auth::check() && (Auth::id() == $singlePost->user_id or Auth::user()->hasRole(['Admin','Admin assistant']) ) )
             <i class="fa fa-trash" onclick="window.location.href='{{url('/delete-post/'.$singlePost->id)}}'"></i>
            
            @endif

            
        </div></div>
@endforeach


       
</div>
   </div>
  
    </body>
   
</html>