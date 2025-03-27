
<?php

if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
  $loggedin= true;
}
else{
  $loggedin = false;
}

echo '<nav class="navbar navbar-expand-lg bg-grey">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">AuthoCRUD</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarScroll">
      <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/login_page/welcome.php">Home</a>
        </li>';

        if(!$loggedin){
        echo '<li class="nav-item">
          <a class="nav-link" href="/login_page/login.php">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/login_page/signup.php">Signup</a>
        </li>';
        }

        if($loggedin){
        echo '<li class="nav-item">
          <a class="nav-link" href="/login_page/logout.php">Logout</a>
        </li>';  
        
        }
      echo '</ul>
    </div>
  </div>
</nav>' ;

?>