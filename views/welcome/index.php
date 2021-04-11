<?php
use App\Controllers\UsersController;
use App\Session\Session;
if(isset($_POST['login'])){
    $user = new UsersController();
    $user->email = $_POST['email'];
    $user->password = bcrypt($_POST['password']);


    $user_found = UsersController::login($user->email,$user->password);
    if($user_found){
        $session = new Session();
        $session->login($user_found);
        redirect("index.php");
    }
    else{
        $msg = "<div class='text-danger'>Email or Password is incorrent</div>";

    }
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</head>
<body class="bg-dark">

    <div class="login-area col-md-12">
        <div class="m-auto py-5">
            <div class="col-md-8 py-5" style="margin-left: 20%">
                <div class="card">
                    <div class="card-header">Login</div>

                    <div class="card-body">
                        <form method="post">
                            <div class="mb-3">
                                <label for="Email" class="form-label">Email address</label>
                                <input type="email" class="form-control" id="Email1" aria-describedby="emailHelp">
                                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                            </div>
                            <div class="mb-3">
                                <label for="Password1" class="form-label">Password</label>
                                <input type="password" class="form-control" id="Password1">
                            </div>
                            <div class="mb-3">
                                <h6>Didn't Sign Up. Please <a href="register.php">Register</a></h6>
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
