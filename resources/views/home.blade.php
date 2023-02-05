@extends('layouts.lay')


@section('content')

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
$savedPost=DB::table('post_saved_user')->where('user_id','=',Auth::id())->where('post_id','=',$singlePost->id)->get();

?>
<div class="blog"><div class="head-blog"><div class="user">{{$user->name}}</div><div>

</div></div>
         <div style=" cursor: pointer;" class="post-content" onclick="window.location.href='{{url('/whole-post/'.$singlePost->id)}}'"> 
        {{$singlePost->content}}
        </div><div class="set">
       
           
            @if(Auth::check() && (Auth::id() != $singlePost->user_id ) )

            @if(count($savedPost) == 0 )
        
            <i style="margin-left: 20px;" class="far fa-bookmark" onclick="window.location.href='{{url('/save-post/'.$singlePost->id)}}'"></i>
            @else
            <i style="margin-left: 20px;" class="fa fa-bookmark" onclick="window.location.href='{{url('/unsave-post/'.$singlePost->id)}}'"></i>
             @endif

            @endif

            
            @if(Auth::check() && (Auth::id() == $singlePost->user_id or Auth::user()->hasRole(['Admin','Admin assistant']) ) )
             <i class="fa fa-trash" onclick="window.location.href='{{url('/delete-post/'.$singlePost->id)}}'"></i>
            
            @endif

            
        </div></div>
@endforeach


       
</div>

@endsection