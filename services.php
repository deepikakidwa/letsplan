
  <?php include "header.php"?>
  <div class="modal modal-vcenter fade" id="loginModal" tabindex="-1" role="dialog">
      <div class="modal-dialog login-popup" role="document">
          <div class="modal-content">
              <div class="close-icon" aria-label="Close" data-dismiss="modal" ><img src="images/close-icon.png" alt=""></div>
              <div class="left-img"><img src="images/login-leftImg.png" alt=""></div>
              <div class="right-info">
                  <h1>Login</h1>
                  <div class="sosal-midiyaLogin">
                      <div class="facebook-link">
                          <a href="#"><span class="icon icon-facebook"></span>Sign in with Facebook</a>
                      </div>
                      <div class="google-link">
                          <a href="#"><span class="icon icon-google-plus"></span>Sign in with Google+</a>
                      </div>
                  </div>
                  <div class="or-text"><span>OR</span></div>
                  <div class="input-form">
                      <div class="input-box">
                          <div class="icon icon-user"></div>
                          <input type="text" placeholder="Username">
                      </div>
                      <div class="input-box">
                          <div class="icon icon-lock"></div>
                          <input type="text" placeholder="Password">
                      </div>
                      <div class="check-slide">
                          <div class="check">
                              <label class="label_check" for="checkbox-02"><input type="checkbox" name="sample-checkbox-01" id="checkbox-02" value="1" checked="">Remember me</label>
                              
                          </div>
                          <a href="#">Forgot password ?</a>
                      </div>
                      <div class="submit-slide">
                          <input type="submit" value="Login" class="btn">
                      </div>
                  </div>
                  <div class="signUp-link">Haven’t signed up yet? <a href="javascript:void(0);">Sign Up</a></div>
              </div>
          </div>
      </div>
  </div>
  <div class="modal modal-vcenter fade" id="registrationModal" tabindex="-1" role="dialog">
      <div class="modal-dialog registration-popup" role="document">
          <div class="modal-content">
              <div class="close-icon" aria-label="Close" data-dismiss="modal" ><img src="images/close-icon.png" alt=""></div>
              <h1>New Member Registration</h1>
              <div class="registration-form">
                  <div class="info">
                      <h2>Why to sign up</h2>
                      <ul>
                          <li>Exclusive discounts for all bookings</li>
                          <li>Full access all discounted prices</li>
                          <li>Dedicated wed-ordinator for your event</li>
                          <li>Custom event planner for your event</li>
                      </ul>
                  </div>
                  <div class="form-filde">
                      <div class="input-box">
                          <input type="text" placeholder="Email ID">
                      </div>
                      <div class="input-box">
                          <input type="text" placeholder="Username">
                      </div>
                      <div class="input-box">
                          <input type="text" placeholder="Password">
                      </div>
                      <div class="input-box">
                          <input type="text" placeholder="Phone">
                      </div>
                      <div class="captcha-box">
                          <input type="text" placeholder="Enter Captcha">
                          <div class="captcha-img"><img src="images/capcha-img.png" alt=""></div>
                      </div>
                      <div class="note">Can’t Read ?<a href="#">Refresh</a></div>
                      <div class="check-slide">
                          <label class="label_check" for="checkbox-03"><input type="checkbox" name="sample-checkbox-01" id="checkbox-03" value="1" checked="">By signing up, I agree to EventPlanning terms of services</label>
                      </div>
                      <div class="submit-slide">
                          <input type="submit" value="Register" class="btn">
                      </div>
                  </div>
              </div>
          </div>    
      </div>
  </div>
  <section class="page-header widthBgimg" style="background-image:url(images/banner-img/service-bannerImg.jpg); ">
      <div class="container">
         <h1>
          <?php
  											//$id=$_GET['id'];
  										//	echo"id is = ".$id;
  											//$result = get_category_by_id($id);
  											//foreach ($result as $value) {
  												//echo "id=".$value->Id."<br>";
  												//echo $value->Name."<br>";
  												//echo "Description=".$value->Description."<br>";
  												//echo "images=".$value->images."<br>";
          ?>
          
          
      </h1>
  </div>
  </section>
  <section class="content">
      <div class="container">
        <div class="service-view">
           <div class="row">
              <div class="col-md-3">
                 <div class="left-side">
                    <div class="filter-view">
                     <div class="filter-block">
                        <div class="title">
                           <h2>Decor & Florists</h2>
                       </div>
                       <div class="check-slide">
                           <label class="label_check" for="checkbox-1">
                               <input name="sample-checkbox-01" id="checkbox-1" value="1" type="checkbox" onclick="myFunction()">Wedding Flowers</label>
                           </div>
                           <div class="check-slide">
                               <label class="label_check" for="checkbox-2">
                                   <input name="sample-checkbox-01" id="checkbox-2" value="1" type="checkbox" onclick="myFunction()">Balloon Decorations</label>
                               </div>
                               <div class="check-slide">
                                   <label class="label_check" for="checkbox-3">
                                       <input name="sample-checkbox-01" id="checkbox-3" value="1" type="checkbox" onclick="myFunction()">Room Decor</label>
                                   </div>
                                   <div class="check-slide">
                                       <label class="label_check" for="checkbox-4">
                                           <input name="sample-checkbox-01" id="checkbox-4" value="1" type="checkbox" onclick="myFunction()">Car Decoration</label>
                                       </div>
                                   </div>
                               </div>
                               <div class="filter-view">
                                   <div class="filter-block booking-form">
                                      <div class="title">
                                         <h2>Enter Booking Details </h2>
                                     </div>
                                     <div class="form-filde">
                                         <div class="row">
                                            <div class="col-sm-12">
                                             <div class="input-box">
                                                <input type="text" placeholder="Name">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                         <div class="input-box">
                                            <input type="text" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                       <div class="input-box">
                                        <input type="text" placeholder="Mobile">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                   <div class="input-box">
                                    <input type="text" placeholder="Date">
                                </div>
                            </div>
                            <div class="col-sm-6">
                               <div class="input-box">
                                <input type="text" placeholder="Time">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="submit-box">
                               <input type="submit" value="Book Now" class="btn">
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>
  </div>
  <div class="col-md-9">
     <div class="service-right">
        <div class="event-info">
           <h2><?php echo $value->Name; ?></h2>
           <p>
            <?php echo $value->Description."<br>"; ?>
        </p>
        <div class="service-details">
          <div class="row">
             <div class="col-sm-4">
                <div class="img">
                   <img src="images/property-img/locationImg5.jpg" alt="">
               </div>
           </div>
           <div class="col-sm-8">
            <h3>Ideal to be availed for:</h3>
            <ul class="customList">
               <li>Real Wedding Flowers</li>
               <li>Christmas Arrangements</li>
               <li>Local Florists</li>
               <li>Engagement Ceremony</li>
               <li>Social Events</li>
               <li>Flowers Advice & Etiquette</li>
               <li>Preparing bouquets</li>
           </ul>
           <table>
               <td align="left" valign="top"></td>
           </table>
       </div>
   </div>
  </div>
  </div>
  <div class="event-galler">
   <h2>Photo Gallery</h2>
   <div class="event-gallerSlider">
      <?php
      $result = getall_category();
      foreach ($result as $value) {
       
          ?>

          <div class="item">
             <img src="<?php echo $value->images;?>">	
         </div>
     <?php }  
     ?>
  </div>
  </div>
  </div>
  </div>
  </div>
  </div>        
  </div>
  </section>

  </div>
  <?php include"footer.php"?>

      <!-- Bootstrap core JavaScript
          ================================================== -->
          <!-- Placed at the end of the document so the pages load faster --> 
          <script type="text/javascript" src="js/jquery-1.12.4.min.js"></script>
          <script type="text/javascript" src="js/bootstrap.js"></script>
          <script type="text/javascript" src="js/owl.carousel.js"></script>
          <script type="text/javascript" src="js/jquery.selectbox-0.2.js"></script>
          <script type="text/javascript" src="js/jquery.form-validator.min.js"></script>
          <script type="text/javascript" src="js/placeholder.js"></script>
          <script type="text/javascript" src="js/coustem.js"></script>


