  <?php
  session_start();
  include("function.php");
  $path =getall_path();
  $key=array();
  $keyvalue=array();
  foreach($path as $pp)
  {
  	$key[]=$pp->KeyName;
  	$keyvalue[]=$pp->Value;
  }
  foreach (array_combine($key, $keyvalue) as $key => $keyvalue) {
  	
  	if($key == "imagePath"){
  	//echo $key;
     $ImagePathvalue = $keyvalue;
  	}
  	if($key == "local"){
  	$localhost_api_url = $keyvalue;
  	}
  	if($key == "facebook"){
  	$facebook_url = $keyvalue;
  	}
  	if($key == "twitter"){
  	$twitter_url = $keyvalue;
  	}
  	if($key == "instagram"){
  	$instagram_url = $keyvalue;
  	}
  	if($key == "plus_google_url"){
  	$plus_google_url = $keyvalue;
  	}
  	if($key == "youtube"){
  	$youtube_url = $keyvalue;
  	}
  }

  // $SiteDomainvalue = $keyvalue[0];
  // $ImagePathvalue = $keyvalue[1];
  $imageurl=$ImagePathvalue;
  $_SESSION['imageurl']=$imageurl;
  $_SESSION['facebook_url']=$facebook_url;
  $_SESSION['twitter_url']=$twitter_url;
  $_SESSION['instagram_url']=$instagram_url;
  $_SESSION['plus_google_url']=$plus_google_url;
  $_SESSION['youtube_url']=$youtube_url;
  define("image_url", $imageurl);
  //For Login
  if(isset($_POST['btn-save'])&& !empty($_POST['btn-save'])){
    $email = $_POST["email"];
    $pass = $_POST["pass"];
    $_SESSION["Email"] = $email;
    $_SESSION["Pass"] = $pass;
    $result = user_login($email,$pass);
    if($result["auth"]==1){
  		$_SESSION["login_token"]=$result["token"];
  		$_SESSION["login_user"]=$result["username"];
  		$_SESSION["user_id"]=$result["id"];
  		$referer = $_SERVER['HTTP_REFERER'];
      header("Location: $referer");
  	}
  	else
    {
  		$_SESSION["Error"] = "<strong>Email or Password Invalid</strong>";
  }
  }	 // For Signup
   ?>
  <script type="text/javascript">
    window.setTimeout(function() {
     $(".signout").fadeTo(500, 0).slideUp(500, function(){
      $(this).remove();
    });
   }, 4000);
  </script>

  <html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <title>Event Planning</title>
    <link rel="shortcut icon" href="images/Favicon.ico">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/owl.carousel.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet" />
    <link href="css/datepicker.css" rel="stylesheet" />
    <link href="css/loader.css" rel="stylesheet">
    <link href="css/docs.css" rel="stylesheet">
    <link rel="stylesheet" href="css/smoothproducts.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" rel="stylesheet">
    <link href="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.css" rel="stylesheet" />
    <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel=" " type="text/css">
  	<link href="css/custome.css" rel="stylesheet" />
    <style>
    .dropdown {
     white-space: nowrap;
   }
   .dropdown-content {
    display: none;
    position: left;
    margin:4px;
    min-width: 140px;
    box-shadow: 0px 8px 12px 0px rgba(0,0,0,0.2);
    z-index: 1;
  }
  .dropdown-content a {
    color: black;
    padding: 11px 0px 5px 20px;
    text-decoration: none;
    font-size: 13px;
    display: block;
    text-transform: uppercase;
  }
  .dropdown-content a:hover {background-color: #ddd;}
  .dropdown:hover .dropbtn {color: white;}
  .dropdown:hover .dropdown-content {display: block;}
   .menu > li i {
      margin-right: 6px;
  }
  </style>


  <!--<script>
    $(document).ready(function(){
    $("a").on('click', function(event) {
      if (this.hash !== "") {
      event.preventDefault();
        var hash = this.hash;$('html, body').animate({
          scrollTop: $(hash).offset().top
        }, 800, function(){
          window.location.hash = hash;
        });
      } // End if
    });
  });
  </script>-->
  </head>

  <body>
    <div class="page">
      <header id="header">
              <div class="quck-link">
               <div class="mix">
                 <nav class="navbar navbar-inverse">
                  <div class="container" >
                   <div>
                     <?php  require_once("function.php"); ?>
                     <div class="mail"><a href="MailTo:info@eventplanning.com" style=" margin-left: -750px;"><span class="icon icon-envelope"></span>info@eventplanning.com</a></div>
                   <?php if(isset($_SESSION["login_token"]) && !empty($_SESSION["login_token"])) {?>
                      <div class="right-link">
                        <ul id="cartlist">
                          <li class="dropdown" style="float:left;">
  						<a href="">

  						<i class="fa fa-user" style="font-size:15px;margin-right: 5px"></i><?php echo $_SESSION["login_user"];?>
  						<span class="icon icon-arrow-down" style="font-size: 12px;"></span>
  						</a>

                          <ul class="dropdown-content" id="menu-main" aria-expanded="true" data-toggle="hover" >
                          <li><a href="account_profile.php">My Profile</a></li>
                          <li><a href="orders.php">Orders</a></li>
  						<li><a href="signout.php">Logout</a></li>
                          </ul>
                        </li>
                        <li class="dropdown cartlist">
                         <a href="#" aria-hidden="true" data-toggle="dropdown" id="cart">
                          <i class="fa fa-shopping-cart"  ></i><span id="cart_item" class="badge badge-pill badge-danger"><?php if(isset($_SESSION["shopping_cart"])) { echo count($_SESSION["shopping_cart"]); } else { echo '0';}?><?php //echo  $count_cart; ?></span></span>
                        </a>
                        <div class="dropdown-menu" id="cartinfo">
                         <div class="row total-header-section">
                          <div class="col-lg-6 col-sm-6 col-6 total-section">
                            <p> <span class="simpleCart_total_price">
                             <?php
                						  if(isset($_SESSION["shopping_cart"]))
                						  {
  						               $total = 0;
                             foreach($_SESSION["shopping_cart"] as $keys => $values) { ?>
  						              </span></p>
                           </div>
                         </div>
                         <div class="row cart-detail" style="border-bottom:1px solid #eee;">
                          <div class="col-lg-4 col-sm-3 col-4 col-4 cart-detail-img">
                            <img src="<?php  echo image_url.$values["product_image"];?>" style="width: 82px;height: 71px;">
                            </div>
                            <div class="col-lg-8 col-sm-8 col-8 cart-detail-product " style="border-left:1px solid #eee;">
                             <p><?php echo $values["product_name"];?></p>
                             <span class="price text-info">Price:- $<?php  echo $values["product_price"];?></span>
                              <span class="count">Qty:-<?php echo $values["product_quantity"];
  						               $total = $values["product_delivery_charge"]+ $total + ($values["product_quantity"] * $values["product_price"]);?></span><br>
                             <span class="count">Shipping:- $<?php echo $values["product_delivery_charge"];?></span>
                           </div>
                         </div>
                         <div class="row">
                          <div class="col-md-12 ">
                          <?php } ?>
                            <a href="mycart.php" type="button" id="mycart" class="btn btn-primary btn-block">Total $ <?php echo number_format($total, 2); ?></a>
                           <?php } else{ echo "Your cart is empty";} ?>
                          </div>
                        </div>
                      </div>
  				        	</li>
  				 <?php }
  				 else { ?>
  				 <div class="right-link">
                        <ul id="cartlist">
                          <!--<li><a href="register.php"><span class="icon icon-multi-user"></span>Become a Vendor</a></li>-->
                          <li class="registration"><a href="login.php">Signup/Login</a></li>
  						      <li class="dropdown">

                         <a href="#" aria-hidden="true" data-toggle="dropdown" id="cart">
                          <i class="fa fa-shopping-cart"  ></i><span id="cart_item" class="badge badge-pill badge-danger"><?php if(isset($_SESSION["shopping_cart"])) { echo count($_SESSION["shopping_cart"]); } else { echo '0';}?><?php //echo  $count_cart; ?></span></span>
                        </a>
                           <div class="dropdown-menu" id="cartinfo">
                         <div class="row total-header-section">
                          <div class="col-lg-6 col-sm-6 col-6 total-section text-right">
                            <p> <span class="simpleCart_total_price">
                             <?php
                						  if(isset($_SESSION["shopping_cart"]))
                						  {
  						               $total = 0;
                             foreach($_SESSION["shopping_cart"] as $keys => $values) { ?>
  						              </span></p>
                           </div>
                         </div>
                         <div class="row cart-detail" style="border-bottom:1px solid #eee;">
                          <div class="col-lg-4 col-sm-3 col-4 col-4 cart-detail-img">
                            <img src="<?php  echo image_url.$values["product_image"];?>" style="width:50px;height:50px;">
                            </div>
                            <div class="col-lg-8 col-sm-8 col-8 cart-detail-product" style="border-left:1px solid #eee;">
                             <p><?php echo $values["product_name"];?></p>
                             <span class="price text-info">Price:- $<?php  echo $values["product_price"];?></span>
                              <span class="count">Qty:-<?php echo $values["product_quantity"];
  						               $total = $values["product_delivery_charge"]+ $total + ($values["product_quantity"] * $values["product_price"]);?></span><br>
                             <span class="count">Shipping:- $<?php echo $values["product_delivery_charge"];?></span>
                           </div>
                         </div>
                         <div class="row">
                          <div class="col-md-12 ">
  						<?php } ?>
                            <a href="mycart.php" type="button" id="mycart" class="btn btn-primary btn-block">Total $ <?php echo number_format($total, 2); ?></a>
                           <?php } else{ echo "Your cart is empty";} ?>
                          </div>
                        </div>
                      </div>

  					</li>
                        </ul>
  					  <?php


  				 } ?>
  					</ul>
                </div>
              </nav>
            </div>
          </div>
          <nav id="nav-main">
            <div class="container">
              <div class="navbar navbar-inverse">
                <div class="navbar-header">
                  <a href="index.php" class="navbar-brand">
                  <img src="images/logo.png" alt="" height="80">
                  </a>
                 <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon1-barMenu"></span>
                    <span class="icon1-barMenu"></span>
                    <span class="icon1-barMenu"></span>
                  </button>


                </div>
                <div class="navbar-collapse collapse">
                 <ul class="nav navbar-nav menu">
                    <li class=""><a href="index.php"><i class="fa fa-home"></i>Home</a></li>
                    <li><a href="aboutUs.php"><i class="fas fa-info-circle"></i>About us</a></li>
                    <a href="#"><li class="single-col"><i class="fab fa-servicestack"></i>Services <span class="icon icon-arrow-down"></span></a>
                    <ul><a href="product_list.php">
  										<?php
  											$result = getall_category();
  											foreach ($result as $value) {
  												?>
  												<li class="menu_service">
  													<?php
  													if($value->ParentId==""){
  														?>
  														<a href="product_list.php?cid=<?php echo $value->Id; ?>"  cid="<?php echo $value->Id; ?>"><?php echo $value->Name; ?></a>
  														<?php } ?>
  														<?php
  														$res = get_subcategory_by_id($value->Id);
  			                      if (!empty($res)) { ?>
  			                      <ul class="submenu"><?php
  														foreach ($res as $val)
  														{
  															if($value->Id==$val->ParentId)
  															{
  																?>

  																	<li><a href="product_list.php?cid=<?php echo $val->Id; ?>"  cid="<?php echo $val->Id; ?>"  class="sub_menu"><i class="fa fa-angle-right"></i><?php echo $val->Name; ?></a></li>
  																<?php
  															}
  															else
  															{

  															}
  														}  ?>
  			                    </ul> <?php } ?>
  													</li>
  													<?php } ?>

  										</a></ul></li>
                <li><a href="contact.php"><i class="fa fa-envelope"></i>Contact us</a></li>
            </ul>

          </div>
        </div>
      </div>
    </nav>
  </header>
