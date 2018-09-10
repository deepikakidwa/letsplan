	<?php
	   include("function.php");
	  
	  $email = $_POST['email'];     
	  $userName = $_POST['username'];
	  $password = $_POST['password'];
	  $moblieNo = $_POST['phone'];
	  $result=create_user($email,$userName,$password,$moblieNo);
	  
	       $result1=json_decode($result);
		
			if(($result1 && $result1->affectedRows)){
			
				echo $result1->affectedRows;
			
			}
			else
			{
				
	       echo $result;				
			}
