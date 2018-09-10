  <?php include "header.php";

  	 //For Login
  // if(isset($_POST['btn-save'])&& !empty($_POST['btn-save'])){
    // $email = $_POST["email"];
    // $pass = $_POST["pass"];
    // $_SESSION["Email"] = $email;
    // $_SESSION["Pass"] = $pass;
    // $result = user_login($email,$pass);
    // if($result["auth"]==1){
  		// $_SESSION["login_token"]=$result["token"];
  		// $_SESSION["login_user"]=$result["username"];
  		// $_SESSION["user_id"]=$result["id"];
  		//header("location:mycart.php");
  		// $referer = $_SERVER['HTTP_REFERER'];
          // header("Location: $referer");
  	// }
  	// else{
  		// $_SESSION["Error"] = "<strong>Email or Password Invalid</strong>";

  // }
  // }
  	 // For Signup
  ?>

  <section class="page-header">
      <div class="container">
       <h1>LOG IN</h1>
   </div>
  </section>


  <section class="contackForm">
      <div class="container">
  	<div class="col-sm-6"  style="background-color:#d2dbd8; border:2px solid #fff;">
          <div class="row">
              <div class="col-sm-12">
               <h2 style="padding:15px;text-align:center">LOG IN</h2>
           </div>
        <form class="input-form" method="POST" id="formlogin" style="padding:15px;">
                      <div class="input-box">
                          <input type="text" placeholder="Email" name="email" value="<?php if(isset($_COOKIE["member_login"])) { echo $_COOKIE["member_login"]; } ?>" >
                      </div>
                      <div class="input-box">
                          <input type="password" placeholder="Password" name="pass" value="<?php if(isset($_COOKIE["member_password"])) { echo $_COOKIE["member_password"]; } ?>">
                      </div>
                      <div class="check-slide">
                      
                          <a href="forget.php">Forgot password ?</a>
                      </div>
  					<div class="check-slide">
  		<input type="checkbox" name="remember" id="remember" <?php if(isset($_COOKIE["member_login"])) { ?> checked <?php } ?> />
  		Remember me
  	</div>
                      <div class="submit-slide">
                          <input type="submit" value="Login" id="login" class="btn" name="btn-save" style="margin-top: 65px;">
                      </div>
                  </form>
  				
  </div>
  </div>

  	<div class="col-sm-6" style="background-color:#d2dbd8;border:2px solid #fff;">
          <div class="row">
              <div class="col-sm-12">
               <h2 style="padding:15px;text-align:center">REGISTER</h2>
           </div>
      <form class="input-form" method="POST" id="regsiterform" style="padding:15px;">
                      <div class="input-box">
                          <input type="text" placeholder="Email" name="email" >
                      </div>
                      <div class="input-box">
                          <input type="text" placeholder="username" name="username">
                      </div>
  					 <div class="input-box">
                          <input type="password" placeholder="password" name="password">
                      </div>
  					 <div class="input-box">
                          <input type="text" placeholder="phone" name="phone">
                      </div>
                      <div class="submit-slide">
                          <input type="submit" value="Register" id="regsiter_form" class="btn" name="btn-save">
                      </div>
                  </form>
  				
  			
  </div>
  </div>
  </div>
  	<div class="alert alert-success" style="display: none;">
  										</div>
  										<div class="alert alert-danger" style="display: none;">

  										</div>
  </section>
  <?php include "footer.php";?>
  <!-- -------  script for Validating form fields  ----------------   -->
  <script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.0/jquery.validate.min.js"></script>
  <script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/additional-methods.min.js"></script>


  <!-- ---------------  Validating form fields and inserting new gym record  ----------------  -->

  <script type="text/javascript">
  $(document).ready(function() {
       $("#regsiter_form").click(function() {
  jQuery.validator.addMethod("regex", function(value, element, regexpr) {
       return regexpr.test(value);
     }, "Please enter a valid number.");
         $("#regsiterform").validate({
  		       debug: true,
                  ignore: "",
                  rules: {

                          // "users[]":{
                                  // required: true,
                          // },
                          email:{
                                  required: true,
  								email:true
                          },
                          username:{
                                  required:true

                          },
  						 password:{
                                  required:true

                          },
  						  phone:{
                           required: true,
  				        regex: /^[0-9]+$/,
  				        minlength:10,
                          maxlength:10,

                          },

                  },
           submitHandler: function(form) {
             // execute my ajax method here
  		      $.ajax({
                                  url: "register.php",
                                  type: "POST",
                                  data:  new FormData(form),
                                  //data:  new FormData($(this).parents('form')[0]),
                                  contentType: false,
                                  cache: false,
                                  processData:false,
                                  success: function(data)
                                  {


  								    if(data==1)
                                          {
                        
                                       $('.alert-success').html('Registered successfully').fadeIn().delay(5000).fadeOut('slow');
                                                  setTimeout(function() {
                                                          window.location.href = "login.php";
                                                  }, 2000);
                                          }
                                          else
                                          {

                                 $('.alert-danger').html(data).fadeIn().delay(5000).fadeOut('slow');

                                          }

                                  }

                          });
                          return false;
           }
         });
       });

     });
  </script>


  <script type="text/javascript">
  $(document).ready(function() {
       $("#login").click(function() {

         $("#formlogin").validate({
  		       debug: true,
                  ignore: "",
                  rules: {

                          // "users[]":{
                                  // required: true,
                          // },
                          email:{
                                  required: true,
  								email:true
                          },
                          pass:{
                                  required:true

                          },

                  },
           submitHandler: function(form) {
             // execute my ajax method here
  		      $.ajax({
                                  url: "login_check.php",
                                  type: "POST",
                                  data:  new FormData(form),
                                  //data:  new FormData($(this).parents('form')[0]),
                                  contentType: false,
                                  cache: false,
                                  processData:false,
                                  success: function(data)
                                  {


  								    if(data==1)
                                          {

                                       $('.alert-success').html('Login successfully').fadeIn().delay(5000).fadeOut('slow');
                                                  setTimeout(function() {
                                                          window.location.href = "index.php";
                                                  }, 2000);
                                          }
                                          else
                                          {

                                 $('.alert-danger').html('please fill correct details').fadeIn().delay(5000).fadeOut('slow');

                                          }

                                  }

                          });
                          return false;
           }
         });
       });

     });
  </script>
  <style>
  .error
  {
  	color:red !important;
  	background:none !important;
  	border:none !important;
  }
  label
  {
  	display:none;
  }
  input[type="password"]
  {

      width: 100%;
      border: 1px solid #e8e8e8;
      height: 38px;
      box-sizing: border-box;
      padding: 10px;
  }
  </style>
