<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <style>
        textarea {
            height: 1000px;
        }
    </style>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>admin Module</title>
</head>
<body>
<center>
    <h3 label for="admin">Update Module</h3>
    <br>
    <br>
    <form action="{{url('/update')}}/{{$post->id}}" method="post" onsubmit="myFunction()">
        @csrf
        <table style="text-align: center">
            <tr>
                <td>
                    <label for="blog heading">Blog Heading: </label>
                </td>
                <td>
                    <input type="text" name="title" required class="form-control" value="{{$post->title}}">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="blog heading">Category: </label>
                </td>
                <td>
                    <input type="text" name="category" required class="form-control" value="{{$post->category}}">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="description">Blog Description: </label>
                </td>
                <td>
                    <textarea class="form-control" rows="10" name="body"
                              value="">{{$post->body}}</textarea>
                </td>

            </tr>

            <tr>

            </tr>
            <tr>
                <td>
                    <input type="submit" value="Update" class="btn btn-danger" name="add"/>
                </td>
            </tr>

        </table>
    </form>
</center>


</table>

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
<script>
    function myFunction() {
        alert("Blog updated Successfully");
    }
</script>
</body>
</html>
