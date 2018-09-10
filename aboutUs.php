<?php include "header.php" ;?>
        <title>About Us</title>
        <section class="page-header">
            <div class="container">
                <h1>about us</h1>
            </div>
        </section>
        <section class="content">
            <div class="container">
                <div class="home-event">
                    <div class="heading">
                        <div class="icon"><em class="icon icon-heading-icon"></em></div>
                        <div class="text">
                            <h2>Welcome to our website</h2>
                        </div>
                        <div class="info-text">All the information you will need is listed below, just click on the page you want to view and that's it.</div>
                        <div class="stickLine"></div>
                    </div>
                   <div class="row">
                        <div class="col-sm-12">
						<?php 
						$result = getall_aboutus();
						?>
                            <div class="text-center">
                            	<?php foreach($result as $value){
									echo $value->About;
								}
								?>
							</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="upCommingEvents">
            <div class="container">
                <div class="sub-title">
                    <div class="icon"><em class="icon icon-heading-icon"></em></div>
                    <h2>Our Upcoming Events</h2>
                    <div class="img"><img alt="" src="images/heading-blackBgimg.png" /></div>
                </div>
                <div class="eventSchedule">
                    <div class="schedule">
                        <span class="schedulecircle">03</span>
                        <span>Days</span>
                    </div>
                    <div class="schedule">
                        <span class="schedulecircle">05</span>
                        <span>Hours</span>
                    </div>
                    <div class="schedule">
                        <span class="schedulecircle">42</span>
                        <span>Minutes</span>
                    </div>
                    <div class="schedule">
                        <span class="schedulecircle">18</span>
                        <span>Seconds</span>
                    </div>
                </div>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it  type specimen book.</p>
            </div>
        </section>
        <section class="otherInfo">
            <div class="container">
                <div class="heading">
                    <div class="icon"><em class="icon icon-heading-icon"></em></div>
                    <div class="text">
                        <h2>Lorem Ipsum is simply dummy text</h2>
                    </div>
                    <div class="info-text">All the information you will need is listed below, just click on the page you want to view and that's it.</div>
                    <div class="stickLine"></div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <ul class="customList">
                            <li>Weding Planner</li>
                            <li>Sangeet - Sandhya</li>
                            <li>Special Entry For Groom & Bride</li>
                            <li>Theam Decoration</li>
                            <li>Birthday Party</li>
                            <li>Corporate Meet</li>
                            <li>Exhibitions</li>
                            <li>Theam Decoration</li>
                            <li>Birthday Party</li>
                        </ul>
                    </div>
                    <div class="col-sm-3">
                        <ul class="customList">
                            <li>Brand Promotion</li>
                            <li>Road Show</li>
                            <li>Live Performance</li>
                            <li>Celebrity Management</li>
                            <li>Professional Sound & Light, Trus</li>
                            <li>DJ, Orchestra , Garba</li>
                            <li>Led Screen</li>
                            <li>Road Show</li>
                            <li>Live Performance</li>
                        </ul>
                    </div>
                    <div class="col-sm-6">
                        <div class="otherImages">
                            <img src="images/about-us/img1.jpg" alt="image 1" />
                            <img src="images/about-us/img2.jpg" alt="image 2" />
                            <img src="images/about-us/img3.jpg" alt="image 3" />
                            <img src="images/about-us/img4.jpg" alt="image 4" />
                            <img src="images/about-us/img5.jpg" alt="image 5" />
                            <img src="images/about-us/img6.jpg" alt="image 6" />
                            <img src="images/about-us/img7.jpg" alt="image 7" />
                        </div>
                    </div>
                </div>
            </div>
        </section>
      <?php include "footer.php" ;?>    
</body>
</html>
