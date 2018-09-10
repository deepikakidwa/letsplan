
<?php include "header.php"?>
<body class="inner-page">
    <div class="page">
    	
        <div class="dashboard-banner">
            <div class="container">
                <h2>My Dashboard</h2>
                <div class="breadcrumb">
                    <ul>
                        <li><a href="#">Home</a>/</li>
                        <li class="active"><a href="#">My Profile</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="container">
                <div class="my-account">
                      <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home" style="color:#a0c1b8;">Profile</a></li>
    <li><a data-toggle="tab" href="#menu1" style="color:#a0c1b8;">Change Password</a></li>

  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane active">
          <div class="personal-edit">
                        </div>
                        <div class="personal-information">
						<?php
						 $uid = $_SESSION["user_id"];
						  $result = get_userprofile($uid);
						   foreach ($result as $value) {
						  ?>
						  
						  
						  <form id="update_profile" name="update_profile" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
                        <div class="change-password ">
                            <div class="input-box">
                                <input type="text" class="form-control" name="username" value="<?php echo $value->UserName;?>" id="username" placeholder="Enter User Name">
                            </div>
							<div class="input-box">
                                <input type="email" class="form-control" name="email" value="<?php echo $value->Email;?>" id="email" placeholder="Enter Email">
                            </div>
							<div class="input-box">
                                <input type="text" class="form-control" name="mobile" value="<?php echo $value->Mobile;?>" id="mobile" placeholder="Enter Mobile">
                            </div>
							<div class="input-box">
                                <input type="text" class="form-control" name="dob" value="" id="dob" placeholder="Enter Date Of Birth">
                            </div>
                      
					  <div class="input-box">
                                <input type="text" class="form-control" name="gender" value="" id="gender" placeholder="Enter Gender">
                            </div>
                            <div class="submit-box">
                                <input type="submit" value="Update Profile" class="btn btn-lg">
                            </div>
                        </div>
						<div id="display"></div>
						</form>
						   <?php } ?>
                        </div>
    </div>
    <div id="menu1" class="tab-pane fade">
      <div class="alert alert-success alert-block" id="successMessage" style="display:none;">Password Changed Successfully	</div> 
			
				
				<form id="password_validate" name="password_validate" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
                        <div class="change-password ">
                            <div class="input-box form-group">
                                <input type="text" class="form-control" name="password" id="password" placeholder="Current Password">
                            </div>
                            <div class="input-box form-group">
                                <input type="password" class="form-control" name="newepassword" id="newepassword" placeholder="New Password">
                            </div>
                            <div class="input-box form-group">
                                <input type="password" class="form-control" name="confirmpassword" id="confirmpassword"  placeholder="Confirm Password">
                            </div>
                            <div class="submit-box form-group">
                                <input type="submit" value="Save" class="btn">
                            </div>
                        </div>
						</form>
    </div>
  </div>
</div>
                    
                </div>
                <!--  <div class="functionality-view">
                    <div class="row">
                        <div class="col-sm-6 col-md-3">
                            <div class="functionality-box">
                                <div class="iconBox"><div class="icon icon-lead-management"></div></div>
                                <h3>Lead Management</h3>
                                <p>Increase occupancy, automate the lead management process, grow your  customer relationships, match sales-ready leads to the appropriate sales people.</p>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="functionality-box">
                                <div class="iconBox"><div class="icon icon-sales"></div></div>
                                <h3>Sales</h3>
                                <p>Track sales opportunities, manage the sales process and generate proposals. Built-in process provides an aggregate view of account activity from the past, present and future.</p>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="functionality-box">
                                <div class="iconBox"><div class="icon icon-booking"></div></div>
                                <h3>Booking</h3>
                                <p>Manage calendars , share availability, easily view events color-coded by status, type or location. Book and manage multiple spaces, venues, and sites all from one master calendar.</p>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="functionality-box">
                                <div class="iconBox"><div class="icon icon-operations"></div></div>
                                <h3>Operations</h3>
                                <p>Assign resources and review stock alerts. Create detailed reports, work orders, and generate invoices. Receive alerts on changes as they take place.</p>
                            </div>
                        </div>
                    </div>
                </div> !-->
            </div>
        </div>
		    </div>
		
        <?php include "footer.php"?>



	<!-- -------  script for Validating form fields  ----------------   -->

<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>

<script>
	jQuery.validator.addMethod("selectnic", function (value) {
		if ( /[a-z]/.test(value)  && /\d/.test(value) && /[\d`~!@#$%\^&*()+=|;:'",.<>\/?\\\-]/.test(value) && /[A-Z]/.test(value)) {
			return true;
			} else {
			return false;
		};
	});
	
	$( "#password_validate").validate({
		rules: {
			password: {
				required: true,
				remote: {
					url: "check-password.php",
					type: "post",
					data: {
						password: function() {
							// alert($( "#password" ).val());
							return $( "#password" ).val();
						}
					}
				}
				
			},
			newepassword: {
				selectnic: true,
				required: true,
				minlength:6,	
				//selectnic: "Use alphanumeric format(ex:- qwer123) "
			},
			confirmpassword : {
				required : true,
				minlength: 6,
				equalTo: "#newepassword"
			}
		},
		messages:{
			password:{
				required : 'Please enter old password',
				remote:'old password is not correct'
			},
			newepassword : {
				required : "Please enter password",
				selectnic: "Use alphanumeric format(ex:- Twer123) "
			},
			confirmpassword : {
				required : "Please enter confirm password",
				equalTo: "Password and confirm password doesn't match"
			}
		},
		submitHandler: function(form) {
			var pass = $('#newepassword').val();
			var confirm_pass = $('#confirmpassword').val();
			alert(pass);
			$.ajax({
				url: "password_success.php",
				type: "POST",
				data: { newepassword : pass,confirmpassword : confirm_pass},
				success: function(data)
				{
					
					//$("#successMessage").html(data).show();
					//$("form").trigger("reset");  
				//	$(".alert").removeClass("in").show();
				//	$(".alert").delay(2000).addClass("in").fadeOut(2000);
					// setTimeout(function() {
						// window.location.href = "vendors.php";
					// }, 2000);
				}
				
			});
		}
	});
</script>

<script>
jQuery.validator.addMethod("regex", function(value, element, regexpr) {          
		return regexpr.test(value);
	}, "Please enter a valid number."); 

	$( "#update_profile" ).validate({
		rules: {
			username: {
				required: true,
			},
			email: {
				required: true,
			},
			mobile : {
				required:true,
				regex: /^[0-9]+$/,
				minlength:10,
				maxlength:10,

			},
			dob : {
				required : true,
			},
			gender : {
				required : true,
			}
		},
		messages:{
			username:{
				required : $('.close').alert();,

			},
			email : {
				required : "email is required",
			},
			mobile : {
				required : "Please enter mobile number",
			}
		},
		submitHandler: function(form) {
			
			$.ajax({
				url: "update_profile.php",
				type: "POST",
				//data: { newepassword : pass,confirmpassword : confirm_pass},
				data: new FormData(form),
				success: function(data)
				{
					
					$("#display").html(data).show();
					//$("form").trigger("reset");  
				//	$(".alert").removeClass("in").show();
					//$(".alert").delay(2000).addClass("in").fadeOut(2000);
					setTimeout(function() {
						window.location.href = "update_profile.php";
					}, 2000);
				}
				
			});
		}
	});
</script>

<script>
	$(document).ready(function(){
	$( "#password" ).focus();
	});
</script>
<style>
.my-account .tab-content {
    background: #fff;
    overflow: hidden;
  display: block !important; 
}
.error {
  background: none !important;
    border: none !important;
    color: red !important;
	  display: block;
}
</style>
