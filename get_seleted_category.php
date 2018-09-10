    <?php
    session_start();

    define("image_url",$_SESSION['imageurl']);
    include 'function.php';
    if(isset($_POST["get_seleted_category"])){
     ?>
     <div class="col-md-9">
      <section class="category-products ">   
        <?php
        $id = $_POST["cat_id"];
        $result = get_category_by_id($id);?>
       <p class="bg-info" style="text-transform: uppercase;background:#a0c1b8;color:#fff;"><?php echo $result[0]->Name ?> </p>  
       <?php
        $res = get_subcategory_by_id($result[0]->Id);
        if(!empty($res)){    	
       
        foreach ($res as $resvalue) { 
         $rid= $resvalue->Id;
        ?>
  			<div class="product-grid  wow fadeInDown">
  				<?php
  					$result1 = get_all_product_by_id($rid);
  					foreach ($result1 as $value) { 
  				?>
  				<div class="col-sm-3 text-center">
  					<a  href="product_detail_new.php?id=<?php echo $value->Id; ?>">
  					<div class="product-image hovereffect" style="border: 1px solid #e1e1e1;;">
  					 <img src="<?php echo image_url.$value->Image_1 ?>" alt="Product" style="margin: 0;height:100%;width:100%;padding:2px;">
  					</div>
  					<div><p class="bg-info" style="background:#a0c1b8;text-transform: capitalize;color:#000;font-size:18px"><?php echo $name=$value->Name;?></p></div></a>
  					<div style="background:#000;border-radius: 15px;">
  					<a href="#" style="color:#fff;"><?php echo $value->price;?> KD</a>
  					</div>
  				</div><?php  }?>
              </div>   
    <?php } } else { ?>
  		<div class="product-grid  wow fadeInDown">
               <?php
              
               $result1 = get_all_product_by_id($id);
                foreach ($result1 as $value) { ?>
              <div class="col-sm-3 text-center">
  				<a  href="product_detail_new.php?id=<?php echo $value->Id; ?>">
  					<div class="product-image hovereffect" style="border: 1px solid #e1e1e1;;">
  						<img src="<?php echo image_url.$value->Image_1 ?>" alt="Product" style="margin: 0;height:100%;width:100%;padding:2px;">
  					</div>
  					<div>
  					<p class="bg-info" style="background:#a0c1b8;text-transform: capitalize;color:#000;font-size:18px"><?php echo $name=$value->Name;?></p></div>
  				</a>
                  <div style="background:#000;border-radius: 15px;">
  					<a href="#" style="color:#fff;"><?php echo $value->price;?> KD</a>
                  </div>
  			</div><?php  } ?>
          </div> 

     <?php

    }
     }  ?> 
