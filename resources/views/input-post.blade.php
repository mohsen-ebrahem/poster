<!DOCTYPE html>
<html>
    <head>
        <title>Poster website</title>
        <link rel="stylesheet" href={{ URL::asset('css/idea-style.css') }}>
        <link rel="stylesheet" href={{ URL::asset('css/input-post-style.css') }}>
        <link rel="stylesheet" href={{ URL::asset('fontawesome-free-6.2.0-web/css/all.css') }}>

        
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
        @if(Auth::check())
       <div style="position:absolute;bottom:10px;font-family:arial;font-weight:600;text-align:right ;background-color:cadetblue; width:100%;
        height:40px;font-size:20px;padding-top:6px;padding-right:0px;border-radius:5px; cursor: pointer;" onclick="window.location.href='{{url('/profile')}}'">{{Auth::user()->name}}</div>
        @endif
    </div>
    <div class="content">
        <div class="publish-post">Let's Publish New Post</div>
        <form name="add-blog" method="get" action="{{route('add-post')}}">
            
            <textarea name="content"></textarea>

            <input class="submit-button" type="submit" value="Publish">
        </form>    
</div>
   </div>
  
    </body>
   
</html>