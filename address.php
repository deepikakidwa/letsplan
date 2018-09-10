	<?php 
	include "header.php";
	?>
	<head>
	<meta name="viewport" content="width=device-width, initial-scale=1"></head>
	<style>
	div.ex1 {
	    
	    width: 30%;
	    height: 27%;
	    overflow: auto;
	}
	</style>
	 <div class="step-nav">
	            <div class="container">
	                <div class="inner-nav">	
	                    <ul>
	                      <!-- <li class="first active"><a href="mycart.php"><span class="number">1</span><span class="text">Cart Summary</span></a></li>
							<li style="margin-right:70px"><a href="address.php"><span class="number" >2</span><span class="text">Address Details</span></a></li>
	                        <li style="margin-left:70px"><a href="Product_Details.php"><span class="number">3</span><span class="text">Payment Details</span></a></li>
	                        <li class="last"><a href="order.php"><span class="number">4</span><span class="text">Order Confirm</span></a></li>-->
							
							 <li class="first fill"><a href="#"><span class="number">1</span><span class="text">Cart Summary</span></a></li>
							  <li class="active" style="margin-right:70px"><a href="#"><span class="number">2</span><span class="text">Address Details</span></a></li>
	                        <li class="" style="margin-right:70px"><a href="#"><span class="number">3</span><span class="text">Payment Details</span></a></li>
	                        <li class="last"><a href="#"><span class="number">4</span><span class="text">Order Confirm</span></a></li>
	                    </ul>
	                </div>
	            </div>
	        </div>
			   <div class="breadcrumb">
	                <ul style="padding-left:235px;">
	                    <li><a href="index.php">Home</a></li>
	                    <li class="active"><a href="#">Address Details</a></li>
	                </ul>
	            </div>
	        <div class="container">
			   <div class="row">
			   <div class="col-lg-12 col-sm-12 col-md-12">
			          <h2>DELIVERY INFORMATION</h2>
			   <p>please provide the address deatails</p>
			    <div class="alert alert-danger" style="display:none;">
	                                   </div>
									   </div>
			     <form method="post" id="delivery_address" name="myForm" action="payment_details.php" onsubmit="return validateContact()">
	                        <div class="col-lg-4 col-sm-12 col-md-4">
	                            
								   <div class="col-lg-12"> 
								    <span id="profile-info" class="info"></span><br/>
								   <select class="form-control demoInputBox" name="profile" id="profile" style="width:100%;background:#fff;">
								  
									<option value="">Select Your Profile</option>
									<option>Mr.</option>
									<option>Mrs.</option>
								  </select></div><br><br>
								  <span id="firstname-info" class="info"></span><br/>
								<input type="text" name="firstname" id="firstname" class="form-control demoInputBox" placeholder="First Name" style="width:92%;padding:4px;margin-left:15px">
								
								  <div class="col-lg-12"> 
								  <span id="location-info" class="info"></span><br/>
								  <select class="form-control demoInputBox" name="location" id="location" style="width:100%;background:#fff;">
								  
									<option value="">Select the location</option>
									<option>2</option>
									<option>3</option>
									<option>4</option>
								  </select></div><br><br>
								  <span id="phone-info" class="info"></span><br/>
								<input type="text" name="phone" placeholder="Phone" id="phone" class="form-control demoInputBox" style="width:92%;padding:4px;margin-left:15px">
									  <div class="col-lg-12">
									   <span id="block-info"  class="info"></span><br/>
								      <input type="text" name="block" placeholder="Block" id="block" class="form-control demoInputBox" style="width:100%;padding:4px;"></div>
									  
									  
									  </div>
							<div class="col-lg-4 col-sm-12 col-md-4">
	                          <span id="address-info"  class="info"></span><br/>
								 <input type="text" name="address" id="address" class="form-control demoInputBox" placeholder="Address Profile Name" style="width:92%;padding:4px;margin-left:15px">
								<span id="lastname-info"  class="info"></span><br/>
								<input type="text" name="lastname"  id="lastname" class="form-control demoInputBox" placeholder="Last Name" style="width:92%;padding:4px;margin-left:15px">

								  <div class="col-lg-12 ">
								  <span id="street-info"  class="info"></span><br/>
								      <input type="text" name="street"  id="street" class="form-control demoInputBox"  placeholder="Street" style="width:100%;padding:4px;"></div><br>
								  <span id="avenue-info"  class="info"></span><br/>
								  <input type="text" name="avenue" id="avenue" class="form-control demoInputBox" placeholder="Avenue" style="width:92%;padding:4px;margin-left:15px">
			                </div>
						
							
								  <div class="col-lg-4 col-sm-12 col-md-4 ex1" style="border:1px solid #eae5e5;">
	                          <h2 class="text-center" style="padding-top:20px;font-size:15px">ORDER SUMMARY</h2><hr>
							  <?php  
	                                    if(!empty($_SESSION["shopping_cart"]))  
	                                    {  
	                                         $total = 0;  
	                                         foreach($_SESSION["shopping_cart"] as $keys => $values)  
	                                         {  
											 ?>	
	                       <h5 style="color:#fff;background-color:#a0c1b8;padding:5px"><?php echo $values["product_name"]; ?></h5><br>										 
							<div class="row">			 
							   <div class="col-lg-6 col-sm-6" style="max-height:100%;">
							       <img src="<?php echo image_url.$values['product_image'];?>" style="max-width:125px;">
								   
								<?php
								
								?>
								  
		                          <input type="hidden" name="product_id[]" id="product_id" value="<?php echo$values['product_id'];?>" /> 
									<input type="hidden" name="product_price[]" id="product_price" value="<?php echo$values['product_price'];?>" /> 
									<input type="hidden" name="product_name[]" id="product_name" value="<?php echo$values['product_name'];?>" /> 
									<input type="hidden" name="product_type[]" id="product_type" value="<?php echo$values['product_type'];?>" />
									<input type="hidden" name="product_quantity[]" id="product_quantity" value="<?php echo$values['product_quantity'];?>" />
								    <input type="hidden" name="product_date[]" id="product_date" value="<?php echo$values['product_date'];?>" /> 
									<input type="hidden" name="product_delivery_charge[]" id="product_delivery_charge" value="<?php echo$values['product_delivery_charge'];?>">							
							  </div>
							  
							  <div class="col-lg-6 col-sm-6" >
							         <span style="color:#000;font-weight:bold;">PRICE:$<?php echo $values["product_price"]; ?></span><br>
							         <span style="color:#000;font-weight:bold;">QUANTITY:<?php echo $values["product_quantity"];?></span>
							         <span style="color:orange;font-weight:bold;">Varient:<?php echo $values["product_varient"]; ?></span><br>
								<span style="color:orange;font-weight:bold;">Date:<?php echo $values["product_date"]; ?><span><br>
							  </div>
							</div>
							<br>	 
	                       <div class="col-lg-12 col-sm-12">
	                             <span style="color:#000;font-weight:bold;">DELIVERY CHARGE:$ <?php echo $values["product_delivery_charge"]; ?></span><br>
						   					   
							</div>
							<div class="col-lg-12 col-sm-12" style="background-color:#a0c1b8;">
							 <span style="color:#fff;font-weight:bold;margin-left:35%">Total:$ <?php echo $total = $values["product_delivery_charge"]+ $total + ($values["product_quantity"] * $values["product_price"]);?> </span></div><br><hr>
											 <?php }?>
						    <div class="col-lg-12 col-sm-12" style="background-color:#a0c1b8;">
							<span style="color:#fff;font-weight:bold;padding:20px;">GRAND TOTAL:$ <?php echo number_format($total, 2); ?></span></div>
										<?php  }?>
		                  </div>
						   <input type="submit" class="btn btn-primary" value="Continue" style="padding:6px;width:25%" >
							 
							     </form>
		                   </div>
						</div>
						  
					  

		  <?php include "footer.php"?>
		 <!-- -------  script for Validating form fields  ----------------   -->
		  <script>
	function validateContact() {
		var valid = true;	
		$(".demoInputBox").css('background-color','');
		$(".info").html('');
		
		if(!$("#profile").val()) {
			$("#profile-info").html("(required)");
			$("#profile").css('background-color','#FFFFDF');
			valid = false;
		}
		if(!$("#firstname").val()) {
			$("#firstname-info").html("(required)");
			$("#firstname").css('background-color','#FFFFDF');
			valid = false;
		}
		if(!$("#location").val()) {
			$("#location-info").html("(required)");
			$("#location").css('background-color','#FFFFDF');
			valid = false;
		}
		if(!$("#phone").val()) {
			$("#phone-info").html("(required)");
			$("#phone").css('background-color','#FFFFDF');
			valid = false;
		}
		
		if(!$("#phone").val().match(/^\(?(\d{3})\)?[-\. ]?(\d{3})[-\. ]?(\d{4})$/)) {
			$("#phone-info").html("(invalid)");
			$("#phone").css('background-color','#FFFFDF');
			valid = false;
		}
		if(!$("#block").val()) {
			$("#block-info").html("(required)");
			$("#block").css('background-color','#FFFFDF');
			valid = false;
		}
		if(!$("#address").val()) {
			$("#address-info").html("(required)");
			$("#address").css('background-color','#FFFFDF');
			valid = false;
		}
		if(!$("#lastname").val()) {
			$("#lastname-info").html("(required)");
			$("#lastname").css('background-color','#FFFFDF');
			valid = false;
		}
		if(!$("#street").val()) {
			$("#street-info").html("(required)");
			$("#street").css('background-color','#FFFFDF');
			valid = false;
		}
		if(!$("#avenue").val()) {
			$("#avenue-info").html("(required)");
			$("#avenue").css('background-color','#FFFFDF');
			valid = false;
		}
		// if(!$("#userEmail").val()) {
			// $("#userEmail-info").html("(required)");
			// $("#userEmail").css('background-color','#FFFFDF');
			// valid = false;
		// }
		// if(!$("#userEmail").val().match(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/)) {
			// $("#userEmail-info").html("(invalid)");
			// $("#userEmail").css('background-color','#FFFFDF');
			// valid = false;
		// }
		// if(!$("#subject").val()) {
			// $("#subject-info").html("(required)");
			// $("#subject").css('background-color','#FFFFDF');
			// valid = false;
		// }
		// if(!$("#content").val()) {
			// $("#content-info").html("(required)");
			// $("#content").css('background-color','#FFFFDF');
			// valid = false;
		// }
		
		return valid;
	}
	</script>

	<style>
	.error {
		
		background:none !important;
		color:red !important;
	}
	div.ex1 {
	    
	    width: 30%;	
	    height: 43%;
	    overflow: auto;
	}
	.demoInputBox{padding:7px; border:#F0F0F0 1px solid; border-radius:4px;}

	.info{font-size:.8em;color: #FF6600;letter-spacing:2px;padding-left:5px;}
	</style>

