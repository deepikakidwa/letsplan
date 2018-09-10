	<?php require("header.php"); ?>
	<!--<div id="loader-wrapper">
		<div id="loader"><img src="images/loader.gif" alt=""></div>
		<div class="loader-section section-left"></div>
		<div class="loader-section section-right"></div>
	</div>-->
	<section class="banner style3">
		<div class="Homebanner">
			<div id="myCarousel" class="carousel slide" data-ride="carousel">
				<!-- Indicators -->
				<ol class="carousel-indicators">
					<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
					<li data-target="#myCarousel" data-slide-to="1"></li>
					<li data-target="#myCarousel" data-slide-to="2"></li>
				</ol>
				<!-- Wrapper for slides -->
				<div class="carousel-inner">
					<div class="item active">
						<img src="images/banner-img/slider-img.jpg"  class="tales" %>
						<div class="carousel-caption">
							<h3>Los Angeles</h3>
							<p>LA is always so much fun!</p>
						</div>
					</div>

					<div class="item">
						<img src="images/banner-img/6.jpg" class="tales" %>
						<div class="carousel-caption">
							<h3>Chicago</h3>
							<p>Thank you, Chicago!</p>
						</div>
					</div>
					<div class="item">
						<img src="images/banner-img/7.jpg"  class="tales" %>
						<div class="carousel-caption">
							<h3>New York</h3>
							<p>We love the Big Apple!</p>
						</div>
					</div>
				</div>

			</div>
		</div>
		<?php
		if(isset($_SESSION["Register"])){?>
			<div class="alert alert-success signout" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<?php echo $_SESSION["Register"]; ?>
				</div> <?php unset($_SESSION['Register']); } ?>
				<div class="banner-text">
					<div class="container">
						<div class="search-title">
							<h1 class="">Every Event Should be <span>Perfect</span></h1>
						</div>
						<div class="banner-slogan">Create the Perfect Event</div>
						<!--
						<div class="banner-search">
						
							<form method="post" name="search" action="search.php" onsubmit="return searchform()">
								<div class="input-box">
									<div class="icon icon-grid-view"></div>
									<select class="select-box" name="location" id="searchTextField">
									<option value="">select Location</option>
									<?php 
										 // $result = getall_locations();
										// foreach($result as $value){
										?>
										<option value="<?php// echo $value->LocationName; ?>"><?php //echo $value->LocationName; ?></option>
									<?php //} ?>
								</select>
								</div>
								<div class="input-box date">
									<div class="icon icon-calander-month"></div>
									<input type="text" name="date" placeholder="Event Date" id="datepicker2" autocomplete="off">
								</div>
								<div class="submit-slide">
									<input type="submit" value="Search Now" class="btn style2 search_button">
								</div>
							</form>
						</div>
						-->
						 <div class="banner-search">
	                      <!--  <div class="input-box">
	                            <div class="icon icon-grid-view"></div>
	                            <input type="text" placeholder="Event Type">
	                        </div>  -->
							<!--<form method="post" action="index.php">-->
	                        <div class="input-box location">
	                            <div class="icon icon-location-1"></div>
								<select class="select-box" name="location" id="searchTextField">
									<option value="">Select Location</option>
									<?php 
										 $result = getall_locations();
										// print_r($result);
										foreach($result as $value){
										?>
										<option value="<?php echo $value->LocationName.','.$value->Id; ?>"><?php echo $value->LocationName; ?></option>
									<?php } ?>
									</select>
								<input type="text" placeholder="Event Location" style="display:none;">  
	                        </div>
	                        <div class="input-box date">
	                            <div class="icon icon-calander-month"></div>
	                            <input type="text" name="date" placeholder="Select Date" id="datepicker2" autocomplete="off">
	                        </div>
							  <div class="submit-slide">
	                            <!--<input type="submit"  value="Search Now" class="btn" id="">-->
								<a href="#Services" class="btn">Search Now</a>
	                        </div>
							<!--</form>-->
	                      </div>

					</div>
					<div class="scroll-down down-arrow">
						<a href="#arrow-down">
							<img src="images/banner-style3Arrow.png" alt="">
						</a>
					</div>
				</div>
	</section>
	<section class="service-type" id="arrow-down">
	<div class="container">
		<div class="heading">
			<div class="icon"><em class="icon icon-heading-icon"></em></div>
			<div class="text"  id="Services">
				<h2>Our Services</h2>
			</div>
			<div class="info-text">It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</div>
		</div>
	<div class="service-catagari">
	<ul><?php
	$result = getall_category();
	foreach ($result as $value) {
	?>
	<li><div class="hovereffect">
	<a href="product_list.php?cid=<?php echo $value->Id; ?>" style="padding-top:0;padding-bottom:0;">
	<div class="category_image" style="border: 1px solid rgba(160, 193, 184, 0.9); ">
	<img class="img-responsive" src="<?php echo image_url.$value->Image;?>" alt="" height="150px" style="padding:2px;">
	<div class="overlay">

	</div>
	</div>
	<div style="text-transform: capitalize;background:#202020;color:#fff;font-weight:400px;margin-top:10px;border-radius: 15px;"><span ><?php echo $value->Name;?></span></div>
	</a>
	</div></li>
	<?php } ?>
	</ul>
	</div>
		</div>
	</section>
	<section class="content" id="event">
		<div class="container">
			<div class="home-event">
				<div class="heading">
					<div class="icon"><em class="icon icon-heading-icon"></em></div>
					<div class="text">
						<h2>Events Overview</h2>
					</div>
					<div class="info-text">It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</div>
				</div>
				<div class="row">
					<div class="event-slider">
						<div class="item">
							<div class="event-box">
								<div class="img">
									<a href="#">
										<img src="images/event-img/event-img1.jpg" alt="">
										<span class="capsan">
											<span>Event Planner</span>
										</span>
									</a>
								</div>
								<div class="name">Event Planner</div>
								<p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s ype specimen book. It has survived not only five centuries,</p>
								<a href="#">Readmore</a>
							</div>
						</div>
						<div class="item">
							<div class="event-box">
								<div class="img">
									<a href="#">
										<img src="images/event-img/event-img2.jpg" alt="">
										<span class="capsan">
											<span>Corporate Events</span>
										</span>
									</a>
								</div>
								<div class="name">Corporate Events</div>
								<p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s ype specimen book. It has survived not only five centuries,</p>
								<a href="#">Readmore</a>
							</div>
						</div>
						<div class="item">
							<div class="event-box">
								<div class="img">
									<a href="#">
										<img src="images/event-img/event-img3.jpg" alt="">
										<span class="capsan">
											<span>Birthday Party</span>
										</span>
									</a>
								</div>
								<div class="name">Birthday Party</div>
								<p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s ype specimen book. It has survived not only five centuries,</p>
								<a href="#">Readmore</a>
							</div>
						</div>
						<div class="item">
							<div class="event-box">
								<div class="img">
									<a href="#">
										<img src="images/event-img/event-img1.jpg" alt="">
										<span class="capsan">
											<span>Event Planner</span>
										</span>
									</a>
								</div>
								<div class="name">Event Planner</div>
								<p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s ype specimen book. It has survived not only five centuries,</p>
								<a href="#">Readmore</a>
							</div>
						</div>
						<div class="item">
							<div class="event-box">
								<div class="img">
									<a href="#">
										<img src="images/event-img/event-img2.jpg" alt="">
										<span class="capsan">
											<span>Corporate Events</span>
										</span>
									</a>
								</div>
								<div class="name">Corporate Events</div>
								<p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s ype specimen book. It has survived not only five centuries,</p>
								<a href="#">Readmore</a>
							</div>
						</div>
						<div class="item">
							<div class="event-box">
								<div class="img">
									<a href="#">
										<img src="images/event-img/event-img3.jpg" alt="">
										<span class="capsan">
											<span>Birthday Party</span>
										</span>
									</a>
								</div>
								<div class="name">Birthday Party</div>
								<p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s ype specimen book. It has survived not only five centuries,</p>
								<a href="#">Readmore</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.min.js"   
	  type="text/javascript"></script> 
	<script type="text/javascript">
	$(document).ready(function(){        
	    $("select#searchTextField").change(function(){
	      //$("#selText").html($($(this).children("option:selected")[0]).text());
	       var txt = $($(this).children("option:selected")[0]).text();
	       $("<span>" + txt + "<br/></span>").appendTo($("#selText span:last"));
	    });
	});
	</script>
	<style>

	.select-box{ width: 100% !important;
	    padding: 15px 10px 15px 38px !important;
	    border: solid 1px #b8b8b8 !important;
	    height: 50px !important;
	    border-radius: 4px !important;
	    background: #fff !important;
	    line-height: 20px !important;
	    font-size: 16px !important;
	    color: #333 !important; 
	}
	.banner .banner-text .banner-search {
	    margin: 0px auto 0 auto !important;
	    width: 100% !important;
	    max-width: 570px !important;
	    padding: 18px 18px 18px 18px !important;
	    background: rgba(255,255,255,0.8) !important;
	    border-radius: 3px !important;
		
	}
	.banner .banner-text .banner-search .input-box {
	    width: 100% !important;
	    display: inline-block !important;
	    position: relative !important;
	    margin-bottom: 10px !important;
	}
	.banner .banner-text .banner-search .icon {
	    position: absolute !important;
	    top: 10px !important;
	    left: 0px !important;
	    width: 37px !important;
	    height: 40px !important;
	    font-size: 18px !important;
	    margin-top: 4px !important;
	    text-align: center !important;
	    line-height: 48px !important;
	    color: #cccccc !important;
		    
	}
	.banner .banner-text .banner-search .input-box input {
	    width: 100% !important;
	    padding: 15px 10px 15px 38px !important;
	    border: solid 1px #b8b8b8 !important;
	    height: 50px !important;
	    border-radius: 4px !important;
	    background: #fff !important;
	    line-height: 20px !important;
	    font-size: 16px !important;
	    color: #333 !important;
	}
	.banner .banner-text .banner-search .input-box.location {
	    width: 33% !important;
	    margin: 0 1.17% 0 0 !important;
	}
	.banner .banner-text .banner-search .input-box.date {
	    width: 33% !important;
		margin: 0 1.17% 0 0 !important;
	}
	.banner .banner-text .banner-search .submit-slide {
	    width: 100% !important;
	    margin-bottom: 2px !important;
	}
	.banner .banner-text .banner-search .submit-slide .btn {
	    width: 31% !important;
	}
	.banner .banner-text .banner-search p {
	    color: #5e5d5d !important;
	    line-height: 21px !important;
	    font-size: 14px !important;
	    margin: 0px !important;
	    text-align: center !important;
		
	}
	.btn {
		height: 50px !important;
	    display: inline-block !important;;
	    padding: 14px 0 !important;;
	    margin-bottom: 0 !important;;
	    font-size: 18px !important;;
	    font-weight: normal !important;;
	    line-height: 20px !important;;
	    text-align: center !important;;
	    white-space: nowrap !important;;
	    vertical-align: middle !important;;
	    -ms-touch-action: manipulation !important;;
	    touch-action: manipulation !important;;
	    cursor: pointer !important;;
	    -webkit-user-select: none !important;;
	    -moz-user-select: none !important;;
	    -ms-user-select: none !important;;
	    user-select: none !important;;
	    background-image: none !important;;
	    border: solid 1px #b8b8b8 !important;
	    border-radius: 3px !important;;
	    box-shadow: inset 0px 1px 0px #e0a97f !important;;
	    color: #fff !important;;
	    -moz-transition: all 1s ease !important;;
	    -ms-transition: all 1s ease !important;;
	    -o-transition: all 1s ease !important;;
	    -webkit-transition: all 1s ease !important;;
	    transition: all 1s ease !important;
		margin-top:0px !important;
	}
	.submit-slide {
	    position: initial !important;
	}
	.banner-search {
	    min-width: 70% !important;
		display: block !important;
	}

	</style>
	<?php include"footer.php"; ?>
	<script type="text/javascript" src="http://178.128.71.230/letsplanwebsite/js/jquery.form-validator.min.js"></script>
	<script type="text/javascript" src="http://178.128.71.230/letsplanwebsite/js/coustem.js"></script>
