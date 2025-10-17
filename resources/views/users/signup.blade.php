<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUP Page</title>

    {{-- Bootstrap 4 CSS --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>
        body {
            background: linear-gradient(135deg, #00c6ff, #0072ff);
            font-family: 'Segoe UI', sans-serif;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .signup-container {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            padding: 30px;
            width: 100%;
            max-width: 650px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
            animation: fadeIn 1s ease-in-out;
        }

        .modal-header h4 {
            color: white;
            text-shadow: 1px 1px 2px black;
        }

        .form-control {
            background-color: rgba(255, 255, 255, 0.8);
            border: none;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 123, 255, 0.6);
            transform: scale(1.02);
        }

        .btn {
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        }

        .alert {
            animation: slideDown 0.5s ease;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: scale(0.95);
            }

            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body>

    <div class="signup-container">
        <header class="modal-header border-0">
            <h4 class="m-auto">Sign Up</h4>
        </header>

        {{-- Flash Messages --}}
        @if(session()->has("message"))
        @if(session()->get("message")=="signup_success")
        <div class="alert alert-success">SignUP Done.</div>
        @elseif(session()->get("message")=="signup_error")
        <div class="alert alert-danger">Unable to SignUp Now</div>
        @endif
        @endif

        {{-- Validation Errors --}}
        @if($errors->any())
        <ul class="list-unstyled">
            @foreach($errors->all() as $error)
            <li class='alert alert-danger mb-2'>{{$error}}</li>
            @endforeach
        </ul>
        @endif

        {{-- Signup Form --}}
        <form method="POST" action="{{url('/users/signup')}}" novalidate enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <div class="row">
                    <div class="col">First Name:
                        <input type="text" name="fname" required class="form-control" value="{{old('fname')}}">
                    </div>
                    <div class="col">Last Name:
                        <input type="text" name="lname" required class="form-control" value="{{old('lname')}}">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col">Phone:
                        <input type="number" name="phone" id="phone" required class="form-control" value="{{old('phone')}}">
                    </div>
                    <div class="col">Email:
                        <input type="text" name="email" id="email" required class="form-control" value="{{old('email')}}">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col">Password:
                        <input type="password" name="pass1" id="pass1" required class="form-control">
                    </div>
                    <div class="col">Confirm Password:
                        <input type="password" name="pass2" id="pass2" required class="form-control">
                    </div>
                </div>
            </div>
            <div class="form-group">
                Upload Profile Pic : <input type="file" name="avatar" id="avatar" required class="form-control" onchange="loadImage(event)">
                <div id="image_preview"></div>
                <script type="text/javascript">
                    function loadImage(event) {
                        console.log(event.target.files[0]);
                        imageBLOB = URL.createObjectURL(event.target.files[0]);
                        console.log(imageBLOB);
                        document.getElementById("image_preview").innerHTML = `
                            <img src="${imageBLOB}" height='100px' width='100px' class='img-thumbnail'/>
                          `;
                    }
                </script>
            </div>
            <div class="form-group text-center">
                <button class="btn btn-primary btn-sm px-4">Submit</button>
                <button type="reset" class="btn btn-danger btn-sm px-4">Reset</button>
            </div>
        </form>
    </div>

    {{-- Bootstrap JS --}}
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>