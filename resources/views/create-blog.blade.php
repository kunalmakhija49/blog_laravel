<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <style>
        textarea {
            padding: 10px;
            max-width: 100%;
            line-height: 1.5;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-shadow: 1px 1px 1px #999;
        }
    </style>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>admin Module</title>
</head>
<body>
<center>
    <h3 label for="admin">Author Module</h3>
    <br>
    <br>
    <form action="{{url('/blog/add')}}/" method="post" onsubmit="myFunction()">
        @csrf
        <table style="text-align: center">
            <tr>
                <td>
                    <label for="blog heading">Blog Heading: </label>
                </td>
                <td>
                    <input type="text" name="heading" required class="form-control">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="description">Blog Description: </label>
                </td>
                <td>
                    <textarea class="form-control" rows="10" name="description" required></textarea>
                </td>

            </tr>

            <tr>

            </tr>
            <tr>
                <td>
                    <input type="submit" value="Submit" class="btn btn-danger" name="add"/>
                </td>
            </tr>
            <tr>
                <td></td>
                <td><a href=""/>View all blogs</td>
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
        alert("Blog Added Successfully");
    }
</script>
</body>
</html>
