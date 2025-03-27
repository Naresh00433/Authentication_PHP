<?php include('_dbconnect.php'); ?>

<?php

if(isset($_GET['email'])){
    $email = $_GET['email'];
        $from = 'nareshkmr507@gmail.com';
        $password = ['password'];   
        $to = $email;
        $fromName = "Naresh kumar   ";
        $subject = "Your Recovered Password";
        $message = "Please use this password to login " . $password;
        $headers = 'From:' . $fromName. '<'.$from . '>';
        if(mail($to, $subject, $message, $headers)){
            echo "Your Password has been sent to your email id";    
        }
    }

?>

<h3>Forgot Password</h3>
<form action="forgot.php" method="GET">
    <input type="email" name="email" placeholder="Enter you registered email"><br><br><br>  
    <button type="submit" >Get password in email </button>
</form>