<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View All Records</title>
    @php include_once("ssi/plugins.php") @endphp
</head>

<body>
    <header class="modal-header">
        <h1>Displaying all Posts :</h1>
        <a class="btn btn-sm btn-outline-danger" href="{{url('/posts/add')}}">Add Post Here</a>
    </header>
    <div class="container-fluid">
        @if(session()->has("USER"))
        <div class="float-right">Welcome {{session()->get("USER")}}
            <a class="btn btn-sm btn-outline-primary" href="{{url('/users/profile')}}">Profile</a>
            <a class="btn btn-sm btn-outline-secondary" href="{{url('/users/logout')}}">Logout</a>

        </div>
        @else
        <script>
            alert("UnAuthorized Access");
            window.location.href = "{{url('/users/signin')}}";
        </script>
        @endif
        @if(session()->has("message"))
        @if(session()->get("message")=="post_insert_success")
        <div class="alert alert-success">One Post Added Successfully !</div>
        @elseif(session()->get("message")=="post_insert_error")
        <div class="alert alert-danger">Unable to add Post right Now</div>
        @elseif(session()->get("message")=="post_update_success")
        <div class="alert alert-info">One Post Updated..</div>
        @elseif(session()->get("message")=="post_update_error")
        <div class="alert alert-warning">Unable to Edit Post Now.</div>
        @elseif(session()->get("message")=="post_delete_success")
        <div class="alert alert-success">One Post Deleted Successfully...</div>
        @elseif(session()->get("message")=="post_delete_error")
        <div class="alert alert-danger">Unable to Delete The Post !</div>
        @endif
        @endif
        @if(!empty($posts))
        <div class="table-responsive">
            <table class="table table-hover">
                <tr>
                    <th>View Details:</th>
                    <th>Title:</th>
                    <th>Description:</th>
                    <th>Created:</th>
                    <th>Posted By:</th>
                </tr>
                @foreach($posts as $post)
                <tr>
                    <td><a class="btn btn-sm btn-outline-primary" href="{{url('/post')}}/{{$post->post_id}}">View Here</a></td>
                    <td>{{$post->title}}</td>
                    <td>{{$post->description}}</td>
                    <td>{{ date("d-m-y h:i:sA",strtotime($post->created))}}</td>
                    <td>{{$post->name}}</td>
                </tr>
                @endforeach
            </table>
        </div>
        @endif
    </div>
</body>

</html>