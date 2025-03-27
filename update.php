<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

    <h1 class="main-title"> CRUD APPLICATION IN PHP </h1>    


<?php include('dbcon.php'); ?>


<div class="container w-50">

    <?php
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    
        $query = "SELECT * FROM `users` WHERE `Id` = '$id'";
    
        $result = mysqli_query($connection, $query);
    
        if(!$result){
            die("Query failed: ".mysqli_error());
        }
    
        else{
            $row = mysqli_fetch_assoc($result);
        }
    }
    
    ?>
    
    <?php
    
    if(isset($_POST['update_user'])){

        if(isset($_GET['id_new'])){
            $idnew = $_GET['id_new'];
        }


        $fname = $_POST['f_name'];
        $lname = $_POST['l_name'];
        $age = $_POST['age'];
    
        $query = "UPDATE `users` SET `First_name`='$fname', `Last_name`='$lname', `Age`='$age' WHERE `id` = '$idnew'";
    
    
        $result = mysqli_query($connection, $query);
    
    
        if(!$result){
            die("Query failed: ".mysqli_error());
        }
    
        else{
            header('location:welcome.php?message=Data has been updated successfully');
        }
    
    }
    
    ?>
    
    
        <form action="update.php?id_new=<?php echo $id; ?>" method="post">
        <div class="form-group">
            <label for="f_name">First Name</label>
            <input type="text" class="form-control" name="f_name" value="<?php echo $row['First_name']; ?>">
          </div>
          <div class="form-group">
            <label for="l_name">Last Name</label>
            <input type="text" class="form-control" name="l_name" value="<?php echo $row['Last_name']; ?>">
          </div>
          <div class="form-group">
            <label for="age">Age</label>
            <input type="text" class="form-control" name="age" value="<?php echo $row['Age']; ?>">
          </div>
          <input type="submit" class="btn btn-success" name="update_user" value="UPDATE">
        </form>
</div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>    
</body>
</html>



