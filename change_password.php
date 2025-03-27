<?php include('_dbconnect.php'); ?>

<?php

session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: login.php");
    exit;
}

$msg1="";
$msg2="";
$msg3="";

if (!empty($_POST["submit"])) {
    $old_password = $_POST["old_password"];
    $new_password = $_POST["new_password"];
    $co_password = $_POST["co_password"];
    if ($new_password == $co_password) 
    {
        $query ="SELECT * FROM users WHERE  password ='$old_password'" ;
        $result = mysqli_query($conn,$query);

        $count = mysqli_num_rows($result);
        if ($count>0) {
        $query1="UPDATE users SET password='$new_password'";
        mysqli_query($conn,$query1);
        $msg1= "Password Updated ! ";
    }
  else
    {
      $msg2= "Old Password Does not Match";
    }
    }

    else
    {
    $msg3=" New Password  &  Confirm  Password  Does  not  Match";
    }

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />    
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <!-- <h1>Login_Page</h1> -->
    <!-- <?php require 'partials/_nav.php'?> -->

    

        
    <!-- <h3>Welcome - <?php echo $_SESSION['email'] ?></h3> -->

    <div class="row">
        <div class="col-md-2 border vh-100 position-sticky top-0">
        <h5 class="main-title text-center my-4"> AuthoCRUD </h5> 
        <hr>
            <div class="sidebar-menu ">
                <ul class="mt-5">  
                    <li>
                    <i class="fa-solid fa-chart-line"></i>
                        <a href="welcome.php" class="text-decoration-none ms-4">Dashboard</a>
                    </li>
                    <li>
                        <span>
                            <i class="fa-solid fa-house-user text-success "></i>
                        </span>
                        <a href="welcome.php" class="text-decoration-none ms-4" >Home</a>
                    </li>
                    <li>
                        <span>
                        <i class="fa-solid fa-chart-simple text-danger"></i>
                        </span>
                        <a href="welcome.php" class="text-decoration-none ms-4">Charts</a>
                    </li>
                    <li>
                        <span>
                        <i class="fa-brands fa-wpforms text-warning"></i>
                        </span>
                        <a href="welcome.php" class="text-decoration-none ms-4">Forms</a>
                    </li>
                    <li>
                        <span>
                        <i class="fa-solid fa-table text-info"></i>
                        </span>
                        <a href="welcome.php" class="text-decoration-none ms-4">Tables</a>
                    </li>
                    <li>
                        <span>
                        <i class="fa-solid fa-unlock-keyhole text-success"></i>
                        </span>
                        <a href="/login_page/logout.php" class="text-decoration-none ms-4" >Change Password</a>
                    </li>
                    <li>
                        <span>
                        <i class="fa-solid fa-right-from-bracket text-danger"></i>
                        </span>
                        <a href="/login_page/logout.php" class="text-decoration-none ms-4" >Logout</a>
                    </li>
                </ul>

            </div>

        </div>
        <div class="col-md-10 p-0" >

                <nav class="navbar navbar-expand-lg bg-tertiary p-3 border-bottom">
                <div class="container-fluid">
                    <a class="navbar-brand " href="#"><i class="fa-solid fa-user me-2 "></i><span class="text-primary">Profile</span></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Services
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">User</a></li>
                            <li><a class="dropdown-item" href="#">Message</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Setting</a></li>
                        </ul>
                        </li>
                    </ul>
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success rounded-circle" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </form>
                    </div>
                </div>
                </nav>

                <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-8 ">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-6">
                                <div class="p-5">
                                    <div class="">
                                        <h1 class="h4 text-gray-900 mb-4">Change Password?</h1>
                                        <h4 style="color: red">


                                        <?php 
                                        if ($msg1)
                                         {
                                            echo "$msg1";
                                         }
                                        elseif ($msg2)
                                         {
                                             echo "$msg2";
                                         }
                                        else
                                         {
                                        echo "$msg3";
                                         }

                                        ?>  


                                        </h4>
                                    </div>

                                    <form  method="post"  action="" class="user ">
                                        <div class="form-group mb-4">
                                            <input type="text" name="old_password" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Enter Old Password..." required="">
                                        </div>


                                        <div class="form-group mb-4">
                                            <input type="text" name="new_password" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Enter New Password..." required="">
                                        </div>



                                        <div class="form-group mb-4">
                                            <input type="text" name="co_password" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder=" Confirm Password..." required="">
                                        </div>

                                        <div class="pt-1 mb-3">
                                        <input type="submit" name="submit" value="submit" class="btn btn-success btn-block btn-user btn-block">

                                        <a href="welcome.php" class="btn btn-danger btn-user btn-block">Cancel </a>
                                        </div>


                                    </form>
                                    <hr>
                                    <div>
                                        <a class="small text-decoration-none" href="/login_page/signup.php">Create an Account!</a>
                                    </div>
                                    <div>
                                        <a class="small text-decoration-none" href="login.php">Already have an account? Login!</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 ">
                                <img src="changePassword.png" class="img-fluid mt-5 pt-5 me-3" alt="">
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            

        </div>

    </div>
        </div>
        



        
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>