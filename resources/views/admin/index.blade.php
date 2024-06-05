<!doctype html>
<html lang="en" class="no-js">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Car Rental Portal | Admin Login</title>
    <link rel="stylesheet" href="admin/css/font-awesome.min.css">
    <link rel="stylesheet" href="admin/css/bootstrap.min.css">
    <link rel="stylesheet" href="admin/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="admin/css/bootstrap-social.css">
    <link rel="stylesheet" href="admin/css/bootstrap-select.css">
    <link rel="stylesheet" href="admin/css/fileinput.min.css">
    <link rel="stylesheet" href="admin/css/awesome-bootstrap-checkbox.css">
    <link rel="stylesheet" href="admin/css/style.css">
</head>

<body>

    <div class="login-page bk-img" style="background-image: url(https://img.freepik.com/free-photo/abstract-digital-grid-black-background_53876-97647.jpg?w=740&t=st=1712506973~exp=1712507573~hmac=11f165d1ac93ec85c6c5fac8047e66e76c5c3f541b0c32ff1d2b8c3fae39c0f5);">
        <div class="form-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <h1 class="text-center text-bold text-light mt-4x">Sign in</h1>
                        <div class="well row pt-2x pb-3x bk-light">
                            <div class="col-md-8 col-md-offset-2">
							<form method="POST" action="{{ route('login') }}">
             				 @csrf
                                    <label for="" class="text-uppercase text-sm">Your Username </label>
                                    <input class="form-control" id="email" type="email" name="email" value="{{ old('email') }}" class="form-control mb">

                                    <label for="" class="text-uppercase text-sm">Password</label>
                                    <input id="password" type="password" name="password" class="form-control"placeholder="Password" class="form-control mb">

                                    <button type="submit" class="btn btn-primary btn-block">LOGIN</button>
                                    <p id="demo"></p>
                                </form>

                                @if(session('role') === 'admin')
                                    <script>
                                        window.location = "/dashboard";
                                    </script>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Loading Scripts -->
    <script src="admin/js/jquery.min.js"></script>
    <script src="admin/js/bootstrap-select.min.js"></script>
    <script src="admin/js/bootstrap.min.js"></script>
    <script src="admin/js/jquery.dataTables.min.js"></script>
    <script src="admin/js/dataTables.bootstrap.min.js"></script>
    <script src="admin/js/Chart.min.js"></script>
    <script src="admin/js/fileinput.js"></script>
    <script src="admin/js/chartData.js"></script>
    <script src="admin/js/main.js"></script>

</body>

</html>
