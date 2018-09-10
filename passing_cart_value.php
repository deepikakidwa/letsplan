	<?php
	require("function.php");
	session_start();
	if($_REQUEST)
	{
		
	$ordertotalamount = 0;
	// echo "<pre>";
	// print_r($val);	
	// echo "</pre>";


	// echo json_encode($val);



	$cart_value = $_SESSION["shopping_cart"];
	// echo "<pre>";
	// print_r($cart_value);	
	// echo "</pre>";

	foreach($cart_value as $keys => $value){
		$product_price = $value['product_price'];
		$product_quantity = $value['product_quantity'];
		$product_delivery_charge = $value['product_delivery_charge'];
		 $ordertotalamount = $ordertotalamount+$product_delivery_charge+($product_quantity * $product_price);
	}
	echo "total =".$ordertotalamount;
	echo"nonce = ". $payment_method_nonce=$_POST['nonce'];
	echo"userid = ".$userid = $userid=$_SESSION['user_id'];
	echo"orderfrom = ".$orderfrom = "web";
	echo "date =".$orderdate =  date("Y-m-d h:i:s");
	echo "<br>".$productsdetail = json_encode($cart_value);
	$result = payment_status($ordertotalamount,$payment_method_nonce,$orderfrom,$orderdate,$userid,$productsdetail);

	echo "<pre>";
	print_r($result);	
	echo "</pre>";
		
	}

	?>