	 <?php
	 session_start();
	 include("function.php");

	 $email = $_POST["email"];
	 $pass = $_POST["pass"];

	  $_SESSION["Email"] = $email;
	  $_SESSION["Pass"] = $pass;
	  if(!empty($_POST["remember"])) {
					setcookie ("member_login",$_POST["email"],time()+ (10 * 365 * 24 * 60 * 60));
					setcookie ("member_password",$_POST["pass"],time()+ (10 * 365 * 24 * 60 * 60));
				} else {
					if(isset($_COOKIE["member_login"])) {
						setcookie ("member_login","");
					}
					if(isset($_COOKIE["member_password"])) {
						setcookie ("member_password","");
					}
				}
	  $result = user_login($email,$pass);
	  
	   $auth=$result["auth"];
	  if($auth==1){
			$_SESSION["login_token"]=$result["token"];
			$_SESSION["login_user"]=$result["username"];
			$_SESSION["user_id"]=$result["id"];
			
		}
		else{
			$_SESSION["Error"] = "<strong>Email or Password Invalid</strong>";		
	}
	 echo $auth;
	?>