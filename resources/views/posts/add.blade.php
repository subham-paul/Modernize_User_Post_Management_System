<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Post</title>
    <?php include_once("ssi/plugins.php"); ?>
</head>

<body>
    <div class="container">
        @if(session()->has("USER"))
        <div class="float-right">Welcome {{session()->get("USER")}}
            <a href="{{url('/users/logout')}}">Logout</a>

        </div>
        @else
        <script>
            alert("UnAuthorized Access");
            window.location.href = "{{url('/users/signin')}}";
        </script>
        @endif
        <header class="modal-header">
            <h4>Add New Post:</h4>
        </header>
        <form method="POST" action="{{url('/posts/submit')}}">
            @csrf
            <div class="form-group">Title : <input type="text" name="post_title" required class="form-control"></div>
            <div class="form-group">Description: <textarea name="post_desc" id="post_desc" cols="30" rows="10" class="form-control"></textarea> </div>
            <div class="form-group">
                <button class="btn btn-sm btn-outline-primary">Add</button> |
                <button class="btn btn-sm btn-outline-success">Reset</button>
            </div>
        </form>
    </div>
</body>

</html>