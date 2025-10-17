<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Post Details</title>
    @php include_once("ssi/plugins.php") @endphp
</head>

<body>
    <header class="modal-header">
        <h4>Showing Post Info:</h4>
    </header>
    <div class="container card p-3 m-3">
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
        @if(!empty($post))
        <form method="POST" action="{{url('/posts/update')}}">
            @csrf
            <input type="hidden" name="post_id" value="{{$post->post_id}}">
            <p class="form-group">
                Title : 
                <input type="text" name="editTitle" value="{{$post->title}}" class="form-control">
            </p>
            <p class="form-group">
                Description: 
                <textarea name="editDesc" id="editDesc" cols="30" rows="10" class="form-control">{{$post->description}}</textarea> 
            </p>
            <p class="form-group">Created :{{ date("d-m-y h:i:sA",strtotime($post->created))}}</p>
            <button class="btn btn-sm btn-outline-info">UPDATE</button> |
            <a class="btn btn-sm btn-outline-danger" onclick="return confirm('Do You want to Delete This Post ?');" href="{{url('/posts/delete')}}/{{$post->post_id}}">DELETE</a> |
            <a class="btn btn-sm btn-outline-dark" href="{{url('/posts/all')}}">Back</a>
        </form>
        @endif
    </div>
</body>

</html>