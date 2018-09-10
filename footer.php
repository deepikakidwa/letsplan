      <footer id="footer">
          <div class="footer-top">
              <div class="container">
                  <div class="row">
                      <div class="col-lg-3 col-sm-6 col-md-3 text-center">
                          <div class="footer-link">
                              <h5>Eventatty</h5>
                              <ul>
                                  <li><a href="index.php" id="Service_footer">Services</a></li>
                                  <li><a href="aboutUs.php">About Us</a></li>
                                 <!--  <li><a href="privacy_policy.php">Privacy Policy</a></li> -->
                                  <!-- <li><a href="career.php">Careers</a></li> -->
                                  <!-- <li><a href="blog.php">Blogs</a></li> -->
                                  <li><a href="contact.php">Contact Us</a></li>
                              </ul>
                          </div>
                      </div>
  					 <?php
  					   $result = getall_contactus();
  					   foreach($result as $value){ 
  					?>
                      <div class="col-lg-3 col-sm-6 col-md-3">
                          <div class="footer-contact">
                              <h5>Contact us</h5>
                              <div class="contact-slide">
                                  <div class="icon icon-phone"></div>
                                  <p><?php echo $value->Mobile; ?></p>
                              </div>
                              <div class="contact-slide">
                                  <div class="icon icon-location-1"></div>
                                  <p><?php echo $value->Address; ?></p>
                              </div>

                              <div class="contact-slide">
                                  <div class="icon icon-message"></div>
                                  <a href="mailTo:<?php echo $value->Email; ?>"><?php echo $value->Email; ?></a>
                              </div>
                          </div>
                      </div>
  					   <?php } ?>
                      <div class="col-lg-3 col-sm-6 col-md-3">
                          <div class="contact-form">
                              <h5>Connect with us</h5>
                              <p>We'll keep you informed and updated Sign up for our email newsletters </p>
                                  <div class="sosal-midiya">
  								<?php 
  								//$facebook_url = $_SESSION['facebook_url'];
  							//	str_replace(array('<br/>', '&', '"'), ' ', $string);instagram_url
  								?>
                                      <ul>
                                          <li><a href="<?php echo $_SESSION['facebook_url']; ?>" target="_BLANK"><span class="icon icon-facebook"></span></a></li>
                                          <li><a href="<?php echo $_SESSION['twitter_url'];?>" target="_BLANK"><span class="icon icon-twitter"></span></a></li>
                                          <li><a href="<?php echo $_SESSION['instagram_url'];?>" target="_BLANK"><span class="icon icon-instagram"></span></a></li>
                                          <li><a href="<?php echo $_SESSION['plus_google_url'];?>" target="_BLANK"><span class="icon icon-google-plus"></span></a></li>
                                          <li><a href="<?php echo $_SESSION['youtube_url'];?>" target="_BLANK"><span class="icon icon-play"></span></a></li>
                                      </ul>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="footer-bottom">
                  <div class="container" style="color:#fff;">
                   <p>Copyright &copy; Eventatty <span><?php date("Y") ?></span> | All Rights Reserved</p>
               </div>
           </div>
       </footer>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	      <script type="text/javascript" src="js/bootstrap.js"></script>
  		<script type="text/javascript" src="js/jquery-1.12.4.min.js"></script>
          <script type="text/javascript" src="js/owl.carousel.js"></script>
  <script src="js/jquery.min.js"></script>
     
       <script type="text/javascript" src="js/owl.carousel.js"></script>
       <script type="text/javascript" src="js/jquery.selectbox-0.2.js"></script>
       <!--<script type="text/javascript" src="js/bootstrap-datepicker.js"></script>-->  
       
   <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <!--<script src="https://code.jquery.com/jquery-1.12.4.js"></script>-->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
    $( function() {
      $("#pro_date").datepicker({
  	 minDate: 0 
  	});
    } );
    </script>
     <script>
    $( function() {
      $("#datepicker2").datepicker({
  	 minDate: 0 
  	});
    } );
    </script>
       <script>
    $( function() {
      $("#filter_date").datepicker({
  	 minDate: 0 
  	});
    } );
    </script>
    <script>
  $('.menu_service').filter(function(){
  				    return $.trim($(this).html()) == '';
  }).hide()
  $('.menu_service:has(ul)').prepend('<i class="fa fa-angle-right pull-right"></i>');
  </script>
  <script>
  function searchform() {
  var service_type = document.forms["search"]["service_type"].value;
  var location = document.forms["search"]["location"].value;
  var date = document.forms["search"]["date"].value;
  if (service_type == "") {
  alert("service_type must be filled out");
  return false;
  }
  if (location == "") {
  alert("location must be filled out");
  return false;
  }
  if (date == "") {
  alert("date must be filled out");
  return false;
  }
  }
  </script>
  <style>
  .datepicker-dropdown:before
  {
  border-right: 0px solid transparent !important;
  border-bottom: 0px solid #ccc !important;
  border-top: 0;
  border-bottom-color: rgba(0, 0, 0, 0.2);
  }
  </style>
