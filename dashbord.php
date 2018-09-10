        <?php include "header.php"?>
        <body class="inner-page">
           <div class="page">
               
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
            
            <div class="searchFilter-main">
                
                <section class="content">
                    <div class="breadcrumb">
                        <div class="container">
                            <ul>
                                <li><a href="#">Home</a></li>
                                <li><a href="#">Dashbord</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="container">
                        <div class="venues-view">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="left-side">
                                        <div class="search">
                                           <span class="fa fa-user" style="margin-right:7px;"></span><span class="welcome">Hello </span ><span class="username"><?php echo $_SESSION["login_user"];?></span>
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
                                  <div class="left-link">
                                    <h2>People also viewed...</h2>
                                    <ul>
                                        <li><a href="#"><span class="icon icon-arrow-right"></span>Denmark</a></li>
                                        <li><a href="#"><span class="icon icon-arrow-right"></span>Germany - Frankfurt / West</a></li>
                                        <li><a href="#"><span class="icon icon-arrow-right"></span>Greater Mexico City</a></li>
                                        <li><a href="#"><span class="icon icon-arrow-right"></span>HI - Big Island</a></li>
                                        <li><a href="#"><span class="icon icon-arrow-right"></span>Hungary</a></li>
                                        <li><a href="#"><span class="icon icon-arrow-right"></span>Poland</a></li>
                                    </ul>
                                </div>
                                <div class="left-productBox hidden-sm">
                                    <h2>Featured Venues</h2>
                                    <div class="product-img"><img src="images/property-img/venues-img8.jpg" alt=""></div>
                                    <h3>Hilton Berlin </h3>
                                    <p>Mohrenstrasse 30 Berlin, 10117 - Germany</p>
                                    <div class="reviews">3.5 <div class="star"><div style="width:70%;" class="fill"></div></div>reviews</div>
                                    <a href="#">Vewi all Details <span class="icon icon-arrow-right"></span></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9 col-lg-9 col-sm-12">
                            <div class="right-side">
                                <div class="toolbar">
                                    <div class="finde-count">Your Orders  </div>
                                    
                                    
                                </div>
                                <div class="venues-slide first">
                                   <?php
                                   $id = $_SESSION["user_id"];
                                   $result2 = get_cart_by_userid($id);
    										// print_r($result2);
                                   
    										// foreach ($result2 as $value2) {
                                   
                                   
                                   ?>
                                   <div class="img"><img src="images/property-img/venues-img.jpg" alt=""></div>
                                   <div class="text">
                                      <h3></h3>
                                      <div class="address"><?php //echo $value2->Name;?></div>
                                      <div class="reviews">3.5 <div class="star"><div class="fill" style="width:70%;"></div></div>reviews</div>
                                      <div class="outher-info">
                                        <div class="info-slide first">
                                            <label>Seating Capacity</label>
                                            <span>20 - 160</span>
                                        </div>
                                        <div class="info-slide">
                                            <label>Price Range</label>
                                            <span>$ 1000 <?php //echo $value2->Price;?><small>(Onwards)</small></span>
                                        </div>
                                        <div class="info-slide">
                                            <label>Hotel Star Rating</label>
                                            <div class="star">
                                                <div class="fill" style="width:61%;"></div>
                                            </div>
                                        </div>
                                        <div class="info-slide">
                                            <label>Ordered On </label>
                                            <span>$ 5000 <?php //echo $value2->DateCreated;?><small>Order Total</small></span>
                                        </div>
                                        <div class="venues-link">
                                            <a href="#">delivered</a>
                                        </div>
                                    </div>
                                    <div class="outher-link">
                                        <ul>
                                            <li><a href="#"><span class="icon icon-calander-check"></span>Check Availability</a></li>
                                            <li><a href="javascript:;" data-toggle="modal" data-target="#contactModal1"><span class="icon icon-phone"></span>Contact Vendor</a></li>
                                            <li><a href="#"><span class="icon icon-heart"></span>Add to Wishlist</a></li>
                                            <li><a href="#"><span class="icon icon-location-1"></span>See on Map</a></li>
                                        </ul>
                                    </div>
                                    <div class="button">
                                        <a href="#" class="btn">Book Now</a>
                                        <a href="javascript:;" class="btn gray">View Details <span class="icon icon-arrow-down"></span></a>
                                    </div>
                                </div>
                                <div class="amenities-view">
                                    <h2>All Amenities :</h2>
                                    <div class="amenities-box">
                                        <div class="icon icon-tea"></div>
                                        <span>Coffee Shop</span>
                                    </div>
                                    <div class="amenities-box">
                                        <div class="icon icon-wifi"></div>
                                        <span>Wifi</span>
                                    </div>
                                    <div class="amenities-box">
                                        <div class="icon icon-parking"></div>
                                        <span>Parking</span>
                                    </div>
                                    <div class="amenities-box">
                                        <div class="icon icon-airport-shuttle"></div>
                                        <span>Airport Shuttle</span>
                                    </div>
                                    <div class="amenities-box">
                                        <div class="icon icon-bar"></div>
                                        <span>Bar</span>
                                    </div>
                                    <div class="amenities-box">
                                        <div class="icon icon-currency-xchg"></div>
                                        <span>Currency Exchange</span>
                                    </div>
                                    <div class="amenities-box">
                                        <div class="icon icon-bag"></div>
                                        <span>Business Centre</span>
                                    </div>
                                    <div class="amenities-box">
                                        <div class="icon icon-road-guide"></div>
                                        <span>Guide Service</span>
                                    </div>
                                    <div class="amenities-box">
                                        <div class="icon icon-yoga"></div>
                                        <span>Yoga Centre</span>
                                    </div>
                                    <div class="amenities-box disabled">
                                        <div class="icon icon-ayurved"></div>
                                        <span>Ayurveda Centre</span>
                                    </div>
                                    <div class="amenities-box">
                                        <div class="icon icon-payment"></div>
                                        <span>Payment Mode</span>
                                    </div>
                                    <div class="amenities-box">
                                        <div class="icon icon-ac"></div>
                                        <span>A/C</span>
                                    </div>
                                    <div class="amenities-box">
                                        <div class="icon icon-handicape"></div>
                                        <span>Handicap Facilities</span>
                                    </div>
                                    <div class="amenities-box">
                                        <div class="icon icon-doctor"></div>
                                        <span>Doctor on Call</span>
                                    </div>
                                    <div class="amenities-box">
                                        <div class="icon icon-meeting"></div>
                                        <span>Conference Hall</span>
                                    </div>
                                    <div class="amenities-box">
                                        <div class="icon icon-apple"></div>
                                        <span>Health Club</span>
                                    </div>
                                    <div class="amenities-box">
                                        <div class="icon icon-gym"></div>
                                        <span>Gym</span>
                                    </div>
                                    <div class="amenities-box disabled">
                                        <div class="icon icon-flower"></div>
                                        <span>Florist on Request</span>
                                    </div>
                                    <div class="amenities-box">
                                        <div class="icon icon-swimming"></div>
                                        <span>Swimming Pool</span>
                                    </div>
                                    <div class="amenities-box">
                                        <div class="icon icon-spoon"></div>
                                        <span>Restaurant</span>
                                    </div>
                                    <div class="amenities-box">
                                        <div class="icon icon-massage-center"></div>
                                        <span>Massage Centre</span>
                                    </div>
                                    <div class="amenities-box disabled">
                                        <div class="icon icon-steam-bath"></div>
                                        <span>Steam Sauna</span>
                                    </div>
                                    <div class="amenities-box disabled">
                                        <div class="icon icon-shirt"></div>
                                        <span>Laundry Service</span>
                                    </div>
                                    <div class="amenities-box">
                                        <div class="icon icon-spa"></div>
                                        <span>Spa</span>
                                    </div>
                                    <div class="amenities-box disabled">
                                        <div class="icon icon-beauty-saloon"></div>
                                        <span>Beauty Salon</span>
                                    </div>
                                    <div class="amenities-box">
                                        <div class="icon icon-sun-bed"></div>
                                        <span>Sun Beds</span>
                                    </div>
                                    <div class="amenities-box">
                                        <div class="icon icon-room-service"></div>
                                        <span>Room Service</span>
                                    </div>
                                    <div class="amenities-box">
                                        <div class="icon icon-taxi"></div>
                                        <span>Taxi Service</span>
                                    </div>
                                </div>
                                <div class="modal fade modal-vcenter" id="contactModal1" tabindex="-1" role="dialog">
                                    <div class="modal-dialog contactvendor-popup" role="document">
                                        <div class="modal-content">
                                            <div class="close-icon" aria-label="Close" data-dismiss="modal" ><img src="images/close-icon.png" alt=""></div>
                                            <h1>Mariom Banquet</h1>
                                            <div class="note">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</div>
                                            <div class="row">	
                                                <div class="col-sm-6">
                                                    <div class="input-slide">
                                                        <input type="text" placeholder="First Name">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="input-slide">
                                                        <input type="text" placeholder="Last Name ">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="input-slide">
                                                        <input type="text" placeholder="Email ID">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="input-slide">
                                                        <input type="text" placeholder="Phone Number">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="input-slide">
                                                        <textarea placeholder="Message"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="submit-slide">
                                                        <input type="submit" value="Send" class="btn">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php// } ?>
                            </div>
                            
                            <div class="pagination">
                                <ul>
                                    <li class="prev disabled"><a href="#">Prev</a></li>
                                    <li class="active"><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>
                                    <li><a href="#">5</a></li>
                                    <li class="next"><a href="#">Next</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </div>
    <?php include "footer.php"?>
    </div>



        <!-- Bootstrap core JavaScript
            ================================================== -->
            <!-- Placed at the end of the document so the pages load faster -->
            
            <script type="text/javascript" src="js/jquery-1.12.4.min.js"></script>
            <script type="text/javascript" src="js/bootstrap.js"></script>
            <script type="text/javascript" src="js/owl.carousel.js"></script>
            <script type="text/javascript" src="js/jquery.selectbox-0.2.js"></script>
            <script type="text/javascript" src="js/bootstrap-datepicker.js"></script>
            <script type="text/javascript" src="js/jquery.form-validator.min.js"></script>
            <script type="text/javascript" src="js/placeholder.js"></script>
            <script type="text/javascript" src="js/coustem.js"></script>
            
        </body>

        <!-- Mirrored from 115.160.244.10:8084/themeforest/event_planning/search-result.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 02 Apr 2018 06:22:04 GMT -->
        </html>

