  <?php  
   //action.php  
   session_start();
  // $connect = mysqli_connect("localhost", "root", "", "test");  
   if(isset($_POST["product_id"]))  
   {  
        $order_table = '';  
        $message = '';  
        if($_POST["action"] == "add")  
        {  
             if(isset($_SESSION["shopping_cart"]))  
             {  
                  $is_available = 0;  
                  foreach($_SESSION["shopping_cart"] as $keys => $values)  
                  {  
                       if($_SESSION["shopping_cart"][$keys]['product_id'] == $_POST["product_id"])  
                       {  
                            $is_available++;  
                            $_SESSION["shopping_cart"][$keys]['product_quantity'] = $_SESSION["shopping_cart"][$keys]['product_quantity'] + $_POST["product_quantity"];  
                       }  
                  }  
                  if($is_available < 1)  
                  {  
                       $item_array = array(  
                            'product_id'               =>     $_POST["product_id"],  
                            'product_name'               =>     $_POST["product_name"],  
                            'product_price'               =>     $_POST["product_price"],  
                            'product_quantity'          =>     $_POST["product_quantity"],
                            'product_image'          =>     $_POST["product_image"],
                            'product_varient'          =>     $_POST["product_varient"],	
                            'product_type'          =>     $_POST["product_type"],
                            'product_date'          =>     $_POST["product_date"],
                            'product_delivery_charge'          => $_POST["product_delivery_charge"]					  
                       );  
                       $_SESSION["shopping_cart"][] = $item_array;  
                  }  
             }  
             else  
             {  
                  $item_array = array(  
                       'product_id'               =>     $_POST["product_id"],  
                       'product_name'               =>     $_POST["product_name"],  
                       'product_price'               =>     $_POST["product_price"],  
                       'product_quantity'          =>     $_POST["product_quantity"],
                       'product_image'          =>     $_POST["product_image"],
                       'product_varient'          =>     $_POST["product_varient"],
                       'product_type'          =>     $_POST["product_type"],
                       'product_date'          =>     $_POST["product_date"],
                       'product_delivery_charge'          => $_POST["product_delivery_charge"]					 
                  );  
                  $_SESSION["shopping_cart"][] = $item_array;  
             }  
        } 
        if($_POST["action"] == "remove")  
        {  
             foreach($_SESSION["shopping_cart"] as $keys => $values)  
             {  
                  if($values["product_id"] == $_POST["product_id"])  
                  {  
                       unset($_SESSION["shopping_cart"][$keys]);  
  				    $message = '<label class="text-success">Product Removed</label>'; 				
                  }  
             }  
        }  
        if($_POST["action"] == "quantity_change")  
        {  
             foreach($_SESSION["shopping_cart"] as $keys => $values)  
             {  
                  if($_SESSION["shopping_cart"][$keys]['product_id'] == $_POST["product_id"])  
                  {  
                       $_SESSION["shopping_cart"][$keys]['product_quantity'] = $_POST["quantity"];  
                  }  
             }  
        }  
        $order_table .= '<table class="bookin-table"> ';  
        if(!empty($_SESSION["shopping_cart"]))  
        {  
             $total = 0;  
             foreach($_SESSION["shopping_cart"] as $keys => $values)  
  		     {
  		   
  		    $order_table .= '
  		   <tr>
                              <th colspan="7" class="table-heading">'.$values["product_name"].' <a href="#" class="icon icon-delete"></a></th>
                          </tr>';
  						
  					 $order_table .= '	 <tr>
                             <td class="first Theading" style="width:10%;">Product Varient</td>
  						  <td class="Theading" style="width:10%;">produc Date</td>
                             <td class="Theading" style="width:10%;">Quantity</td>
  							<td class="Theading" style="width:10%;">Deliver Charge</td>
                              <td class="Theading" style="width:10%;">Price</td>
                              <td class="Theading" style="width:10%;">Total</td>
                              <td class="Theading" style="width:10%;">Action</td>
                          </tr>';
  						 $order_table .= ' <tr>
                              <td>
                                  <p>'.$values["product_varient"].'</p>
                              </td>
  							   <td>
                                  <p>'.$values["product_date"].'</p>
                              </td>
                              <td>
                    <p><input type="text" name="quantity[]" id="quantity'.$values["product_id"].'" value="'.$values["product_quantity"].'" data-product_id="'.$values["product_id"].'" class="form-control quantity" /></p>
                              </td>
  							 <td>
                                  
                                  <p>$ '.$values["product_delivery_charge"].'</p>
                              </td>
                              <td>
                                  
                                  <p>$ '.$values["product_price"].'</p>
                              </td>
                              <td>
                                  <p>$ '.$total_price=($values["product_quantity"] * $values["product_price"])+$values["product_delivery_charge"].'</p>
                              </td>
                              <td>
                                  <p><button name="delete" class="btn btn-danger btn-xs delete" id="'.$values["product_id"].'">Remove</button></p>
                                  
                              </td>
                           
                          </tr>';
  						
               $total = $values["product_delivery_charge"]+ $total + ($values["product_quantity"] * $values["product_price"]);  
                 
             }  
             $order_table .= '</table>';
  		   $order_table .= '<table class="bookinTotal">
                          <tr>
                              <td class="subTotal">Subtotal</td>
                              <td class="amount subTotal">$ '.number_format($total, 2).'</td>
                          </tr>';
  		   $order_table .= '</table>';
        }  
  	  
  	 
          
  		
  		 if(!empty($_SESSION["shopping_cart"]))  
        {  
             $total = 0;
  		   $cartinfo='';

              $cartinfo .= ' <div class="row total-header-section">
                          <div class="col-lg-6 col-sm-6 col-6 total-section text-right">
                            <p> <span class="simpleCart_total_price">';
                						  if(isset($_SESSION["shopping_cart"]))
                						  {
  						               $total = 0;
                             foreach($_SESSION["shopping_cart"] as $keys => $values) {
  						            $cartinfo .= '</span></p>
                           </div>
                         </div>';
  					   
  		$cartinfo .= '<div class="row cart-detail" style="border-bottom:1px solid #eee;">
                          <div class="col-lg-4 col-sm-3 col-4 col-4 cart-detail-img">
                            <img src="'.$_SESSION['imageurl'].$values["product_image"].'" style="width:50px;height:50px;">
                            </div>
                            <div class="col-lg-8 col-sm-8 col-8 cart-detail-product" style="border-left:1px solid #eee;">
                             <p>'.$values["product_name"].'</p>
                             <span class="price text-info">Price:- $'.$values["product_price"].'</span>
                              <span class="count">Qty:-'.$values["product_quantity"].'';
  						     $total = $values["product_delivery_charge"]+ $total + ($values["product_quantity"] * $values["product_price"]); 
  							 
  							$cartinfo .= '</span><br>
                             <span class="count">Shipping:- $'.$values["product_delivery_charge"].'</span>
                           </div>
                         </div>';
  					   
  					   $cartinfo .= '<div class="row">
                          <div class="col-md-12 ">';
  						 }
                      $cartinfo .= '<a href="mycart.php" type="button" id="mycart" class="btn btn-primary btn-block">Total $ '.number_format($total, 2).'</a>';
                         }
                        $cartinfo .= ' </div>
                                  </div>';
  	  }
  		
        $output = array(  
             'order_table'     =>     $order_table,
             'cartinfo'     =>     $cartinfo,	
  		 		   
             'cart_item'          =>     count($_SESSION["shopping_cart"])  
        );  
        echo json_encode($output);  
   }  
   ?>
