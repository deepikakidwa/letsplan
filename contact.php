  <style>
  .demoInputBox{padding:10px; border:#F0F0F0 1px solid; border-radius:4px;}
  .error{background-color: #FF6600;border:#AA4502 1px solid;padding: 5px 10px;color: #FFFFFF;border-radius:4px;}
  .success{background-color: #12CC1A;border:#0FA015 1px solid;padding: 5px 10px;color: #FFFFFF;border-radius:4px;}
  .info{font-size:.8em;color: #FF6600;letter-spacing:2px;padding-left:5px;}
  </style>
  <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
  <script>
  function sendContact() {
  	var valid;	
  	valid = validateContact();
  	if(valid) {
  		jQuery.ajax({
  		url: "contact_mail.php",
  		data:'userName='+$("#userName").val()+'&userEmail='+$("#userEmail").val()+'&subject='+$("#subject").val()+'&content='+$(content).val(),
  		type: "POST",
  		success:function(data){
  		$("#mail-status").html(data);
  		},
  		error:function (){}
  		});
  	}
  }

  function validateContact() {
  	var valid = true;	
  	$(".demoInputBox").css('background-color','');
  	$(".info").html('');
  	
  	if(!$("#userName").val()) {
  		$("#userName-info").html("(required)");
  		$("#userName").css('background-color','#FFFFDF');
  		valid = false;
  	}
  	if(!$("#userEmail").val()) {
  		$("#userEmail-info").html("(required)");
  		$("#userEmail").css('background-color','#FFFFDF');
  		valid = false;
  	}
  	if(!$("#userEmail").val().match(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/)) {
  		$("#userEmail-info").html("(invalid)");
  		$("#userEmail").css('background-color','#FFFFDF');
  		valid = false;
  	}
  	if(!$("#subject").val()) {
  		$("#subject-info").html("(required)");
  		$("#subject").css('background-color','#FFFFDF');
  		valid = false;
  	}
  	if(!$("#content").val()) {
  		$("#content-info").html("(required)");
  		$("#content").css('background-color','#FFFFDF');
  		valid = false;
  	}
  	
  	return valid;
  }
  </script>
  <!DOCTYPE html>
  <html>
  <title>Contact Us</title>
  <?php include "header.php";?>
  <section class="page-header">
           <div class="container">
             <h1>contact us</h1>
           </div>
       </section>
  <section class="content">
                   <div class="container">
                       <div class="home-event">
                           <div class="heading">
                           	<div class="icon"><em class="icon icon-heading-icon"></em></div>
                               <div class="text">
                                   <h2>Contact Us</h2>
                               </div>
                               <div class="info-text">All the information you will need is listed below, just click on the page you want to view and that's it.</div>
                               <div class="stickLine"></div>
                           </div>
                           <div class="row">
              <div class="col-sm-12" style="padding-top: 30px;">
                  <div class="text-center">
                     <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam elementum nisi eget mi mollis laoreet. Morbi non dignissim tellus, vitae blandit urna Lorem ipsum dolor sit amet, consectetur adipiscing elit morbi non dignissim. Nullam elementum nisi eget mi mollis laoreet. Morbi non dignissim tellus, vitae blandit urna Lorem ipsum dolor sit amet, consectetur adipiscing elit morbi non dignissim.Nullam elementum nisi eget mi mollis laoreet. Morbi non dignissim tellus, vitae blandit urna Lorem ipsum dolor sit amet, consectetur adipiscing elit morbi non dignissim.</p>
                 </div>
             </div>
  		   <?php
  		   $result = getall_contactus();
  		   foreach($result as $value){ 
  		   ?>
             <div class="col-sm-4">
              <div class="contact-box">
                  <div class="contactIcon">
                      <span class="icon icon-phone"></span>
                  </div>
                  <!-- <a href="telTo:44047856977145">+44 (0) 47856977145</a>-->
  		   <span>Mobile :- <?php echo $value->Mobile; ?> </span>
              </div>
          </div>
          <div class="col-sm-4">
              <div class="contact-box">
                  <div class="contactIcon">
                     <span class="icon icon-location-1"></span>
                 </div>
                 <address><?php echo $value->Address; ?></address>
             </div>
         </div>
         <div class="col-sm-4">
          <div class="contact-box">
              <div class="contactIcon">
                 <span class="icon icon-message"></span>
             </div>
             <span>Email :- <a href="mailTo:<?php echo $value->Email; ?>"><?php echo $value->Email; ?></a></span>
             <span>Website :- <a href="http://www.eventatty.com/">www.eventatty.com</a></span>
  		   <?php }  ?>
         </div>
     </div>
  </div>
                       </div>
                   </div>
               </section>
               <section class="map" id="map">
          </section>
          <section class="contackForm">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                  <h2>Contact Form</h2>
                </div>
                  <div id="frmContact">
                    <div class="col-sm-6">
                      <div class="input-box">
                            <label>Your Name <sup>*</sup></label>
                           <span id="userName-info" class="info"></span><br/>
                       <input type="text" name="userName" id="userName" class="demoInputBox">
                        </div>
                        <div class="input-box">
                            <label>Your Email <sup>*</sup></label>
                            <span id="userEmail-info" class="info"></span><br/>
                             <input type="text" name="userEmail" id="userEmail" class="demoInputBox">
                        </div>
                        <div class="input-box">
                            <label>Subject <sup>*</sup></label>
                          <span id="subject-info" class="info"></span><br/>
                         <input type="text" name="subject" id="subject" class="demoInputBox">
                        </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="input-box">
                            <label>Your Message <sup>*</sup></label>
                           <span id="content-info" class="info"></span><br/>
                         <textarea name="content" id="content" class="demoInputBox" cols="70" rows="6" style="width:100%;"></textarea>
                        </div>
                        <input type="submit" onClick="sendContact();" class="btn" value="Submit">
                    </div>
                </div>
            </div>
        </div>
    </section>
  <?php include "footer.php";?>
  <script>
  function initMap() {
  var uluru = {lat: 40.730610, lng: -73.935242};
  var map = new google.maps.Map(
  document.getElementById('map'), {zoom: 12, center: uluru});
  var marker = new google.maps.Marker({position: uluru, map: map});
  }
  </script>
  <script async defer  src="//maps.googleapis.com/maps/api/js?key=AIzaSyAciPo9R0k3pzmKu6DKhGk6kipPnsTk5NU&callback=initMap"></script>
  </body>
  </html>
