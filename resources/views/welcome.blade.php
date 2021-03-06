<!doctype html>
<html lang="en">
<head>

    <title>Blog App</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.17/tailwind.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        .hidedesc {
            line-height: 1.5em;
            height: 3em;
            overflow: hidden;
        }

        /*body{*/
        /*    background-color: dimgray;*/
        /*}*/
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{url('/')}}">Home</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            @guest
                <li class="nav-item active">
                    <a class="nav-link" href="{{url('/login')}}">Login <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/register')}}">Register</a>
                </li>
            @endguest
            @auth
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/dashboard')}}">Dashboard</a>
                </li>
            @endauth

        </ul>
{{--        <form class="form-inline my-2 my-lg-0" method="post" action="">--}}
{{--            @csrf--}}
{{--            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search" name="search">--}}
{{--            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>--}}
{{--        </form>--}}
    </div>
</nav>
<div class="dropdown float-right">
    <label for="categories"></label>
    <form method="post" action="{{url('/')}}">
        @csrf

        <select name="blogs" id="blogs" style="border: 1px solid black">

            @foreach($different_categories as $category)
                <option value="category"></option>
                <option value="{{$category->category}}" style="padding: 0px">{{$category->category}}</option>
                {{--        <option value="Travel">Travel</option>--}}
                {{--        <option value="Food">Food</option>--}}
            @endforeach
        </select>

        <button class="btn btn-primary" type="submit">Filter</button>

    </form>

</div>

<h2 style="text-align: center" lable for="heading">My Blog App</h2>
<br>
<br>


<div class="container ">
    <div class="row align-items-start">
        {{--                    add loop here--}}
        @foreach($posts as $post)
            <div class="col">
                <div class="card margin-card" style="width: 13rem;">
                    <img src="/images/img.png.jpg" class="card-img-top" alt="...">
                    <small>- By {{ $post->user->name}}</small>
                    <span><small>- Added On {{$post->date}} {{$post->weekday}}</small></span>

                    <div class="card-body">
                        <b><p class="card-title ">{{$post->title}}</p></b>
                        <p class="card-text hidedesc">{{$post->body}}</p>
                        <a href="{{url('/blog_desc/')}}/{{$post->id}}" class="btn btn-primary">Read More</a>
                        {{--                                {{url('/controller/description/')}}/{{$blog->id}}--}}
                    </div>
                </div>
            </div>
            {{--                    end loop here--}}
        @endforeach

    </div>

</div>

    {{$posts->links()}}


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>
</html>
