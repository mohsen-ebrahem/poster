@extends('layouts.lay')


@section('content')
<div class="content">

<?php
use App\Models\Post;
use App\Models\User;
$userId=Auth::id();
$posts=Post::all()->where('user_id','=',$userId);
$user=User::findOrFail($userId);

?>

@foreach($posts as $singlePost)
<div class="blog"><div class="head-blog"><div class="user">{{$user->name}}</div><div></div></div>
         <div style=" cursor: pointer;" class="post-content" onclick="window.location.href='{{url('/whole-post/'.$singlePost->id)}}';  
        "> {{$singlePost->content}}
        </div><div class="set">
            <i class="fa fa-trash" onclick="window.location.href='{{url('/delete-post/'.$singlePost->id)}}'"></i>
        </div></div>
@endforeach

       
</div>


@endsection