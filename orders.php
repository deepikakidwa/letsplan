      <?php include "header.php"?>
  <style>
     .venues-view .right-side .venues-slide .text .outher-info .info-slide label 
         { 
               font-size: 15px!important;
  	   }
  	  .venues-view .right-side .venues-slide .text .outher-info .info-slide span 
  	   {
      display: block;
      line-height: 20px;
      font-size: 14px;
      color: #333333;
      text-align: center;
        }
  	  div.ex1 {

  width: 75%;	
  height: 60%;
  overflow: auto;
  }
  	                   
  </style>
      <body class="inner-page">
         <div class="page">



          <div class="searchFilter-main">

              <section class="content">
                  <div class="breadcrumb">
                      
                          <ul style="padding-left:235px;">
                              <li><a href="index.php">Home</a></li>
                              <li><a href="#">Orders</a></li>
                          </ul>
                      
                  </div>
                  <div class="container">
                      <div class="venues-view">
                          <div class="row">
                              <div class="col-lg-3 col-md-3 col-sm-12">
                                  <div class="left-side">
                                      <div class="search">
                                         <span class="fa fa-user" style="margin-right:7px;"></span><span class="welcome"> Hello</span ><span class="username"><?php echo $_SESSION["login_user"];?></span>
                                     </div>
                                     <div class="filter-view">
                                      <div class="filter-block">
                                          <div class="title">
                                              <a href="dashbord.php" class="orders">My Orders<span class="fa fa-angle-double-right" style="margin-left:5px;"></span></a>
                                          </div>

                                      </div>
                                      <div class="filter-block">
                                          <div class="search">
                                              <span class="fa fa-user" ></span>Account Setting
                                              <div class="check-slide" style="margin-top:15px;">
                                                <span class="fa fa-edit" class="updateprofile"></span><a href="account_profile.php" class="orders">Update Profile</a>
                                            </div>
                                        </div>


                                    </div>
                                </div>

                          </div>
                      </div>
                      <div class="col-md-9 col-lg-9 col-sm-12 ex1">
                          <div class="right-side">
                              <div class="toolbar">
                                  <div class="finde-count">Your Orders  </div>


                              </div>
                              <div class="venues-slide first">
                                 <?php
                                 $uid = $_SESSION["user_id"];
                                 $result = ordersbyuserid($uid);

  							   // echo "<pre>";
  							    // print_r($result);
  							    // echo "</pre>";


  										 foreach ($result as $value) {


                                 ?>

                               <div class="text">
  							 <div class="row">
  							   <div class="col-md-2">
  							   <img src="<?php echo image_url.$value->productImage1;?>" alt="" style="margin-top:45px;
                                  margin-left: 16px; height:75px;width:75px;padding:7px;border:2px solid #ccc">
  							   </div>
  							   <div class="col-md-10">
  							    <h3 style="font-size:15px"><?php echo $value->productName;?></h3>
                                    <div class="address"><?php //echo $value->ProductType;?></div>
                                  <div class="outher-info">
                                      <div class="col-md-2 info-slide first">
                                          <label>Order From</label>
                                          <span><?php echo $value->OrderFrom;?></span>
                                      </div>
                                      <div class="col-md-2 info-slide">
                                          <label>Price Range</label>
                                          <span>$<?php echo $value->Amount;?></span>
                                      </div>
                                      <div class="col-md-2 info-slide">
                                        <label>Product Type</label>
                                        <div class="info-slide">
                                             <span><?php echo $value->ProductType;?></span>
                                        </div>
                                      </div>
                                      <div class="col-md-2 info-slide">
                                          <label>Ordered On </label>
                                          <span>
  										<?php 
  										if($value->DateCreated!= ''){
  										echo date("Y-M-d",strtotime($value->DateCreated));
  										}
  										else{
  										echo '-';
  										}?>
  										</span>
                                      </div>
                                      <div class="col-md-2 info-slide">
                                          <label>Delivered</label>
                                      </div>
                                  </div>
  							   </div>
  							  </div>
                              </div>
                              <?php } ?>
                              </div>
                              <!--<div class="pagination">
                              <ul>
                                  <li class="prev disabled"><a href="#">Prev</a></li>
                                  <li class="active"><a href="#">1</a></li>
                                  <li><a href="#">2</a></li>
                                  <li><a href="#">3</a></li>
                                  <li><a href="#">4</a></li>
                                  <li><a href="#">5</a></li>
                                  <li class="next"><a href="#">Next</a></li>
                              </ul>
                          </div>-->
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>
  </div>
  <?php include "footer.php"?>
  <style>
  .venues-view .right-side .venues-slide .text
    {
    padding-left:0px !important;
    }

    
  </style>
