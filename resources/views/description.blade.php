<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Open+Sans&display=swap');

        body {
            font-family: 'roboto', sans-serif;
            background-color: #eee;
        }

        .main-row {
            margin: 8%;
            background-color: white;
            box-shadow: 0 0 10px 10px rgba(0, 0, 0, .05);
            border-radius: 0.5rem;
        }

        .blog-img > img {
            width: 100%;
            height: 100%;
            transform: translateY(-30px);
            object-fit: cover;
            border-radius: 0.5rem;
            box-shadow: 0 0 8px 3px rgba(0, 0, 0, .3);
        }

        .blog-date span {
            color: #962c51;
        }

        .ul-cls {
            justify-content: center;
        }

        .ul-cls li {
            cursor: pointer;
        }

        .blog-title > h2 {
            font-size: small;
            font-weight: 400;
        }

        /*.blog-desc > p{*/
        /*    font-style: normal;*/
        /*    line-height: 2;*/
        /*}*/

    </style>

    <title>My Blog</title>
</head>

<body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>


<div class="container">
    <div class="row main-row p-2">
        <div class="col-lg-4 col-md-12 col-sm-12">
            <div class="blog-img">
                <img src="/images/img.png.jpg" alt="#" class="img-fliud">

            </div>
            <div class="row">
                <div class="col-sm-12 mb-2">
                    <ul class="list-group list-group-horizontal ul-cls">
                        <li class="list-group-item">
                            <i class="fa fa-behance fa-2x" aria-hidden="true"></i>
                        </li>
                        <li class="list-group-item">
                            <i class="fa fa-facebook fa-2x" aria-hidden="true"></i>
                        </li>
                        <li class="list-group-item">
                            <i class="fa fa-dribbble fa-2x" aria-hidden="true"></i>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
        <div class="col-lg-8 col-md-12 col-sm-12">
            <div class="blog-title mb-3">
                <h3>{{$posts->title}}</h3>

            </div>
            <div class="blog-date mb-2">
                <span>{{$posts->weekday}}</span>
                <span>{{$posts->date}}</span>
            </div>
            <div class="blog-desc mb-2">

                <p style="font-size: small;text-align: justify-all;">
                    {{$posts->body}}
                </p>

            </div>

            <div class="blog-read-more mb-2">
                {{--                <a href="{{url('/')}}"</a>--}}
                <a href="/">

                    <button class="btn btn-outline-dark">Return Back</button>
                </a>

            </div>


        </div>

    </div>
    <div class="row">
        @auth
            <h6>Comments:</h6>
            <form method="post" action="{{url('/addcomment')}}">
                @csrf

                <textarea name="comment" rows="3" cols="70"></textarea>
                <input type="hidden" name="post_id" value="{{$posts->id}}">
                <br>
                <button type="submit" value="Add" class="btn btn-outline-dark">Add</button>


            </form>


    </div>
    <div>

        @foreach($posts->comments as $comment)
            {{--            <b>{{$comment->comment}}</b>--}}
            <br>
            <b>{{$comment->user->name}}</b>
            <small style="font-size: 11px">{{$comment->created_at}}</small>@if(auth()->user()->id===$comment->user->id) <a href="{{url('/comment')}}/{{$comment->id}}">delete</a>@endif
{{--            <a href="{{url('/update/')}}/{{$post->id}}">--}}
            <br>
            <text>{{$comment->comment}}</text>

            <br>
            @foreach($comment->replies as $reply)
                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<b></b>

                <b>{{$reply->user->name}}:</b>
                <text>{{$reply->description}}</text>
                <br>
            @endforeach
            <form action="{{url('/addreply')}}" method="post">
                @csrf
                <textarea name="reply" rows="1" cols="50"></textarea>
                <button class="btn btn danger" type="submit">Reply</button>
                <input type="hidden" name="comment_id" value="{{$comment->id}}">
            </form>
        @endforeach

        <br>
        {{--        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<b>User:</b><text>This is a demo reply</text>--}}
        {{--        <br>--}}
        {{--        <textarea name="comment" rows="2" cols="50"></textarea>--}}
        {{--        <button class="btn btn danger">Reply</button>--}}
        {{--        @endforeach--}}
    </div>
    @endauth


</div>

</body>

</html>
