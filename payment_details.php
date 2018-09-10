   
   <?php include "header.php"?>
    <body class="inner-page">
      
        <div class="page">
           
            <div class="step-nav">
                <div class="container">
                    <div class="inner-nav">	
                        <ul>
                        <li class="first fill"><a href="#"><span class="number">1</span><span class="text">Cart Summary</span></a></li>
    						  <li style="margin-right:70px"><a href="#"><span class="number">2</span><span class="text">Address Details</span></a></li>
                            <li  class="active" style="margin-right:70px"><a href="#"><span class="number">3</span><span class="text">Payment Details</span></a></li>
                            <li class="last"><a href="#"><span class="number">4</span><span class="text">Order Confirm</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="breadcrumb">
                <div class="container">
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">EventTatty</a></li>
                        <li class="active"><a href="#">Payment Details</a></li>
                    </ul>
                </div>
            </div>
            <div class="content">
                <div class="container">
                    <div class="bookin-info">
                        <div class="payment-detail">
                            <!--<div class="totalPayment">
                                <div class="total">Total payment to be made :  <span> $ 5,00,000</span></div>
                                <div class="oderId">Transaction ID : <span>1196760272</span></div>
                            </div>-->
                            <div class="row">
                                <div>
                                    <div class="payment-opction">
                                        <!--<ul>
                                            <li class="active"><a href="javascript:;" id="saveCard">Saved Details<span class="icon icon-arrow-right"></span></a></li>
                                            <li><a href="javascript:;" id="debitCard">Debit Card<span class="icon icon-arrow-right"></span></a></li>
                                            <li><a href="javascript:;" id="creditCard">Credit Card<span class="icon icon-arrow-right"></span></a></li>
                                        </ul>-->
                                    </div>
                                </div>
    							 <?php
    		
    	    $product_id=$_POST['product_id'];
    		$product_price=$_POST['product_price'];
            $product_name=$_POST['product_name'];
    		 $product_type=$_POST['product_type'];
    		 $product_quantity=$_POST['product_quantity'];
    		 $product_date=$_POST['product_date'];
    		 $product_delivery_charge=$_POST['product_delivery_charge'];
    		 $userid=$_SESSION['user_id'];
    		

    		 
    		 $res = array_merge($product_id,$product_price,$product_name,$product_type,$product_quantity,$product_date,$product_delivery_charge,$product_date);
    		
    $combined = array_combine($product_id, array_map(function ($product_id,$product_price,$product_name,$product_type,$product_quantity,$product_date,$product_delivery_charge) {
                    return compact('product_id','product_price','product_name','product_type','product_quantity','product_date','product_delivery_charge');
                },$product_id,$product_price,$product_name,$product_type,$product_quantity,$product_date,$product_delivery_charge));
    		
    		 // echo "<pre>";
    		 // print_r($combined);
    		 // echo "</pre>";
    		$rec= array();
    		//$combineds = json_encode($combined);
    		?>
    		<input type="hidden" name="total_value" id="total_value" value="<?php print_r($combined);?>">

    		<?php
    		 // foreach($combined as $value)
    		 // {
    			// $p_id=$value['product_id'];
    			// $product_id = substr($p_id,0,36);
    			
    			// $product_price=$value['product_price'];
    			// $product_name=$value['product_name'];
    			// $product_type=$value['product_type'];
    			// $product_quantity=$value['product_quantity'];
    			// $product_date=$value['product_date'];
    			// $product_delivery_charge=$value['product_delivery_charge'];
    			// $userid=$_SESSION['user_id'];
    			// $paymentmethod=1;
    			// $orderfrom="web";
    			
    			//$result=orders_details($product_id,$product_price,$product_type,$product_quantity,$product_date,$userid,$paymentmethod,$orderfrom);
    		
    		//}
    		 // echo "<pre>";
    		 // print_r($rec);
    		 // echo "</pre>";	
    		 
    		// foreach (array_combine($product_id, $product_price) as $product_id => $product_price) {
    			
    			// print_r($product_id);
    			// echo "  ";
    			 // print_r($product_price);
    			 // echo "<br>";
    			//$result = add_all_urls($stuff1,$stuff2);
    			
    		//}
    		?>
                           <div class="col-sm-12">
                                    <div class="payment-type saveCard-info">
                                        <div class="saveCard">
                                            <!--<div class="card-row">Your Saved card<a href="#">Remove card</a></div>-->
                                            <div class="card-slide">
                                                <div id="dropin-container"></div>
                                                <div class="text-center">
                                                  <input type="submit" value="Pay Now" class="btn btn-lg" id="#submit_pay"> </div>    
                                                   <div class="loader"> </div>
                                              </div>
                                              <!--<div class="note"><span class="icon icon-lock"></span>Your payment details are secured via 128 Bit encryption by Version</div>-->
                                          </div>
                                      </div>
                                     
                                      
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <?php include "footer.php"?>
          </div>
    <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->

        
     
        <head>
            <meta charset="utf-8">
            <script src="//js.braintreegateway.com/web/dropin/1.11.0/js/dropin.min.js"></script>
        </head>
        <body>
          <?php  
            
    	  $result=client_token();
    	   
    	   $brain_tree_token=$result;
    		//print_r($result);
    		// $clientToken = $gateway->clientToken()->generate([
            // "customerId" => $brain_tree_token
               // ]);
           // echo($clientToken = $gateway->clientToken()->generate());
    //exit;
       ?>
  <style>
  .loader {
  position: fixed;
  left: 0px;
  top: 0px;
  width: 100%;
  height: 100%;
  z-index: 9999;
  background: url('images/ajax-loader.gif') 50% 50% no-repeat rgb(249,249,249);

  }
  </style>
  <script>
  $(function() {
  $(".loader").fadeOut(3000, function() {
  $(".saveCard-info").fadeIn(1000); 
  });
  });
  </script>
            <script>
                var button = document.querySelector('#submit_pay');

                braintree.dropin.create({
                  authorization: '<?php echo $result; ?>',
                  container: '#dropin-container'
              }, function (createErr, instance) {
                  button.addEventListener('click', function () {
                    instance.requestPaymentMethod(function (err, payload) {
                     // console.log(payload);
    				   var nonce=payload.nonce;
    				  
    				   var total_value=$("#total_value").val();
    				 
    			
    					//alert(' product_id = '+index + ' product name= ' + value.product_name+' date = '+value.product_date + 'delivery charge = '+value.product_delivery_charge+' pruduct price = '+value.product_price+' product_quantity = '+value.product_quantity);
    					// var product_id = index;
    					// var product_name= value.product_name;
    					// var date = value.product_date;
    					// var delivery_charge = value.product_delivery_charge;
    					// var pruduct_price = value.product_price;
    					// var product_quantity = parseInt(value.product_quantity);
    					// var total_price = (pruduct_price*product_quantity)+(+delivery_charge);
    					// var product_type = value.product_type;
    					//alert(total_price);
    					
    					$.ajax({  
                         url :"passing_cart_value.php",  
                         method:"POST",  
                         dataType:"json",  
                         data:{nonce:nonce},  
                         success:function(data){ 
    					 alert(data);
    				
                             // window.location.reload();						  
                         }  
                    });
    					
    				
    				 //  alert(total_value);
    				   // var g =  $.parseJSON(total_value);
    				   // alert(g);
    				   // $.getJSON( "test.js", function( json ) {
                   // console.log( "JSON Data: " + json.users[ 3 ].name );
                      // });
    				  // $.each(total_value, function(k, v){
    				  // alert(v);
    					// });
    				  //  alert(total_value);
    				//   var myJsonString = JSON.stringify(total_value);
    				 //  myJsonString = myJsonString.replace(/(\r\n\t|\n|\r\t)/gm,"");
    				// alert(myJsonString);
    	
    // for(var s=0; s<2; s++) {          //  4111 1111 1111 1111
      
        // for(var w=0; w<2; w++) {
              // alert(total_value[w]);
        // }
    // }
                  });
                });
              });


          </script>
  		
  			<script type="text/javascript">
  				 // $('.btn').click(function(){
  				   // $('.loader').show();	    
  				 // });
  				 // $('.loader').hide();
  				 // document.getElementById('.loader').style.display   = "none";
  			</script>

      </body>

      <!-- Mirrored from 115.160.244.10:8084/themeforest/event_planning/booking_step2.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 02 Apr 2018 06:24:04 GMT -->
      </html>