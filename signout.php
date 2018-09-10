	  <?php
	  session_start();
	  unset($_SESSION['login_token']);
	  unset($_SESSION['login_user']);
	  $_SESSION['signout']="Logout";
	  header("Location:index.php");
	  ?>

	  
