<?php include('dbcon.php'); ?>

<?php

session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location : login.php");
    exit;
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
                        <a href="charts.php" class="text-decoration-none ms-4">Charts</a>
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
                        <a href="/login_page/change_password.php" class="text-decoration-none ms-4" >Change Password</a>
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
            <div class="container px-5 py-2 ">
                        <div class="cards">
                            <div class="card" style="width: 18rem;">
                                <div class="card-body">
                                    <p>Total Employees</p>
                                </div>
                            </div>
                            <div class="card" style="width: 18rem;">
                                <div class="card-body">
                                <p>Present Employees</p>
                                </div>
                            </div>
                            <div class="card" style="width: 18rem;">
                                <div class="card-body">
                                <p>Performance</p>
                                
                                </div>
                            </div>
                            <div class="card" style="width: 18rem;">
                                <div class="card-body">
                                <p>Services</p>
                                </div>
                            </div>

                            </div>


                            <div class="card my-4">
                                <div class="card-header p-3 " style="display: flex; justify-content: space-between; ">
                                <h4>Employee Details</h6>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">ADD USER</button>
                                </div>
                                <div class="card-body px-5 pt-4">
                                    <div class="row">
                            
                            <table class="table table-hover table-bordered table-striped text-center">
                                <thead>
                                    <tr>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Age</th>
                                        <th>Updation</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>

                                                <?php

                                                $query = "SELECT * FROM `users`";

                                                $result = mysqli_query($connection, $query);

                                                if(!$result){
                                                    die("Query failed: ".mysqli_error($connection));
                                                }

                                                else {
                                                    while($row = mysqli_fetch_assoc($result)){
                                                        ?>

                                                        <tr>
                                                           
                                                            <td><?php echo $row['First_name']; ?></td>
                                                            <td><?php echo $row['Last_name']; ?></td>
                                                            <td><?php echo $row['Age']; ?></td>
                                                            <td><a href=" update.php?id=<?php echo $row['Id']; ?>" class="btn btn-success">Update</a></td>
                                                            <td><a href="delete.php?id=<?php echo $row['Id']; ?>" class="btn btn-danger">Delete</a></td>
                                                        </tr>

                                                        <?php
                                                    }
                                                }

                                                ?>
                                </tbody>
                            </table>

                            <div class="box">
                                
                        
                </div> 
                


                






        </div>
        







        <?php

        if (isset($_GET['delete_msg'])) {
        echo "<h6>".$GET['delete_msg']."</h6>";
        }

        ?>

    <form action="insert_data.php" method="post">
        <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label for="f_name">First Name</label>
                        <input type="text" class="form-control" name="f_name">
                    </div>
                    <div class="form-group">
                        <label for="l_name">Last Name</label>
                        <input type="text" class="form-control" name="l_name">
                    </div>
                    <div class="form-group">
                        <label for="age">Age</label>
                        <input type="text" class="form-control" name="age">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-success" data-bs-dismiss="modal" name="add_user" value="ADD">
                </div>
            </div>
        </div>
    </form>



        
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>