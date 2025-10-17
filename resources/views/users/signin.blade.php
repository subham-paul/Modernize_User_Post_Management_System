<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignIn Page</title>
    <?php include_once("./ssi/plugins.php"); ?>
</head>

<body>
    <div class="container">
        <header class="modal-header">
            <h4>SIGNIN:</h4>
        </header>
        @if(session()->has("message"))
        <div class="alert alert-info">{{session()->get("message")}}</div>
        @endif
        <form method="POST" action="{{url('/users/signin')}}">
            @csrf
            <div class="form-group">Email : <input type="text" name="email" required class="form-control"></div>
            <div class="form-group">Password : <input type="password" name="pass1" required class="form-control"></div>
            <div class="form-group"><button class="btn btn-sm btn-outline-primary">Login</button></div>
        </form>
    </div>
</body>

</html>