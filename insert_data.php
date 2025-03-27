<?php

include('dbcon.php');

if(isset($_POST['add_user'])){
    $f_name = $_POST['f_name'];
    $l_name = $_POST['l_name'];
    $age = $_POST['age'];

    if($f_name == "" || empty($f_name)){
        header('location:index.php?message=you need to fill in the first name! ');
    }

    else{

        $query = "insert into `users` ( `First_name`, `Last_name`, `Age`) values ('$f_name','$l_name','$age')";

        $result = mysqli_query($connection, $query);

        if(!$result){
            die("Query failed: ".mysqli_error());
        }

        else{
            header('location:welcome.php?message=Data has been added successfully');
        }
    }
}

?>