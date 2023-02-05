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

@endsection