<head>

    <title>Blog App</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

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
            {{--            @auth--}}
            {{--                <li class="nav-item">--}}
            {{--                    <a class="nav-link" href="{{url('/dashboard')}}">Dashboard</a>--}}
            {{--                </li>--}}
            {{--            @endauth--}}
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!

                </div>
                <a href="{{route('blog.create')}}">
                    <button class="btn btn btn-primary">Add</button>
                </a>

                <table class="table">
                    <thead>
                    <tr>
                        <th>Blog id</th>
                        <th>Blog Heading</th>
                        <th>description</th>
                        <th colspan="2">Operations</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($posts as $post)
                        @auth
                            @if(auth()->user()->id===$post->user->id)
                                <tr>
                                    <td>{{$post->id}}</td>
                                    <td>{{$post->title}}</td>
                                    <td>{{$post->body}}</td>
                                    <td>
                                        <a href="{{url('/update/')}}/{{$post->id}}">

                                            <button class="btn btn-primary">Update</button>

                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{url('/delete')}}/{{$post->id}}">

                                            <button class="btn btn-danger">Delete</button>

                                        </a>
                                    </td>
                                </tr>
                            @endif
                        @endauth
                    @endforeach

                    </tbody>


                </table>


            </div>
        </div>
    </div>
</x-app-layout>
