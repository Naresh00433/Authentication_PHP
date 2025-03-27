
<?php include('_dbconnect.php'); ?>


<?php
$login=false;
$showError=false;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // include 'partials/_dbconnect.php';
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "select * from users where email = '$email' and password = '$password'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
  
    if($num >= 1){
          $login = true;
          session_start();
          $_SESSION['loggedin'] = true;
          $_SESSION['email'] = $email;
          header("Location: welcome.php"); 
          exit();
      }
    else {
        $showError = "Invalid credentials";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login page</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">

</head>
<body>
    <!-- <h1>Login_Page</h1> -->
    <!-- <?php require 'partials/_nav.php'?> -->
    
    <?php
    if($login){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> You are logged in.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }

    if($showError){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> '. $showError .'
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
    ?>

    <div class="container ">

        <div class="row bg-white border border-gray-300 shadow-lg rounded-3 p-4 my-4">
            <div class="col-sm-12 col-md-6 col-lg-6 ">
                <img src="fingerprint.jpg" class="img-fluid rounded-3" style="height:600px; width:650px; " alt="login">
            </div>


            <div class="col-sm-12 col-md-6 col-lg-6 p-5  ">
            <h1 class="text-primary">Login To Our Website</h1>

            <h4 class="mt-3">HELLO AGAIN! 👋</h4>
            <p class="w-75">Enter your credentials and step into a world of secure data management.</p>

            <form class="row g-3" action="/login_page/login.php" method="post">
                <div class="col-8">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" >
                </div>
                <div class="col-8">
                    <label for="password" class="form-label">password</label>
                    <input type="password" class="form-control" id="password" name="password" >
                </div>
                <div class="col-8">
                    <button type="submit" class="btn btn-primary w-100 my-1 rounded-3 p-2">Log in</button>
                </div>
                <h6><a class="text-decoration-none" href="/login_page/forgot.php">Forgot Password ?</a></h6>
                <div class="separator "><span>OR</span></div>
                <h6><a class="text-decoration-none" href="/login_page/signup.php">Register yourself !</a></h6>
            </form>

            </div>

        </div>

    
    </div>
<!-- 
    <div class="container w-50 bg-white border border-gray-300 shadow-lg rounded-5 my-5 pb-4 px-5">
        
        <h1 class="text-center mt-5 mb-5">Login To Our Website</h1>
        
        <form class="row g-3" action="/login_page/login.php" method="post">
            <div class="col-12">
                <label for="email" class="form-label">email</label>
                <input type="text" class="form-control" id="email" name="email">
            </div>
            <div class="col-12">
                <label for="password" class="form-label">password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary w-100 my-5 rounded-3 p-2">Log in</button>
            </div>
        </form>
    </div>
     -->
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>