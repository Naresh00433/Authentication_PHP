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

    

        
    <!-- <h3>Welcome - <?php echo $_SESSION['username'] ?></h3> -->

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



                <div class="container px-5 py-3">
                            <div class="row">
                                <h5>Charts</h5>
                                    <div class="col-12 border">
                                        <canvas id="myChart"></canvas>
                                        </div>

                                        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

                                        <script>
                                        const ctx = document.getElementById('myChart');

                                        new Chart(ctx, {
                                            type: 'bar',
                                            data: {
                                            labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                                            datasets: [{
                                                label: '# of Votes',
                                                data: [12, 19, 3, 5, 2, 3],
                                                borderWidth: 1
                                            }]
                                            },
                                            options: {
                                            scales: {
                                                y: {
                                                beginAtZero: true
                                                }
                                            }
                                            }
                                        });
                                        </script>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xl-3">
              
                            </div>


        

    </div>
        



        
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>