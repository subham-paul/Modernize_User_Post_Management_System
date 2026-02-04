<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Post</title>
    <?php include_once("ssi/plugins.php"); ?>
</head>

<body>
    <header class="modal-header">
        <h4>Add New Post:</h4>
    </header>
    <div class="container">
        <div class="card p-3 m-3">
        @if(session()->has("USER"))
        <div class="text-right">Welcome {{session()->get("USER")}}
            <a class="btn btn-sm btn-outline-secondary" href="{{url('/users/logout')}}">Logout</a>
        </div>
        @else
        <script>
            alert("UnAuthorized Access");
            window.location.href = "{{url('/users/signin')}}";
        </script>
        @endif
            <form method="POST" action="{{url('/posts/submit')}}">
                @csrf
                <div class="form-group">
                    <label for="post_title" class="font-weight-bold">Title:</label>
                    <input type="text" name="post_title" required class="form-control">
                </div>
                <div class="form-group">
                    <label for="post_desc" class="font-weight-bold">Description:</label>
                    <textarea name="post_desc" id="post_desc" cols="30" rows="5" class="form-control"></textarea>
                </div>
                <div class="form-group text-center">
                    <button class="btn btn-sm btn-outline-primary">Add Post</button> |
                    <button class="btn btn-sm btn-outline-success">Clear Form</button> |
                    <a class="btn btn-sm btn-outline-dark" href="{{url('/')}}">View All Posts</a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>