<?php

$showAlert=false;
$showError=false;
$fill_password=false;
$fill_email=false;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include '_dbconnect.php';
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    $exists=false;
    if(($password == $cpassword) && $exists == false){
      $sql = "INSERT INTO `users` ( `email`, `password`, `date`) VALUES ('$email', '$password', current_timestamp())";
      $result = mysqli_query($conn, $sql);
  
      if($result){
          $showAlert = true;
      }
      if($password==null){
        $sql=null;
        $fill_password = "please enter the password";
    }

    if($email==null){
        $sql=null;
        $email = "please enter the email";
    }
    }
    else {
        $showError = "Passwords do not match";
    }

    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp page</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <!-- <h1>Login_Page</h1> -->
    <!-- <?php require 'partials/_nav.php'?> -->

    <?php
    if($showAlert){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Your account is now created and you can login.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }

    if($showError){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> '. $showError .'
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }

    if($fill_password){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> '. $fill_password .'
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }

    if($fill_email){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> '. $fill_email .'
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
    ?>



<div class="container ">

<div class="row bg-white border border-gray-300 shadow-lg rounded-3 my-4">
    <div class="col-sm-12 col-md-6 col-lg-6 my-4">
        <img src="ai.jpg" class="img-fluid rounded-3" style="height:600px; width:650px; margin-left:15px;" alt="login">
    </div>


    <div class="col-sm-12 col-md-6 col-lg-6 p-5 ">
    <h3 class="text-primary">Signup To Our Website</h3>

    <h5 class="mt-3">HELLO AGAIN! 👋</h5>
    <p class="w-75">Enter your credentials and step into a world of secure data management.</p>

    <form class="row g-3" action="/login_page/signup.php" method="post">
        <div class="col-8">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" name="email" >
        </div>
        <div class="col-8">
            <label for="password" class="form-label">password</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <div class="col-8">
                <label for="cpassword" class="form-label">confirm password</label>
                <input type="password" class="form-control" id="cpassword" name="cpassword" required>
            </div> 
        <div class="col-8">
            <button type="submit" class="btn btn-primary w-100 my-1 rounded-3 p-2">Sign in</button>
        </div>
        <div class="separator"><span>OR</span></div>
        <h6>If already have an account,<a class="text-decoration-none" href="/login_page/login.php"> Login</a></h6>
    </form>

    </div>

</div>


</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>