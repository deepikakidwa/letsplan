
	<?php 
	//session_start();
	include "header.php" ?>
	<!----adding data to cart api---->
	<?php
	// if(isset($_POST['addtocart']))
	// {   
		// $id = $_POST['pid'];
		//print_r($id);
		// $product_id = $_POST['varient'];
		// $product_type = $_POST['product_type'];
		// $user_id = $_POST['userid'];
		// $quantity = $_POST['qty'];
		// $actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
		// add_to_cart($user_id,$product_id,$product_type,$quantity,$actual_link,$id);
		
	// }
	?>

	<div class="container">
			<!---<div class="col-md-12">
				<div class="breadCrumb">
				<ul>
				<li> <a id="ctl00_ContentPlaceHolder1_hyphome" href="#">Home</a> </li>
				<li id="ctl00_ContentPlaceHolder1_liparent"> <a id="ctl00_ContentPlaceHolder1_hypparent" href="#">Service</a> </li>
				<li id="ctl00_ContentPlaceHolder1_lichild"> <a id="ctl00_ContentPlaceHolder1_hyplisting" href="#">product_list</a> </li>
				<li> <a id="ctl00_ContentPlaceHolder1_HyperLink1" style="background: none;">
				<span id="ctl00_ContentPlaceHolder1_lblpname1">product_detail</span></a> </li>
				</ul>
				</div>
			</div> -->
		</div>   
		
		<div class="single-product">
			<div class="container">
				
				<form  id="add_product" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
					<div class="content-area cart" style="margin-top: 70px;     margin-top: 102px;margin-bottom: 53px;">
						<?php 
						$id=$_GET['id'];
						$product_price='';
						$result1 = get_product_by_id($id);
						$arrValue1 = array();
						
						// echo "<pre>";
						// print_r($_SESSION["shopping_cart"]);
						// echo "</pre>";
						foreach($result1 as $value) {
							
							
							
							$ProductType=$value->ProductType;
							 $simple_price=$value->Price;
							 
							 
							?>
							<!-----sending user id  and product id and product type in cart --->
							
							
							<input type="hidden" value="<?php echo $value->ProductType; ?>" name="product_type" id="product_type">
							<input type="hidden" value="<?php echo $_SESSION["user_id"]; ?>" name="userid" id="userid">
							<input type="hidden" value="<?php echo $value->Id; ?>" name="pid" id="pid">
							<div class="col-md-1"></div>
							<div class="col-md-4 single-right-left " style="margin-top:40px;border:3px solid #d3e4df;padding:5px;margin-bottom:40px">
								<div class="grid images_3_of_2">
									<div class="flexslider">
									
											<ul class="slides">
												<li data-thumb="<?php echo image_url.$value->Image_1; ?>">
													<div class="thumb-image"> <img src="<?php echo image_url.$value->Image_1; ?>" data-imagezoom="true" class="img-responsive"> </div>
												</li>
												<li data-thumb="<?php  echo image_url.$value->Image_2; ?>">
													<div class="thumb-image"><img src="<?php echo image_url.$value->Image_2; ?>" data-imagezoom="true" class="img-responsive"> </div>
												</li>	
												<li data-thumb="<?php echo image_url.$value->Image_3; ?>">
													<div class="thumb-image"><img src="<?php echo image_url.$value->Image_3; ?>" data-imagezoom="true" class="img-responsive"> </div>
												</li>
												</ul>
												<div class="clearfix"></div>
											</div>	
										</div>
									</div><!--off start get paths for site domain images folder and icon -->
									
									<div class="col-md-7" style="margin-top:40px;">
										
										<div class="product-details">
											<!--get product detail name description  availability --->
											<h2>
												<label name="pro_name" id="pro_name" value="<?php echo $value->Name;?>"> <div class="block2-name"><?php echo $value->Name;?></div>
											</label>
										</h2><!--get product detail -name-description - availability --->
										<div class="product-dis" style="font-size: 20px;font-family: Georgia;color: #000;">
											<p><?php echo $value->Description;?> </p>
											
										</div>
										<div class="options">
											<!--get vendor detail name --->
											<?php 
											$vendorid=$value->VendorID;
											$result2 = get_vendor_by_id($vendorid);
											
											foreach($result2 as $vendorvalue) {
												?>
												<div class="sub-text" style="color:#000;">Vendor: 
													<strong><b><?php echo $vendorvalue->Name;?> </p></b></strong> 
													
												</div>
												<div class="star"><div class="fill" style="width:70%;"></div></div>
											</div><?php } ?><!-- close get vendor detail name --->
											<div class="availabile price_class" style="color: #000;font-size: 20px;">Availability:
												<span class="stock" style="font-weight: bold;color: green;"> 
													<b>
														<!--get product detail name-description  availability --->
														<?php echo $value->Available;?> 
													</b>
												<?php } ?>
												</span>
											</div>
											<div class="availabile price_class"  id="pprice" style="color: #000;font-size: 20px; margin-top:15px;display:none;">
											<span id="p_price"> Price:</span>
											<span class="stock" id="price" name="price" style="font-weight: bold;color: green;"> 
												
												</span>
											
											</div>

										<?php	
											
											
									 if($ProductType=='variable')
							 {
								 //echo "empty";
								 $id= $_GET['id'];
												
								$colourresult = get_varient_attribute_by_productId($id );
								?>
								
										<div class="selector">
											<div class="row">
												
												<!-- get_varient_attribute_by_productId colour ,start timeing etc.. --->
												<?php
												$id= $_GET['id'];
												
												$colourresult = get_varient_attribute_by_productId($id );
											//print_r($colourresult);
												$arrValue = array();
												$var_id = array();
												$arrValue1 = array();
												$temp_array = array();
												$temp_price = array();
												$key='';
												foreach($colourresult as $colourvalue) {										

													foreach($colourvalue as $colourvalue1) {
														$key=$colourvalue1->categoryVariantAttributename;
														$temp_array[]=$colourvalue1->CategoryVariantAttributeValue;
														$temp_price[] =$colourvalue1->productVariantPrice;
														$temp_varid[] =$colourvalue1->productVariantID;
													}
													$arrValue[$key] = $temp_array;											
													$arrValue1[$key] = $temp_price;
												}  ?>
												
												
												<?php
											// print_r($temp_varid);
												$col=array();										
												foreach($arrValue as $key=>$row) {
												//echo $key;
											//	 echo $key = $row["Colour "];
													
													foreach($row as $k=>$val) {
														
														
														$col[]=$val;
	                      //  print_r (explode(" ",$val));
													}
												}
									// echo $key;
									//print_r( $col);
												
												
												
												$col1=array();
												foreach($arrValue1 as $key1=>$row1) {
												//echo $key;
											//	 echo $key = $row["Colour "];
													foreach($row1 as $k1=>$val1) {
														$col1[]=$val1;
	                      //  print_r (explode(" ",$val));
													}
												}
												
									//print_r( $col1);
												
												
												$c = array_combine($col, $col1);
												
											//print_r($arrValue1);
												
											//echo implode(" ",$arrValue);
											//$c = array_combine($arrValue,$arrValue1);
											//print_r($c);
												?>
												
												
												<div class="col-md-12" style="width:50%;">
													<p><?php  echo $key;?></p>
													<select id="parent_cat" class="form-control">
													<option value=''>Select the varient</option>
														<?php
														$count=0;
														foreach($c as $p=>$val)

														{
													//print_r($val);
													//echo "key".$key;
													//echo "val".$val;
															?>
															<option id="varient_name" value="<?php echo $val;?>"><?php echo $p;?></option>
															<?php
														}
														?>
													</select>
												</div>
												
												
												
											</div>
										
							
						</div>
							<div class="selectbox">
													<div class="row">
														<div class="col-md-6" style="width:50%;">
															<p>Select your event day to check the availability:</p>
															<div class="input-group input-append date" id="weekYear">
																<input name="bookdate" type="text" class="form-control" autocomplete="off" placeholder="DD / MM / YYYY" id="pro_date" value="" />
																<span class="input-group-addon add-on">
																	<i class="fa fa-calendar" aria-hidden="true"></i>
																</span> 
															</div>
														</div>
														<!--<div class="col-md-6">
															<p>QUANTITY :</p>
															<input type="number" value="1" placeholder="select" id="qty" name="qty" class="form-control"  min="1" max="50">
														</div>-->
													</div>
												</div>
						<?php
							 }
							else
							{
								?>
									
								
								<div class="availabile price_class" style="color: #000;font-size: 20px; margin-top:15px;">Price:
												<span class="stock" style="font-weight: bold;color: green;"> 
													<b>
												
														<?php echo  $simple_price;?> 
													</b>
												
												</span>
											</div>
											<div class="selectbox">
													<div class="row">
														<div class="col-md-6" style="width:50%;">
															<p>Select your event day to check the availability:</p>
															<div class="input-group input-append date" id="weekYear">
																<input name="bookdate" type="text" class="form-control" autocomplete="off" placeholder="DD / MM / YYYY" id="pro_date" value="" />
																<span class="input-group-addon add-on">
																	<i class="fa fa-calendar" aria-hidden="true"></i>
																</span> 
															</div>
														</div>
														<!--<div class="col-md-6">
															<p>QUANTITY :</p>
															<input type="number" value="1" placeholder="select" id="qty" name="qty" class="form-control"  min="1" max="50">
														</div>-->
													</div>
												</div>	
										
								<?php } ?>
					</div>
						<div class=""  style="display: block;top: 462px;left: 779px;">
											
												<div class="cost">	
													
													
													
													<div class="proceed buttons col-sm-12" style="margin-top: 20px;margin-bottom: 20px;">
														<div class="proceed buttons col-sm-12">
															
															<!--<div class="col-sm-6 " id="price" name="price" style="color: green;font-size: 20px;"></div>-->	
															<div id="c" style="font-size: 15px;"></div>
															<input type="hidden" name="delivery_charge" id="delivery_charge" class="form-control" value="20" />
															 <input type="hidden" name="product_varient" id="product_varient" class="form-control" value="no varient" /> 
															
	                               <input type="hidden" name="product_type" id="product_type" value="<?php echo $ProductType;?>" /> 
	                               <input type="hidden" name="hidden_name" id="name" value="<?php echo $value->Name;?>" />  
	                           <?php
	                        if($ProductType=='variable')
							{
								?>
								<input type="hidden" name="hidden_price" id="price_new" value="" /> 
								<?php
							} else { ?>
							<input type="hidden" name="hidden_price" id="price_new" value="<?php echo $simple_price;?>" />  
	                        <?php
							}
	                         ?>						   
								    <input type="hidden" name="hidden_image" id="product_img" value="<?php echo $value->Image_1;?>" /> 
									  	</div>
										<div class="row">
										<div class="col-sm-6">
										<div style="margin-top: 17px;">
		
										<p style="float:left;">Qty:-</p><input type="text" name="quantity" id="quantity" class="form-control" value="1" style="width:14%;" />
										</div>
										</div>
										<div class="col-sm-6">
										 <input type="button" name="add_to_cart" id="<?php echo $value->Id.rand(10,1000000);?>" class="btn btn-primary btn-lg pull-right add_to_cart" value="Add to Cart" />
										</div>
										</div>
	                               
											<!--<div class="col-sm-6">
												<button type="submit"  onclick="function_addto_wishlist('<?php //echo $value->Name;?>','<?php //echo $value->Id; ?>','0','1')"  class="btn btn-primary btn-lg pull-right" style="margin-bottom: 20px; ">ADD TO CART</button>
											</div>-->
											
									
									</div>
								</div>
							</div>
				</div>
		
			</div>
		</div>
	</form>
	<div class="content">
		<div class="container">
			<div class="functionality-view">
				<div class="row">
					<div class="col-sm-6 col-md-3">
						<div class="functionality-box">
							<div class="iconBox"><div class="icon icon-lead-management"></div></div>
							<h3>Lead Management</h3>
							<p>Increase occupancy, automate the lead management process, grow your  customer relationships, match sales-ready leads to the appropriate sales people.</p>
						</div>
					</div>
					<div class="col-sm-6 col-md-3">
						<div class="functionality-box">
							<div class="iconBox"><div class="icon icon-sales"></div></div>
							<h3>Sales</h3>
							<p>Track sales opportunities, manage the sales process and generate proposals. Built-in process provides an aggregate view of account activity from the past, present and future.</p>
						</div>
					</div>
					<div class="col-sm-6 col-md-3">
						<div class="functionality-box">
							<div class="iconBox"><div class="icon icon-booking"></div></div>
							<h3>Booking</h3>
							<p>Manage calendars , share availability, easily view events color-coded by status, type or location. Book and manage multiple spaces, venues, and sites all from one master calendar.</p>
						</div>
					</div>
					<div class="col-sm-6 col-md-3">
						<div class="functionality-box">
							<div class="iconBox"><div class="icon icon-operations"></div></div>
							<h3>Operations</h3>
							<p>Assign resources and review stock alerts. Create detailed reports, work orders, and generate invoices. Receive alerts on changes as they take place.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>


	</div>
	</div>
	<?php include('footer.php');?>		

	<script>
		// function getval(sel)
		// {
			// alert(sel);
			// document.getElementById("c").innerHTML = "<?php $value->Unit; ?>";
			
			// $("#pprice").css('display','block');
		// document.getElementById("price").innerHTML =sel.value;
		
		 // document.getElementById("price_new").value = sel.value;
	    //alert(sel.value);
	//}
	</script>
	<script type="text/javascript">
	    $(function () {
	        $("#parent_cat").change(function () {
	            var color = $(this).find("option:selected").text();
	            var color_price = $(this).val();
	            if(color_price=='')
				{
				$("#pprice").css('display','none');	
				}
				else
				{
				$("#pprice").css('display','block');
		document.getElementById("price").innerHTML =color_price;
		
		 document.getElementById("price_new").value = color_price;
				 document.getElementById("product_varient").value = color;
				}	
				//alert(color);
	            //alert("Selected Text: " + selectedText + " Value: " + selectedValue);
	        });
	    });
	</script>


	<script>  
	 $(document).ready(function(data){  
	      $('.add_to_cart').click(function(){  
	           var product_id = $(this).attr("id");  
	           var product_name = $('#name').val();  
	           var product_price = $('#price_new').val(); 
	           var product_quantity = $('#quantity').val();  
			    var product_image = $('#product_img').val(); 
				 var product_varient = $('#product_varient').val();
				  var product_type = $('#product_type').val();
				   var product_date = $('#pro_date').val();
				    var product_delivery_charge = $('#delivery_charge').val();
				  
	               var action = "add";  
			   
			   // alert(product_quantity);
	              if(product_price=='')
				  {
	            //alert("pls select price");
				  }
				  else if(product_date=='')
				  {
					// alert("pls select date");  
				  }
				  else
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
	                          product_image:product_image,
	                          product_varient:product_varient,
	                          product_type:product_type,
	                          product_date:product_date,
	                         product_delivery_charge:product_delivery_charge,						  
	                          action:action  
	                     },  
	                     success:function(data)  
	                     {  
	                          $('#cartinfo').html(data.cartinfo);  
	                          $('.badge').text(data.cart_item);  
	                          //alert("Product has been Added into Cart");  
							  //window.location.reload(); 						  

	                     }  
	                });  
	          		 
				  }

	      });  
	      $(document).on('click', '.delete', function(){  
	           var product_id = $(this).attr("id");  
	           var action = "remove";  
	           if(confirm("Are you sure you want to remove this product?"))  
	           {  
	                $.ajax({  
	                     url:"action.php",  
	                     method:"POST",  
	                     dataType:"json",  
	                     data:{product_id:product_id, action:action},  
	                     success:function(data){  
	                          $('#order_table').html(data.order_table);  
	                          $('.badge').text(data.cart_item);  
	                     }  
	                });  
	           }  
	           else  
	           {  
	                return false;  
	           }  
	      });  
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
	                          $('#order_table').html(data.order_table);  
	                     }  
	                });  
	           }  
	      });  
	 });  
	 </script>
	 <!--<style>
	 .datepicker.datepicker-dropdown.dropdown-menu
	 {
		 top: 440px !important;
		 left: 779px !important;
	 }
	 .datepicker-dropdown:before
	 {
	   border-right: 0px solid transparent !important; 
	     border-bottom: 0px solid #ccc !important;
	     border-top: 0;
	   border-bottom-color: rgba(0, 0, 0, 0.2); 
	     
	}

	 </style>-->

	 
	 <script type="text/javascript" src="sweetalert/sweetalert.min.js"></script>
		<script type="text/javascript">

				$(".add_to_cart").on('click', function(){
					var nameProduct = $('#name').val();
					 var product_price = $('#price_new').val(); 
					  var product_date = $('#pro_date').val();
					  if(product_price=='')
				  {
					  swal(nameProduct, "is not added to cart please select price!", "error");
					  
					  //swal(nameProduct, "is not added to cart !", "failed");
	            //alert("pls select price");
				  }
				  else if(product_date=='')
				  {
					 swal(nameProduct, "is not added to cart please select date!", "error");  
				  }
				  else
				  {
					 
					swal(nameProduct, "is added to cart !", "success");
					//window.location.reload();
					// setTimeout(function() {
						// window.location.reload();
							// }, 1500);
				  // }
				}
					
				});
			
		</script>

	<!--flex slider css and js-->

	<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
		
	 <script src="js/jquery.flexslider.js"></script>
	<script>
							// Can also be used with $(document).ready()
							$(window).load(function() {
								$('.flexslider').flexslider({
									animation: "slide",
									controlNav: "thumbnails"
								});
							});
						</script>
						<!-- //FlexSlider-->
						<script src="js/imagezoom.js"></script>
						
						<!--end flex slider css and js-->
					<!--<script type="text/javascript" src="js/bootstrap-datepicker.js"></script>
	<script>
		$('#weekYear').datepicker(
		{
			todayHighlight: true,
			format: "dd-mm-yyyy",
			 minDate: 0 
		});
		// $("#weekYear").on("changeDate", function(event) {

		// });
	</script>-->
	<style>
	.cost{
		     margin-left: 0px !important;
	}
	</style>


