
<?php 

  if (session_status() == PHP_SESSION_NONE) {
      session_start();
    }

  if (isset($_SESSION['user_loged']) && isset($_SESSION['user_role'])) {
  	# code...
  		header('Location: ../index.php');
  }else{
  	header('Location: login.php');
  }

  



?>