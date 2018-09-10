	<?php
		require("function.php");
		//require_once 'include/config.php';
		session_start();
		
		if( isset( $_POST['password'] ) && !empty($_POST['password'])){
			//$password =md5( trim( $_POST['password'] ) );
			
			$admin_id = $_SESSION['login_token'];
			$password = $_POST['password'];
			
			$result = check_old_password($admin_id,$password);
			if($result){
				echo 'true';
			}
			else{
				echo 'false';
			}
			exit;
		}
		