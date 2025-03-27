<?php

include('dbcon.php');

?>

<?php
if(isset($_GET['id'])){
    $id = $_GET['id'];

    $query = "delete from `users` where `Id` = '$id'";

    $result = mysqli_query($connection, $query);

    if(!$result){
        die("Query failed: ".mysqli_error());
    }

    else{
        header('location:welcome.php?message=Data has been deleted successfully');
    }
}
?>