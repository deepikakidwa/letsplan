   <?php 
   // if(!isset($_SESSION['login_token'])) {
        // header('Location: index.php');
        // exit();
    // } 
   //session_start();
    include('header.php');

   // echo "<pre>";
   // print_r($_SESSION);
   // echo "</pre>";
   ?>

           <div class="step-nav">
              <div class="container">
                  <div class="inner-nav">	
                      <ul>
                          <li class="first active"><a href="mycart.php"><span class="number">1</span><span class="text">Cart Summary</span></a></li>
  						<li style="margin-right:70px"><a href="address.php"><span class="number" >2</span><span class="text">Address Details</span></a></li>
                          <li style="margin-left:70px"><a href="Product_Details.php"><span class="number">3</span><span class="text">Payment Details</span></a></li>
                          <li class="last"><a href="order.php"><span class="number">4</span><span class="text">Order Confirm</span></a></li>
                      </ul>
                  </div>
              </div>
          </div>
  		<div class="breadcrumb">
             
                  <ul style="padding-left:235px;">
                      <li><a href="index.php">Home</a>/</li>
                      <li class="active"><a href="#">Cart Summary</a></li>
                  </ul>
              </div>
        
  		 <div class="content" style="background: #f5f5f5;">
  		
              <div class="container">
                  <div class="bookin-info">
  				<div id="order_table"> 
                      <table class="bookin-table">
  					<?php  
                                      if(!empty($_SESSION["shopping_cart"]))  
                                      {  
                                           $total = 0;  
                                           foreach($_SESSION["shopping_cart"] as $keys => $values)  
                                           {                                               
  										 
  										//echo $total+= ($values['product_quantity'] * $values['product_price']);
                                      ?>  
                          <tr>
                              <th colspan="7" class="table-heading"><?php echo $values["product_name"]; ?> <a href="#" class="icon icon-delete"></a></th>
                          </tr>
                          <tr>
                            <td class="first Theading" style="width:10%;">Product Varient</td>
  						  <td class="Theading" style="width:10%;">produc Date</td>
                             <td class="Theading" style="width:10%;">Quantity</td>
  							<td class="Theading" style="width:10%;">Deliver Charge</td>
                              <td class="Theading" style="width:10%;">Price</td>
                              <td class="Theading" style="width:10%;">Total</td>
                              <td class="Theading" style="width:10%;">Action</td>
                          </tr>
                          <tr>
                              <td>
                                  <p><?php echo $values["product_varient"]; ?></p>
                              </td>
  							 <td>
                                  <p><?php echo $values["product_date"]; ?></p>
                              </td>
                              <td>
                    <p><input type="text" name="quantity[]" id="quantity<?php echo $values["product_id"]; ?>" value="<?php echo $values["product_quantity"]; ?>" data-product_id="<?php echo $values["product_id"]; ?>" class="form-control quantity" /></p>
                              </td>
  							<td>
                                  
                                  <p>$ <?php echo $values["product_delivery_charge"]; ?></p>
                              </td>
                              <td>
                                  
                                  <p>$ <?php echo $values["product_price"]; ?></p>
                              </td>
                              <td>  
                                  <p>$ <?php  $total_price=($values["product_quantity"] * $values["product_price"])+$values["product_delivery_charge"];

  									echo sprintf("%.2f",$total_price );
  								?></p>
                              </td>
                              <td>
                                  <p><button name="delete" class="btn btn-danger btn-xs delete" id="<?php echo $values["product_id"]; ?>">Remove</button></p>
                                  
                              </td>
                           
                          </tr>
  										 <?php 
                                                $total = $values["product_delivery_charge"]+ $total + ($values["product_quantity"] * $values["product_price"]);  
                                           }   
  										 ?>
                      </table>
                      <!--<table class="bookin-table">
                          <tr>
                              <th colspan="6" class="table-heading">Hotel AMANO Grand Central <a href="#" class="icon icon-delete"></a></th>
                          </tr>
                          <tr>
                              <td class="first Theading">Address</td>
                              <td class="Theading">Booking Date</td>
                              <td class="Theading">Meal Plans</td>
                              <td class="Theading">Price Range</td>
                              <td class="Theading">Max Guest</td>
                              <td class="Theading last">Min. Booking Amount to Pay</td>
                          </tr>
                          <tr>
                              <td class="first">
                                  <label>Address</label>
                                  <p>Heidestrasse 62 Berlin, 10557 - Germany</p>
                              </td>
                              <td>
                                  <label>Booking Date</label>
                                  <p>29<sup>th</sup> Nov 2015</p>
                              </td>
                              <td>
                                  <label>Meal Plans</label>
                                  <p>Lunch</p>
                              </td>
                              <td>
                                  <label>Price Range</label>
                                  <p>$ 1200 <small>(Onwards)</small></p>
                              </td>
                              <td>
                                  <label>Max Guest</label>
                                  <p>300 <a href="#" class="icon icon-edit"></a></p>
                                  
                              </td>
                              <td class="last">
                                  <label>Min. Booking Amount to Pay</label>
                                  <p>$ 8,000 (Onwards)</p>
                              </td>
                          </tr>
                      </table>-->
                      <table class="bookinTotal">
                          <tr>
                              <td class="subTotal">Subtotal</td>
                              <td class="amount subTotal">$ <?php echo number_format($total, 2); ?></td>
                          </tr>
                          <!--<tr>
                              <td >Min. Booking Amount to pay</td>
                              <td class="amount">$ 13,000</td>
                          </tr>-->
                      </table>
  					<?php  
                                      }  
                                      ?>
  									</div>
                      
                      <div class="bookinRow">
  					
  					
  					
  					<?php
  				if (!isset($_SESSION['login_token']))
  				           { ?>
                         
  				   <a href="login.php" class="btn">Book Now</a>

                 
  				 <?php } else { ?>

  				    <a href="address.php" class="btn" id="book_now">Book Now</a>
  				 <?php }?>
  				 
  					
                        
  						<button name="delete" class="btn clearcart btn-lg" style="margin-left:90%;">Clear Cart <i class="zmdi zmdi-shopping-cart"></i></button>
                      </div>

                      <div class="bottom-blcok">
                          <div class="row">
                              <div class="col-sm-4">
                                  <div class="icon icon-assurance"></div>
                                  <span>100% Assurance</span>
                                  <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummybook</p>
                              </div>
                              <div class="col-sm-4">
                                  <div class="icon icon-trust"></div>
                                  <span>Trust</span>
                                  <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummybook</p>
                              </div>
                              <div class="col-sm-4">
                                  <div class="icon icon-promise"></div>
                                  <span>Our Promise</span>
                                  <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummybook</p>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
  	

  				 
  				 
  <?php include('footer.php');?>				
  						
  					            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  

  					 <script>  
   $(document).ready(function(data){  
        $('.add_to_cart').click(function(){  
             var product_id = $(this).attr("id");  
             var product_name = $('#name').val();  
             var product_price = $('#price_new').val();  
             var product_quantity = $('#quantity').val();  
             var action = "add";  
  		   
  		   alert(product_id);
  		   alert(product_name);
  		   alert(product_price);
  		   alert(product_quantity);
             if(product_quantity > 0)  
             {  
                  $.ajax({  
                       url:"action.php",  
                       method:"POST",  
                       dataType:"json",  
                       data:{  
                            product_id:product_id,   
                            product_name:product_name,   
                            product_price:product_price,   
                            product_quantity:product_quantity,   
                            action:action  
                       },  
                       success:function(data)  
                       {  
  					      alert(data.product_total_price);
                            $('#order_table').html(data.order_table);  
                            $('.badge').text(data.cart_item);  
                            alert("Product has been Added into Cart");  
                       }  
                  });  
             }  
             else  
             {  
                  alert("Please Enter Number of Quantity")  
             }  
        });  
        // $(document).on('click', '.delete', function(){  
             // var product_id = $(this).attr("id");  
             // var action = "remove";  
             // if(confirm("Are you sure you want to remove this product?"))  
             // {  
                  // $.ajax({  
                       // url:"action.php",  
                       // method:"POST",  
                       // dataType:"json",  
                       // data:{product_id:product_id, action:action},  
                       // success:function(data){  
                            // $('#order_table').html(data.order_table);  
                            // $('.badge').text(data.cart_item);  
                       // }  
                  // });  
             // }  
             // else  
             // {  
                  // return false;  
             // }  
        // });  
        $(document).on('keyup', '.quantity', function(){  
             var product_id = $(this).data("product_id");  
             var quantity = $(this).val();  
             var action = "quantity_change";  
             if(quantity != '')  
             {  
                  $.ajax({  
                       url :"action.php",  
                       method:"POST",  
                       dataType:"json",  
                       data:{product_id:product_id, quantity:quantity, action:action},  
                       success:function(data){ 
  					  $('#cartinfo').html(data.cartinfo);  
                         $('.badge').text(data.cart_item);
                        $('#order_table').html(data.order_table); 
                           // window.location.reload();						  
                       }  
                  });  
             }  
        });  
  	     //$(document).on('click', '.clearcart', function(){  
  	    //localStorage.clear();
  	   // var action = "clear";  
             // if(confirm("Are you sure you want to clear this cart?"))  
             // {  
                  // $.ajax({  
                       // url:"clearcart.php",  
                       // method:"POST",  
                       // dataType:"json",  
                       // data:{action:action},  
                       // success:function(data){  
  					 
  				  // $('#order_table').html('0');
                    // $('.badge').html('0');
                  // window.location='index.php';				  
                       // }  
                  // });  
             // }  
             // else  
             // {  
                  // return false;  
             // }  
        // });
   });  
   </script>
   <style>
   .bookin-info .bookin-table {
  	  margin-bottom: 0px !important;  
   }
  input {
  	-webkit-appearance:block !important; 
  	-moz-appearance: none;
  	-o-appearance: none; 
  	-ms-appearance: none; 
  	appearance: none; 
  	border-radius:0px;
  	}

   </style>
   <link rel="stylesheet" type="text/css" href="swal2/sweetalert2.min.css">
  <script src="swal2/sweetalert2.min.js"></script>
  <script>
  $(document).ready(function(){
  	$(document).on('click', '.delete', function(){
  		  var product_id = $(this).attr("id");  
            var action = "remove";  
  		swal({
  		  	title: 'Are you sure?',
  		  	text: "You won't be able to revert this!",
  		  	type: 'warning',
  		  	showCancelButton: true,
  		  	confirmButtonColor: '#3085d6',
  		  	cancelButtonColor: '#d33',
  		  	confirmButtonText: 'Yes, delete it!',
  		}).then((result) => {
  		  	if (result.value){
  		  		$.ajax({
  			   		url: 'action.php',
  			    	type: 'POST',
  			       	data: {product_id:product_id, action:action},
  			       	dataType: 'json'
  			    })
  			    .done(function(response){
  				//  $('#order_table').html('0');
                    $('.badge').html('0');  
  			     	swal('Deleted!');
  					setTimeout(function() {
  					window.location.reload();
  						}, 1500);
  				
  			    })
  			    .fail(function(){
  			     	swal('Oops...', 'Something went wrong with ajax !', 'error');
  			    });
  		  	}

  		})

  	});
  });

  </script>
  <script>
  $(document).ready(function(){
  	$(document).on('click', '.clearcart', function(){
  		  var action = "clear"; 
  		swal({
  		  	title: 'Are you sure?',
  		  	text: "You won't be able to revert this!",
  		  	type: 'warning',
  		  	showCancelButton: true,
  		  	confirmButtonColor: '#3085d6',
  		  	cancelButtonColor: '#d33',
  		  	confirmButtonText: 'Yes, delete it!',
  		}).then((result) => {
  		  	if (result.value){
  		  		$.ajax({
  			   		url: 'clearcart.php',
  			    	type: 'POST',
  			       	data: {action:action},
  			       	dataType: 'json'
  			    })
  			    .done(function(response){
  					    $('#order_table').html(response.order_table);  
                         $('.badge').text(response.cart_item);  
  			     	swal('your cart is empty!');
  					setTimeout(function() {
  					 window.location='index.php';
  						}, 1500);
  						
  				
  			    })
  			    .fail(function(){
  			     	swal('Oops...', 'Something went wrong with ajax !', 'error');
  			    });
  		  	}

  		})

  	});
  });

  </script>