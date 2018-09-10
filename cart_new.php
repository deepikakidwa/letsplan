   <?php session_start();?>
   <div id="cart" class="tab-pane fade">  
                            <div class="table-responsive" id="order_table">  
                                 <table class="table table-bordered">  
                                      <tr> 
                                           <th width="40%">Product image</th>									
                                           <th width="40%">Product Name</th>  
  										 <th width="40%">Product Varient</th>
                                           <th width="10%">Quantity</th>  
                                           <th width="20%">Price</th>  
                                           <th width="15%">Total</th>  
                                           <th width="5%">Action</th>  
                                      </tr>  
                                      <?php  
                                      if(!empty($_SESSION["shopping_cart"]))  
                                      {  
                                           $total = 0;  
                                           foreach($_SESSION["shopping_cart"] as $keys => $values)  
                                           {                                               
                                      ?>  
                                      <tr> 
                                            <td><?php echo $values["product_image"]; ?></td>									
                                           <td><?php echo $values["product_name"]; ?></td>  
  										 <td><?php echo $values["product_varient"]; ?></td> 
                                           <td><input type="text" name="quantity[]" id="quantity<?php echo $values["product_id"]; ?>" value="<?php echo $values["product_quantity"]; ?>" data-product_id="<?php echo $values["product_id"]; ?>" class="form-control quantity" /></td>  
                                           <td align="right">$ <?php echo $values["product_price"]; ?></td>  
                                           <td align="right">$ <?php echo number_format($values["product_quantity"] * $values["product_price"], 2); ?></td>  
                                           <td><button name="delete" class="btn btn-danger btn-xs delete" id="<?php echo $values["product_id"]; ?>">Remove</button></td>  
                                      </tr>  
                                      <?php  
                                                $total = $total + ($values["product_quantity"] * $values["product_price"]);  
                                           }  
                                      ?>  
                                      <tr>  
                                           <td colspan="3" align="right">Total</td>  
                                           <td align="right">$ <?php echo number_format($total, 2); ?></td>  
                                           <td></td>  
                                      </tr>  
                                      <tr>  
                                           <td colspan="5" align="center">  
                                                <form method="post" action="cart.php">  
                                                     <input type="submit" name="place_order" class="btn btn-warning" value="Place Order" />  
                                                </form>  
                                           </td>  
                                      </tr>  
                                      <?php  
                                      }  
                                      ?>  
                                 </table>  
                            </div>  
                       </div>
  					  <button name="delete" class="btn btn-danger clearcart">Clear Cart <i class="zmdi zmdi-shopping-cart"></i></button>
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
  	     $(document).on('click', '.clearcart', function(){  
  	    //localStorage.clear();
  	   var action = "clear";  
             if(confirm("Are you sure you want to clear this cart?"))  
             {  
                  $.ajax({  
                       url:"clearcart.php",  
                       method:"POST",  
                       dataType:"json",  
                       data:{action:action},  
                       success:function(data){  
  					 
  				  $('#order_table').html('0');
                    $('.badge').html('0');
                  window.location='index.php';				  
                       }  
                  });  
             }  
             else  
             {  
                  return false;  
             }  
        });
   });  
   </script>