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
            <h4>Existing User Login Form:</h4>
        </header>
        @if(session()->has("message"))
        <div class="alert alert-info">{{session()->get("message")}}</div>
        @endif
        <div class="card p-3 m-3">
            <form method="POST" action="{{url('/users/signin')}}">
                @csrf
                <div class="form-group">
                    <label for="email" class="font-weight-bold">Email:</label>
                    <input type="text" name="email" required class="form-control">
                </div>
                <div class="form-group">
                    <label for="pass1" class="font-weight-bold">Password:</label>
                    <input type="password" name="pass1" required class="form-control">
                </div>
                <div class="form-group text-center">
                    <button class="btn btn-sm btn-outline-primary" type="submit">Login Here</button>
                    <button class="btn btn-sm btn-outline-danger" type="reset">Clear Form</button>
                    <a class="btn btn-sm btn-outline-success" href="{{url('/users/signup')}}">Create Account</a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>