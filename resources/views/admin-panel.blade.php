<!DOCTYPE html>
<html>
    <head>
        <title>Poster website</title>
        
        <link rel="stylesheet" href={{ URL::asset('css/idea-style.css') }}>
        <link rel="stylesheet" href={{ URL::asset('css/admin-panel-style.css') }}>
        <link rel="stylesheet" href={{ URL::asset('fontawesome-free-6.2.0-web/css/all.css') }}>

    </head>

    <body>
        <div>
        <div class="nav">
            <div id="poster">Poster</div>
            <div id="navid">
            <a href={{route('home')}}><i class="fa fa-house"></i></a>
            <a href={{route('saved-posts')}}><i class="fa fa-bookmark"></i></a>
            <a href={{route('own-posts')}}><i class="fa-solid fa-address-card"></i></a>
            <a href={{route('write-post')}}><i class="fa-sharp fa-solid fa-pen-to-square"></i></a>
            <a href={{route('admin-panel')}}><i class="fa fa-gear"></i></a>
            </div>
            @if(Auth::check())
       <div style="position:absolute;bottom:10px;font-family:arial;font-weight:600;text-align:right ;background-color:cadetblue; width:100%;
        height:40px;font-size:20px;padding-top:6px;padding-right:0px;border-radius:5px; cursor: pointer;" onclick="window.location.href='{{url('/profile')}}'">{{Auth::user()->name}}</div>
        @endif
        </div>
        <div class="content">

        <?php
        use App\Models\User;
        use App\Models\Post;
        $users=User::all();
        ?>


@foreach($users as $user)

<?php
$posts=Post::all()->where('user_id','=',$user->id);
?>

<div class="user">
                <div class="user-info"><div class="user-name">{{$user->name}}</div>
                <div class="num-posts">{{count($posts)}} Posts</div></div>
                <div class="user-control">
                @if(Auth::id() != $user->id)
                    <div ><a href='{{url('/delete-user/'.$user->id)}}' >Delete</a></div>
                @endif
                @if(!$user->hasRole(['Admin']))
                <div><a href='{{url('/admin-user/'.$user->id)}}'>Admin</a></div>
                @endif
                @if(!$user->hasRole(['Admin assistant','Admin']))
                <div><a href='{{url('/admin-assistant-user/'.$user->id)}}'>Assistant</a></div>
                @endif
                </div>
            </div>
@endforeach

        </div>

    </div>
    </body>
   
</html>