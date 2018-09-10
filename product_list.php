	<?php include 'header.php';?>
	<section class="page-header widthBgimg" style="background-image:url(images/banner-img/service-bannerImg.jpg); ">
	<input type="hidden" value="<?php echo $_GET['cid'];?>" name="cid" id="cid">
	            <div class="container">
	            	<h1>Services</h1>
	            </div>
	</section>
	<style>
	     .bg-info {
	    background-color: #d9edf7;
	    padding: 11px;
	}
	</style>
	<section>
	<div class="container">
		<div class="row list">
			<div class="col-md-3">
				<div class="popup-body">
					<span class="popup-exit" id="pop-close"></span>
					<section style="padding-bottom:50px;">
						<p class="bg-info" style="background: #a0c1b8;color:#fff;">CATEGORY</p>
							<div class="product_div">
								<ul class="filter-category product_list" >
									<?php
									
									$result = getall_category();
									$val=array();
									
									foreach ($result as $value) {
										$val[]=$value->Id;
									}
									$id=$_GET['cid'];
									$result = getall_category();
									?>
									<input type="hidden"  id="catid" name="catid[]" value="<?php print_r($val);  ?>">
									<input type="hidden"  id="size" value="<?php echo sizeof($result);  ?>">
									<?php foreach ($result as $value) {
										?>
										
										<li onclick="category('<?php echo $value->Id; ?>')" >

											<?php
											if($value->ParentId==""){
												?>
												<a href="javascript:void(0)"  cid="<?php echo $value->Id; ?>" class="category<?php echo $value->Id; ?>"><?php echo $value->Name; ?></a>
												<?php } ?>
												<?php
												$res = get_subcategory_by_id($value->Id);
												  if (!empty($res)) { ?>
												<ul class="product_id" style="display: none;"><?php
												foreach ($res as $val)
												{
													if($value->Id==$val->ParentId)
													{
														?>
														<li onclick="category('<?php echo $val->Id; ?>')" ><a href="javascript:void(0)"  cid="<?php echo $val->Id; ?>"  class="sub_category category<?php echo $val->Id; ?>"><i class="fa fa-angle-right"></i><?php echo $val->Name; ?></a></li>
													<?php
													}
													else
													{

													}
												}  ?>
												</ul> <?php } ?>
										</li>
											<?php } ?>
										</ul>
									</div>
									<article class="filter-date">
										<p class="bg-info" style="background:#a0c1b8;color:#fff;">FILTER BY DATE</p>
										<div class="input-group input-append date">
											<input type="text" class="form-control"  id="filter_date" name="date" value="DD / MM / YYYY" />
											<span class="input-group-addon add-on"><i class="fa fa-calendar" aria-hidden="true"></i></span> </div>
										</article>
									</section>
								</div>
							</div>
							<div id="productContainer"></div>
							<div class="col-md-9" id="product_list">
								<section class="category-products" style="padding-bottom:50px;">
									<P  class="bg-info" style="text-transform: uppercase;background:#a0c1b8;color:#fff;">
										<?php
										$id=$_GET['cid'];
										$result = get_category_by_id($id);
										foreach ($result as $value) {
											?>
											<?php echo $value->Name."<br>";?>
											<?php } ?>
										</p>
										<div class="clearfix"></div>
										<div id="ctl00_ContentPlaceHolder1_divproduct ">
											<div class="product-grid  wow fadeInDown">
												<?php
												$id=$_GET['cid'];
												$result1 = get_all_product_by_id($id);
												foreach ($result1 as $value) { ?>
													<div class="col-sm-3 text-center">
														<a  href="product_detail_new.php?id=<?php echo $value->Id; ?>">
															<div class="product-image hovereffect" style="border: 1px solid #e1e1e1;;">
																<img src="<?php echo image_url.$value->Image_1 ?>" alt="Product" style="margin: 0;height:100%;width:100%;padding:2px;">
															</div>
															<div>
																<p class="bg-info" style="background:#a0c1b8;text-transform: capitalize;color:#000;font-size:18px"><?php echo $name=$value->Name;?><br>
																<?php //echo $name=$value->Name;?></p>
															</div></a>
																<div style="background:#000;border-radius: 15px;">
																	<a href="#" style="color:#fff;"><?php echo $value->price;?> KD</a>
																</div>


													</div><?php  }?>
													</div>
											</section>
											</div>
										</div>
									</div>
									</section>
								</div>
	<?php include "footer.php" ;?>
	<script type="text/javascript" src="js/bootstrap-datepicker.js"></script>
	<script>
	$('#filter_date').datepicker(
	{
	todayHighlight: true,
	format: "dd-mm-yyyy",
	});
	$("#weekYear").on("changeDate", function(event) {

	});

	$(document).ready(function(){
	$("#filter_date").change(function(){
	var filter_date = $('#filter_date').val(); if(filter_date != '')
	{
	$.ajax({
	url:"filter_date.php",
	method:"POST",
	data:{filter_date:filter_date},
	success:function(data)
	{
	$("#productContainer").html(data);
	$("#product_list").css('display','none');
	}
	});
	}
	else
	{
	alert("Please Select Date");
	}
	});
	// Active class On category menu
	// $(function(){
	    // var current = window.location.href.split("=")[1]; 
		// alert(current);
	      // $('.filter-category li a').each(function(){
	        // var $this = $(this);
	        // if($this.attr('cid').indexOf(current) !== -1){
	            // $this.addClass('active');
	        // }
	    // })
	// })
	});
	</script>
	<script type="text/javascript">
	$('.filter-category > li:has(ul)').prepend('<i class="fa fa-plus-square pull-right"></i>');
	    $(function() {
	    $('.filter-category > li:has(ul)').click(function(e) {
	        e.stopPropagation();
	        var $el = $('ul',this);
	        $('.filter-category > li > ul').not($el).slideUp();
	        $el.stop(true, true).slideToggle(400);
	    });
	        $('.filter-category > li > ul > li').click(function(e) {
	        e.stopImmediatePropagation();
	    });
	});
	$('li').filter(function(){
	    return $.trim($(this).html()) == '';
	}).hide()
	</script>
	<script>
	 var oldid='';
	function category(cid)
	{
		var ccid = $('#cid').val();
		
		if($('.active').length > 0)
		
		{
			//alert("ll");
		$('.category'+ccid).removeClass('active');	
	    }
		
			
		 // var $this = $(this);
		 // alert($this);
		// alert("cid="+cid+"old= "+oldid);
		 if(oldid=='')
		 {
		 $('.category'+cid).addClass('active');	
		  oldid=cid;	
		 }
		else if(oldid !=cid)
		{
		$('.category'+cid).addClass('active');	
		$('.category'+oldid).removeClass('active');
		  oldid=cid;
		}
		else if(oldid ==cid)
		{
		 $('.category'+cid).addClass('active');	
		// $('.category'+oldid).removeClass('active');
			 oldid=cid;
		}
		
	  $.ajax({
	  url		:	"get_seleted_category.php",
	  method	:	"POST",
	  data	:	{get_seleted_category:1,cat_id:cid},
	  success	:	function(data){
	  $("#productContainer").html(data);
	  $("#product_list").css('display','none');
	  }
	  })
	}
	</script>
	<script>
	$( document ).ready(function() {
		var id = [];
		var cid = $('#cid').val();
		
		 id = $('#catid').val();
		 
		  var size = $('#size').val();
	<?php 
	$result = getall_category();
	$val=array();

	foreach ($result as $value) {
	$val[]=$value->Id;
	}

	?>
	var codes = $.parseJSON(<?php print json_encode(json_encode($val)); ?>);    // converting php array into jquery 
	$.each(codes, function(index, value) {
		
		if(value ==cid)
		{
			
		 $('.category'+cid).addClass('active');
		 $('.active').closest("ul").css('display','block');
		}
		$('.filter-category li ul').parent().addClass('hasChild');


	});
	});
	</script>
	<script>
	$("ul > li > a").click(function() {
	  var checkElement = $(this).next();

	  $("li").removeClass("active");
	  $(this).closest("li").addClass("active");

	  if (checkElement.is("ul") && checkElement.is(":visible")) {
	    $(this).closest("li").removeClass("active");
	    checkElement.slideUp("normal");
	  }
	  if (checkElement.is("ul") && !checkElement.is(":visible")) {
	    $("ul ul:visible").slideUp("normal");
	    checkElement.slideDown("normal");
	  }

	  if ($(this).closest("li").find("ul").children().length == 0) {
	    return true;
	  } else {
	    return false;
	  }
	});
	</script>
