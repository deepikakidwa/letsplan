	<?php
	//**************************************************For Login*************************************************************

	//**************************************************End For Login*********************************************************

	define("api_url", "http://192.168.1.116:3000/api");

	//define("api_url", "http://178.128.71.230:3000/api");


	function arr_search($array, $key, $value)
	{
		$results = array();

		if (is_array($array)) {
			if (isset($array[$key]) && $array[$key] == $value) {
				$results[] = $array;
			}

			foreach ($array as $subarray) {
				$results = array_merge($results, arr_search($subarray, $key, $value));
			}
		}

		return $results;
	}

	function getall_category(){
		$url = api_url."/category";
		$client = curl_init($url);
		curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
		$response = curl_exec($client);	
		$result = json_decode($response);
		return $result;
	}

	function get_subcategory_by_id($id){
		
		$url = api_url."/category/subcategory/$id";
		$client = curl_init($url);
		curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
		$response = curl_exec($client);		
		$result = json_decode($response);
		return $result;
			//print_r($result); 	
		
	}

	function get_category_by_id($id){
		
		$url = api_url."/category/get/$id";
		$client = curl_init($url);
		curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
		$response = curl_exec($client);		
		$result = json_decode($response);
		return $result;
			//print_r($result); 	
		
	}
	function get_all_product_by_id($id){

		$url1 = api_url."/product/oncategorybase/$id";
		$client1 = curl_init($url1);
		curl_setopt($client1,CURLOPT_RETURNTRANSFER,true);
		$response1 = curl_exec($client1);  
		$result1 = json_decode($response1);
		return $result1;
		
	}

	function delete_category($id){
		
		$url=api_url."/category/delete/$id";
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE"); 
		$response = curl_exec($ch); 
		curl_close($ch); 
		$data = json_decode($response,true);
		return $data;
		
	}

	function add_category($parent_Id,$name,$description,$img){
		
		define('PARENT_ID',$parent_Id);
		define('NAME',$name);
		define('DESCRIPTION',$description);
		define('IMAGE',$img);
		//Set a user agent. This basically tells the server that we are using Chrome ;)
		define('USER_AGENT', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.2309.372 Safari/537.36');

		//Login action URL. Sometimes, this is the same URL as the login form.
		define('LOGIN_ACTION_URL', api_url.'/category');

		//An associative array that represents the required form fields.
		$postValues = array(
			'ParentId' => PARENT_ID,
			'Name' => NAME,
			'Description' => DESCRIPTION,
			'Image' => IMAGE
		);

		//Initiate cURL.
		$curl = curl_init();

		//Set the URL where we want to send our POST request.
		curl_setopt($curl, CURLOPT_URL, LOGIN_ACTION_URL);

		//Tell cURL that we want to carry out a POST request.
		curl_setopt($curl, CURLOPT_POST, true);

		//Set our post fields / date (from the array above).
		curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($postValues));

		//We don't want any HTTPS errors.
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

		//Sets the user agent. Some websites will attempt to block bot user agents.
		//Hence the reason I gave it a Chrome user agent.
		curl_setopt($curl, CURLOPT_USERAGENT, USER_AGENT);

		//Tells cURL to return the output once the request has been executed.
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

		//Do we want to follow any redirects?
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, false);

		//Check for errors!
		if(curl_errno($curl)){
			throw new Exception("Error occured=".curl_error($curl));
		}

		//Use the same user agent, just in case it is used by the server for session validation.
		curl_setopt($curl, CURLOPT_USERAGENT, USER_AGENT);

		//We don't want any HTTPS / SSL errors.
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

		//Execute the POST request. 
		$response = curl_exec($curl);
		$result = json_decode($response);
		//print_r($result);
		return $result;
	}



	function edit_category($Id,$parent_Id,$name,$description,$img){
		
		define('PARENT_ID',$parent_Id);
		define('NAME',$name);
		define('DESCRIPTION',$description);
		define('IMAGE',$img);
		
		//Set a user agent. This basically tells the server that we are using Chrome ;)
		define('USER_AGENT', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.2309.372 Safari/537.36');

		//Login action URL. Sometimes, this is the same URL as the login form.
	//	define('LOGIN_ACTION_URL', 'http://192.168.1.116:3000/api/vendor/put/$Id');
		
		//An associative array that represents the required form fields.
		$postValues = array(
			'ParentId' => PARENT_ID,
			'Name' => NAME,
			'Description' => DESCRIPTION,
			'Image' => IMAGE
		);

		//Initiate cURL.
		//$curl = curl_init();
		
		$ch = curl_init(api_url."/category/put/$Id");
		
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
		curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query($postValues));
		
		$response = curl_exec($ch);
		if(!$response) {
			return false;
		}

		$result = json_decode($response);
		return $result;

		
	}	
	function getall_users(){		
		$url = api_url."/user";
		$client = curl_init($url);
		curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
		$response = curl_exec($client);		
		$result = json_decode($response);
		return $result;		
		print_r($result);
	}

	function add_varient_attribute($category_id,$name,$type)	{

		define('NAME',$name);
		define('TYPE',$type);
		define('CATEGORY_ID',$category_id);
		//Set a user agent. This basically tells the server that we are using Chrome ;)
		define('USER_AGENT', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.2309.372 Safari/537.36');

		//Login action URL. Sometimes, this is the same URL as the login form.
		define('LOGIN_ACTION_URL', api_url.'/catvarattr/');

		//An associative array that represents the required form fields.
		$postValues = array(
			'CategoryID' => CATEGORY_ID,
			'Name' => NAME,
			'Type' => TYPE
		);

		//Initiate cURL.
		$curl = curl_init();

		//Set the URL where we want to send our POST request.
		curl_setopt($curl, CURLOPT_URL, LOGIN_ACTION_URL);

		//Tell cURL that we want to carry out a POST request.
		curl_setopt($curl, CURLOPT_POST, true);

		//Set our post fields / date (from the array above).
		curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($postValues));

		//We don't want any HTTPS errors.
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

		//Sets the user agent. Some websites will attempt to block bot user agents.
		//Hence the reason I gave it a Chrome user agent.
		curl_setopt($curl, CURLOPT_USERAGENT, USER_AGENT);

		//Tells cURL to return the output once the request has been executed.
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

		//Do we want to follow any redirects?
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, false);

		//Check for errors!
		if(curl_errno($curl)){
			throw new Exception("Error occured=".curl_error($curl));
		}

		//Use the same user agent, just in case it is used by the server for session validation.
		curl_setopt($curl, CURLOPT_USERAGENT, USER_AGENT);

		//We don't want any HTTPS / SSL errors.
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

		//Execute the POST request. 
		$response = curl_exec($curl);
		$result = json_decode($response);
		//print_r($result);
		return $result;
	}	

	function add_varient_attribute_value($CategoryVariantAttributeID,$attributevalue){
		
		define('CAT_VARIENT_Attri_ID',$CategoryVariantAttributeID);
		define('ATTRIBUTE_VALUE',$attributevalue);
		//Set a user agent. This basically tells the server that we are using Chrome ;)
		define('USER_AGENT', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.2309.372 Safari/537.36');

		//Login action URL. Sometimes, this is the same URL as the login form.
		define('LOGIN_ACTION_URL', api_url.'/catevarattrvalue/');
		
		//An associative array that represents the required form fields.
		$postValues = array(
			'CategoryVariantAttributeID' => CAT_VARIENT_Attri_ID,
			'Value' => ATTRIBUTE_VALUE
		);

		//Initiate cURL.
		$curl = curl_init();

		//Set the URL where we want to send our POST request.
		curl_setopt($curl, CURLOPT_URL, LOGIN_ACTION_URL);

		//Tell cURL that we want to carry out a POST request.
		curl_setopt($curl, CURLOPT_POST, true);

		//Set our post fields / date (from the array above).
		curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($postValues));

		//We don't want any HTTPS errors.
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

		//Sets the user agent. Some websites will attempt to block bot user agents.
		//Hence the reason I gave it a Chrome user agent.
		curl_setopt($curl, CURLOPT_USERAGENT, USER_AGENT);

		//Tells cURL to return the output once the request has been executed.
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

		//Do we want to follow any redirects?
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, false);

		//Check for errors!
		if(curl_errno($curl)){
			throw new Exception("Error occured=".curl_error($curl));
		}

		//Use the same user agent, just in case it is used by the server for session validation.
		curl_setopt($curl, CURLOPT_USERAGENT, USER_AGENT);

		//We don't want any HTTPS / SSL errors.
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

		//Execute the POST request. 
		$response = curl_exec($curl);
		$result = json_decode($response);

		return $result;
		
	}

	function getall_attributes(){
		
		$url = api_url."/catvarattr";
		$client = curl_init($url);
		curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
		$response = curl_exec($client);		
		$result = json_decode($response);
		return $result;
		
	}

	//getting list of all category_varient_attribute_value(list of attribute value)
	function getall_attribute_value_list(){
		
		$url = api_url."/catevarattrvalue";
		$client = curl_init($url);
		curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
		$response = curl_exec($client);		
		$result = json_decode($response);
		return $result;
		
	}



	function getall_varient_attribute_value($category_id){
		
		$url = api_url."/catvarattr/data/$category_id";
		$client = curl_init($url);
		curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
		$response = curl_exec($client);		
		$result = json_decode($response);
		return $result;
		
		
	}



	function getall_varient_attribute_list(){
		
		$url = api_url."/catvarattr";
		$client = curl_init($url);
		curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
		$response = curl_exec($client);		
		$result = json_decode($response);
		return $result;
		
		
	}

	function get_varient_attribute_by_Id($id){
		
		
		$url = api_url."/catvarattr/get/$id";
		$client = curl_init($url);
		curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
		$response = curl_exec($client);		
		$result = json_decode($response);
		return $result;
		
		
	}


	function get_varient_attribute_by_productId($id){
		
		
		$url = api_url."/prodvariant/productdetailandvariantbyproductid/$id";
		$client = curl_init($url);
		curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
		$response = curl_exec($client);		
		$result = json_decode($response);
		return $result;
		
		
	}


	function edit_varient_attribute($id,$name,$type){
		
		define('attribute_name',$name);
		define('attribute_type',$type);
		
		//Set a user agent. This basically tells the server that we are using Chrome ;)
		define('USER_AGENT', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.2309.372 Safari/537.36');

		//Login action URL. Sometimes, this is the same URL as the login form.
	//	define('LOGIN_ACTION_URL', 'http://192.168.1.116:3000/api/vendor/put/$Id');
		
		//An associative array that represents the required form fields.
		$postValues = array(
			'Name' => attribute_name,
			'Type' => attribute_type
			
		);

		//Initiate cURL.
		//$curl = curl_init();
		
		$ch = curl_init(api_url."/catvarattr/put/$id");
		
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
		curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query($postValues));
		
		$response = curl_exec($ch);
		if(!$response) {
			return false;
		}

		$result = json_decode($response);
		return $result;
		
	}


	function delete_varient_attribute($id){

		$url=api_url."/catvarattr/delete/$id";
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE"); 
		$response = curl_exec($ch); 
		curl_close($ch); 
		$data = json_decode($response,true);
		return $data;
		
	}	

	function getall_vendors(){
		
		$url = api_url."/vendor";
		$client = curl_init($url);
		curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
		$response = curl_exec($client);		
		$result = json_decode($response);
		return $result;
		
		
	}

	function add_vendor($vendorname,$location,$description,$img,$video){
		
		define('vendorname',$vendorname);
		define('location',$location);
		define('description',$description);
		define('img',$img);
		define('video',$video);
		//Set a user agent. This basically tells the server that we are using Chrome ;)
		define('USER_AGENT', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.2309.372 Safari/537.36');

		//Login action URL. Sometimes, this is the same URL as the login form.
		define('LOGIN_ACTION_URL', api_url.'/vendor/');
		
		//An associative array that represents the required form fields.
		$postValues = array(
			'Name' => vendorname,
			'location' => location,
			'Description' => description,
			'Image' => img,
			'Video' => video
		);

		//Initiate cURL.
		$curl = curl_init();

		//Set the URL where we want to send our POST request.
		curl_setopt($curl, CURLOPT_URL, LOGIN_ACTION_URL);

		//Tell cURL that we want to carry out a POST request.
		curl_setopt($curl, CURLOPT_POST, true);

		//Set our post fields / date (from the array above).
		curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($postValues));

		//We don't want any HTTPS errors.
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

		//Sets the user agent. Some websites will attempt to block bot user agents.
		//Hence the reason I gave it a Chrome user agent.
		curl_setopt($curl, CURLOPT_USERAGENT, USER_AGENT);

		//Tells cURL to return the output once the request has been executed.
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

		//Do we want to follow any redirects?
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, false);

		//Check for errors!
		if(curl_errno($curl)){
			throw new Exception("Error occured=".curl_error($curl));
		}

		//Use the same user agent, just in case it is used by the server for session validation.
		curl_setopt($curl, CURLOPT_USERAGENT, USER_AGENT);

		//We don't want any HTTPS / SSL errors.
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

		//Execute the POST request. 
		$response = curl_exec($curl);
		$result = json_decode($response);

		return $result;
		
	}



	function delete_vendor($id){
		
		$url=api_url."/vendor/delete/$id";
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE"); 
		$response = curl_exec($ch); 
		curl_close($ch); 
		$data = json_decode($response,true);
		return $data;
		
	}


	function get_vendor_by_id($id){
		
		$url = api_url."/vendor/get/$id";
		$client = curl_init($url);
		curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
		$response = curl_exec($client);		
		$result = json_decode($response);
		return $result;
			//print_r($result); 	
		
	}


	function edit_vendor($Id,$vendorname,$location,$description,$img,$video){
		
		
		define('vendorname',$vendorname);
		define('location',$location);
		define('description',$description);
		define('img',$img);
		define('video',$video);
		//Set a user agent. This basically tells the server that we are using Chrome ;)
		define('USER_AGENT', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.2309.372 Safari/537.36');

		//Login action URL. Sometimes, this is the same URL as the login form.
	//	define('LOGIN_ACTION_URL', 'http://192.168.1.116:3000/api/vendor/put/$Id');
		
		//An associative array that represents the required form fields.
		$postValues = array(
			'Name' => vendorname,
			'location' => location,
			'Description' => description,
			'Image' => img,
			'Video' => video
		);

		//Initiate cURL.
		//$curl = curl_init();
		
		$ch = curl_init(api_url."/vendor/put/$Id");
		
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
		curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query($postValues));
		
		$response = curl_exec($ch);
		if(!$response) {
			return false;
		}

		$result = json_decode($response);
		return $result;
		
	}

	//getting list of products
	function getall_product(){
		$url = api_url."/product";
		$client = curl_init($url);
		curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
		$response = curl_exec($client);		
		$result = json_decode($response);
		return $result;
	}


	//getting product by Id
	function get_product_by_id($id){
		
		$url = api_url."/product/get/$id";
		$client = curl_init($url);
		curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
		$response = curl_exec($client);		
		$result = json_decode($response);
		return $result;
			//print_r($result); 	
		
	}

	// Adding new product
	function add_product($product_name,$description,$category,$vendor,$product_type,$availability,$video,$img1,$img2,$img3,$additional_info){
		
		define('productname',$product_name);
		define('description',$description);
		define('category_id',$category);
		define('vendor_id',$vendor);
		define('producttype',$product_type);
		define('availability',$availability);
		define('video',$video);
		define('img1',$img1);
		define('img2',$img2);
		define('img3',$img3);
		define('additional_info',$additional_info);
		//Set a user agent. This basically tells the server that we are using Chrome ;)
		define('USER_AGENT', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.2309.372 Safari/537.36');

		//Login action URL. Sometimes, this is the same URL as the login form.
		define('LOGIN_ACTION_URL', api_url.'/product/');
		
		//An associative array that represents the required form fields.
		$postValues = array(
			'Name' => productname,
			'Description' => description,
			'CategoryID' => category_id,
			'VendorID' => vendor_id,
			'ProductType' => producttype,
			'Available' => availability,
			'Video' => video,
			'Image_1' => img1,
			'Image_2' => img2,
			'Image_3' => img3,
			'AddInfo' => additional_info
		);

		//Initiate cURL.
		$curl = curl_init();

		//Set the URL where we want to send our POST request.
		curl_setopt($curl, CURLOPT_URL, LOGIN_ACTION_URL);

		//Tell cURL that we want to carry out a POST request.
		curl_setopt($curl, CURLOPT_POST, true);

		//Set our post fields / date (from the array above).
		curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($postValues));

		//We don't want any HTTPS errors.
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

		//Sets the user agent. Some websites will attempt to block bot user agents.
		//Hence the reason I gave it a Chrome user agent.
		curl_setopt($curl, CURLOPT_USERAGENT, USER_AGENT);

		//Tells cURL to return the output once the request has been executed.
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

		//Do we want to follow any redirects?
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, false);

		//Check for errors!
		if(curl_errno($curl)){
			throw new Exception("Error occured=".curl_error($curl));
		}

		//Use the same user agent, just in case it is used by the server for session validation.
		curl_setopt($curl, CURLOPT_USERAGENT, USER_AGENT);

		//We don't want any HTTPS / SSL errors.
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

		//Execute the POST request. 
		$response = curl_exec($curl);
		$result = json_decode($response);

		return $result;
		
	}


	//delete specific product 

	function delete_product($id){
		
		$url=api_url."/product/delete/$id";
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE"); 
		$response = curl_exec($ch); 
		curl_close($ch); 
		$data = json_decode($response,true);
		return $data;
		
	}


	function add_product_varient($product,$price,$img1,$varient_attribute,$varient_value){
		
		define('product',$product);
		define('price',$price);
		define('img1',$img1);
		define('varient_attribute',$varient_attribute);
		define('varient_value',$varient_value);
		
		//Set a user agent. This basically tells the server that we are using Chrome ;)
		define('USER_AGENT', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.2309.372 Safari/537.36');

		//Login action URL. Sometimes, this is the same URL as the login form.
		define('LOGIN_ACTION_URL', api_url.'/prodvariant/');
		
		//An associative array that represents the required form fields.
		$postValues = array(
			'ProductID' => product,
			'Price' => price,
			'Image' => img1,
			'ProductAttributeID' => varient_attribute,
			'ProductAttributeValueID' => varient_value
		);


		//Initiate cURL.
		$curl = curl_init();

		//Set the URL where we want to send our POST request.
		curl_setopt($curl, CURLOPT_URL, LOGIN_ACTION_URL);

		//Tell cURL that we want to carry out a POST request.
		curl_setopt($curl, CURLOPT_POST, true);

		//Set our post fields / date (from the array above).
		curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($postValues));

		//We don't want any HTTPS errors.
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

		//Sets the user agent. Some websites will attempt to block bot user agents.
		//Hence the reason I gave it a Chrome user agent.
		curl_setopt($curl, CURLOPT_USERAGENT, USER_AGENT);

		//Tells cURL to return the output once the request has been executed.
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

		//Do we want to follow any redirects?
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, false);

		//Check for errors!
		if(curl_errno($curl)){
			throw new Exception("Error occured=".curl_error($curl));
		}

		//Use the same user agent, just in case it is used by the server for session validation.
		curl_setopt($curl, CURLOPT_USERAGENT, USER_AGENT);

		//We don't want any HTTPS / SSL errors.
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

		//Execute the POST request. 
		$response = curl_exec($curl);
		$result = json_decode($response);

		return $result;
		
	}


	//getting list of all product varients(product attributes)
	function getall_ProductVariant(){
		$url = api_url."/prodvariant";
		$client = curl_init($url);
		curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
		$response = curl_exec($client);		
		$result = json_decode($response);
		return $result;
	}


	//getting list of products varient attributes	(product name,attribute name,varient attribute name)
	function getall_product_varient_attributes(){
		
		$url = api_url."/prodvariant/getdata";
		$client = curl_init($url);
		curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
		$response = curl_exec($client);		
		$result = json_decode($response);
		return $result;
		
		
	}

	//delete record from product varient table
	function delete_product_varient_attribute($id){

		$url=api_url."/prodvariant/delete/$id";
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE"); 
		$response = curl_exec($ch); 
		curl_close($ch); 
		$data = json_decode($response,true);
		return $data;
		
	}	


	//update productvarient table
	function edit_product_varient_attribute($Id,$Price,$Image,$ProductAttribute,$ProductAttributeValue){
		
		
		define('Price',$Price);
		define('Image',$Image);
		define('ProductAttribute',$ProductAttribute);
		define('ProductAttributeValue',$ProductAttributeValue);
		
		//Set a user agent. This basically tells the server that we are using Chrome ;)
		define('USER_AGENT', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.2309.372 Safari/537.36');

		//Login action URL. Sometimes, this is the same URL as the login form.
	//	define('LOGIN_ACTION_URL', 'http://192.168.1.116:3000/api/prodvariant/put/$Id');
		
		//An associative array that represents the required form fields.
		$postValues = array(
			'Price' => Price,
			'Image' => Image,
			'ProductAttribute' => ProductAttribute,
			'ProductAttributeValue' => ProductAttributeValue
		);

		//Initiate cURL.
		//$curl = curl_init();
		
		$ch = curl_init(api_url."/vendor/put/$Id");
		
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
		curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query($postValues));
		
		$response = curl_exec($ch);
		if(!$response) {
			return false;
		}

		$result = json_decode($response);
		return $result;
		
	}
	// adding record in generat_setting table.
	function add_all_paths($SiteDomain,$SiteRootPath,$ImagePath,$IconPath,$Logo,$LogoSmall){
		
		define('SiteDomain',$SiteDomain);
		define('SiteRootPath',$SiteRootPath);
		define('ImagePath',$ImagePath);
		define('IconPath',$IconPath);
		define('Logo',$Logo);
		define('LogoSmall',$LogoSmall);
		
			//Set a user agent. This basically tells the server that we are using Chrome ;)
		define('USER_AGENT', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.2309.372 Safari/537.36');
		
			//Login action URL. Sometimes, this is the same URL as the login form.
		define('LOGIN_ACTION_URL',  api_url."/generalsetting/");
		
			//An associative array that represents the required form fields.
		$postValues = array(
			'SiteDomain' => SiteDomain,
			'SiteRootPath' => SiteRootPath,
			'ImagePath' => ImagePath,
			'IconPath' => IconPath,
			'Logo' => Logo,
			'LogoSmall' => LogoSmall
		);
		
		
			//Initiate cURL.
		$curl = curl_init();
		
			//Set the URL where we want to send our POST request.
		curl_setopt($curl, CURLOPT_URL, LOGIN_ACTION_URL);
		
			//Tell cURL that we want to carry out a POST request.
		curl_setopt($curl, CURLOPT_POST, true);
		
			//Set our post fields / date (from the array above).
		curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($postValues));
		
			//We don't want any HTTPS errors.
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		
			//Sets the user agent. Some websites will attempt to block bot user agents.
			//Hence the reason I gave it a Chrome user agent.
		curl_setopt($curl, CURLOPT_USERAGENT, USER_AGENT);
		
			//Tells cURL to return the output once the request has been executed.
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		
			//Do we want to follow any redirects?
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, false);
		
			//Check for errors!
		if(curl_errno($curl)){
			throw new Exception("Error occured=".curl_error($curl));
		}
		
			//Use the same user agent, just in case it is used by the server for session validation.
		curl_setopt($curl, CURLOPT_USERAGENT, USER_AGENT);
		
			//We don't want any HTTPS / SSL errors.
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		
			//Execute the POST request. 
		$response = curl_exec($curl);
		$result = json_decode($response);
		
		return $result;
		
	}


	function getall_path(){
		$url = api_url."/miscellaneous";
		$client = curl_init($url);
		curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
		$response = curl_exec($client);	
		$result = json_decode($response);
			//print_r($result);
		return $result;
	}

	function create_user($email,$userName,$password,$moblieNo){
		
		define('email',$email);
		define('userName',$userName);
		define('password',$password);
		define('moblieNo',$moblieNo);
		
		
			//Set a user agent. This basically tells the server that we are using Chrome ;)
		define('USER_AGENT', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.2309.372 Safari/537.36');
		
			//Login action URL. Sometimes, this is the same URL as the login form.
		define('LOGIN_ACTION_URL', api_url."/user/adduser");
		
			//An associative array that represents the required form fields.
		$postValues = array(
		    'email' => email,
			'userName' => userName,
			'password' => password,
			'mobile' => moblieNo
			
		);
		
		
			//Initiate cURL.
		$curl = curl_init();
		
			//Set the URL where we want to send our POST request.
		curl_setopt($curl, CURLOPT_URL, LOGIN_ACTION_URL);
		
			//Tell cURL that we want to carry out a POST request.
		curl_setopt($curl, CURLOPT_POST, true);
		
			//Set our post fields / date (from the array above).
		curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($postValues));
		
			//We don't want any HTTPS errors.
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		
			//Sets the user agent. Some websites will attempt to block bot user agents.
			//Hence the reason I gave it a Chrome user agent.
		curl_setopt($curl, CURLOPT_USERAGENT, USER_AGENT);
		
			//Tells cURL to return the output once the request has been executed.
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		
			//Do we want to follow any redirects?
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, false);
		
			//Check for errors!
		if(curl_errno($curl)){
			throw new Exception("Error occured=".curl_error($curl));
		}
		
			//Use the same user agent, just in case it is used by the server for session validation.
		curl_setopt($curl, CURLOPT_USERAGENT, USER_AGENT);
		
			//We don't want any HTTPS / SSL errors.
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		
			//Execute the POST request. 
		$response = curl_exec($curl);
		return $response;
		
	}	

	// Login 
	function user_login($email,$pass)
	{
		define('EMAIL', $email);
	//The password of the account.
		define('PASSWORD', $pass);
	//Set a user agent. This basically tells the server that we are using Chrome ;)
		define('USER_AGENT', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.2309.372 Safari/537.36');
	//Where our cookie information will be stored (needed for authentication).
		define('COOKIE_FILE', 'cookie.txt');
	//URL of the login form.
		define('LOGIN_FORM_URL', 'http://localhost/event_planning/index.php');
	//Login action URL. Sometimes, this is the same URL as the login form.
		define('LOGIN_ACTION_URL', api_url.'/user/token');
	//An associative array that represents the required form fields.
	//You will need to change the keys / index names to match the name of the form
	//fields.
		$postValues = array(
			'email' => EMAIL,
			'password' => PASSWORD );
	//Initiate cURL.
		$curl = curl_init();
	//Set the URL that we want to send our POST request to. In this
	//case, it's the action URL of the login form.
		curl_setopt($curl, CURLOPT_URL, LOGIN_ACTION_URL);

	//Tell cURL that we want to carry out a POST request.
		curl_setopt($curl, CURLOPT_POST, true);

	//Set our post fields / date (from the array above).
		curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($postValues));

	//We don't want any HTTPS errors.
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
	//Where our cookie details are saved. This is typically required
	//for authentication, as the session ID is usually saved in the cookie file.
		curl_setopt($curl, CURLOPT_COOKIEJAR, COOKIE_FILE);
	//Sets the user agent. Some websites will attempt to block bot user agents.
	//Hence the reason I gave it a Chrome user agent.
		curl_setopt($curl, CURLOPT_USERAGENT, USER_AGENT);

	//Tells cURL to return the output once the request has been executed.
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

	//Allows us to set the referer header. In this particular case, we are 
	//fooling the server into thinking that we were referred by the login form.
		curl_setopt($curl, CURLOPT_REFERER, LOGIN_FORM_URL);

	//Do we want to follow any redirects?
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, false);

	//Execute the login request.
		curl_exec($curl);
		curl_setopt($curl, CURLOPT_COOKIEJAR, COOKIE_FILE);
	//Use the same user agent, just in case it is used by the server for session validation.
		curl_setopt($curl, CURLOPT_USERAGENT, USER_AGENT);
	//We don't want any HTTPS / SSL errors.
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
	// Decode result value
		$result=curl_exec($curl);
		return $json_dc = json_decode($result, true);

	}// unset $_SESSION variable for the 


	function add_to_cart($user_id,$product_id,$product_type,$quantity,$actual_link,$id){ 
		define('UserID',$user_id);
		define('ProductID',$product_id);
		define('ProductType',$product_type);
			// define('DateAdded',$date);
		define('UserSelectedValue',$quantity);
		//Set a user agent. This basically tells the server that we are using Chrome ;)
		define('USER_AGENT', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.2309.372 Safari/537.36');
		define('REG_FORM_URL', api_url.'/cart/');
	  //Register action URL. Sometimes, this is the same URL as the login form.
		define('REG_ACTION_URL', api_url.'/cart/');
	  //An associative array that represents the required form fields.
		$postValues = array(
			'UserID' => UserID,
			'ProductID' => ProductID,
			'ProductType' => ProductType,
			'UserSelectedValue' =>UserSelectedValue
			
		);
	  ////Initiate cURL.
		$curl = curl_init();
	//Set the URL that we want to send our POST request to. In this
	//case, it's the action URL of the login form.
		curl_setopt($curl, CURLOPT_URL, REG_ACTION_URL);
	//Tell cURL that we want to carry out a POST request.
		curl_setopt($curl, CURLOPT_POST, true);
	//Set our post fields / date (from the array above).
		curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($postValues));
	//We don't want any HTTPS errors.
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
	//Where our cookie details are saved. This is typically required
	//for authentication, as the session ID is usually saved in the cookie file.
	//Sets the user agent. Some websites will attempt to block bot user agents.
	//Hence the reason I gave it a Chrome user agent.
		curl_setopt($curl, CURLOPT_USERAGENT, USER_AGENT);
	//Tells cURL to return the output once the request has been executed.
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	//Allows us to set the referer header. In this particular case, we are 
	//fooling the server into thinking that we were referred by the login form.
		curl_setopt($curl, CURLOPT_REFERER, REG_FORM_URL);
	//Do we want to follow any redirects?
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, false);
	//Execute the login request.
		curl_exec($curl);
	//Use the same user agent, just in case it is used by the server for session validation.
		curl_setopt($curl, CURLOPT_USERAGENT, USER_AGENT);
	//We don't want any HTTPS / SSL errors.
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
	// Decode result value
		$result=curl_exec($curl);
		$json_dc = json_decode($result, true);
		?>
		<script type="text/javascript">
			var url = '<?php echo $actual_link; ?>';
			alert()
			var id = '?id='+'<?php echo $id; ?>';
			alert("product added");
			window.location.href =url+id;
		</script>
		<?php

	} 



	function get_cart_by_userid($uid){
		$url = api_url."/cart/getcartitem/$uid";
		$client = curl_init($url);
		curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
		$response = curl_exec($client);	
		$result = json_decode($response);
			//print_r($result);
		return $result;
		
	}


	//delete record from product varient table
	function delete_mycart_product($id){

		$url=api_url."/cart/delete/$id";
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE"); 
		$response = curl_exec($ch); 
		curl_close($ch); 
		$data = json_decode($response,true);
		return $data;
		
		
	}


	// inserting order record into order table.
	function orders_details($product_id,$product_price,$product_type,$product_quantity,$product_date,$userid,$paymentmethod,$orderfrom)
	{
			
			// define('productType',$product_type);
			// define('quantity',$product_quantity);
			// define('orderDate',$product_date);
			// define('orderFrom',$orderfrom);
			// define('productID',$product_id);
			// define('paymentMethod',$paymentmethod);
			// define('userID',$userid);
			// define('amount',$product_price);
			
			//Set a user agent. This basically tells the server that we are using Chrome ;)
			//define('USER_AGENT', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.2309.372 Safari/537.36');
			
			//Login action URL. Sometimes, this is the same URL as the login form.
			//define('LOGIN_ACTION_URL', api_url."/orders");
			
			//An associative array that represents the required form fields.
			$postValues = array(
			'ProductType' => $product_type,
			'Quantity' => $product_quantity,
			'OrderDate' => $product_date,
			'OrderFrom' => $orderfrom,
			'ProductID' => $product_id,
			'PaymentMethod' => $paymentmethod,
			'UserID' => $userid,
			'Amount' => $product_price
			);
			
			//Initiate cURL.
			$curl = curl_init();
			
			//Set the URL where we want to send our POST request.
			curl_setopt($curl, CURLOPT_URL, api_url."/orders");
			
			//Tell cURL that we want to carry out a POST request.
			curl_setopt($curl, CURLOPT_POST, true);
			
			//Set our post fields / date (from the array above).
			curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($postValues));
			
			//We don't want any HTTPS errors.
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			
			//Sets the user agent. Some websites will attempt to block bot user agents.
			//Hence the reason I gave it a Chrome user agent.
			curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.2309.372 Safari/537.36');
			
			//Tells cURL to return the output once the request has been executed.
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			
			//Do we want to follow any redirects?
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, false);
			
			//Check for errors!
			if(curl_errno($curl)){
				throw new Exception("Error occured=".curl_error($curl));
			}
			
			//Use the same user agent, just in case it is used by the server for session validation.
			curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.2309.372 Safari/537.36');
			
			//We don't want any HTTPS / SSL errors.
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			
			//Execute the POST request. 
			$response = curl_exec($curl);
			$result = json_decode($response);
			return $result;
		
		}
		
	function ordersbyuserid($uid){
		$url = api_url."/orders/getbyuserid/$uid";
		$client = curl_init($url);
		curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
		$response = curl_exec($client);	
		$result = json_decode($response);
			//print_r($result);
		return $result;
		
	}

	function get_userprofile($uid){
		$url = api_url."/user/get/$uid";
		$client = curl_init($url);
		curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
		$response = curl_exec($client);	
		$result = json_decode($response);
			//print_r($result);
		return $result;
		
	}


	//checking password
		function check_old_password($admin_id,$password){
			define('id',$admin_id);
			define('password',$password);
			
			//Set a user agent. This basically tells the server that we are using Chrome ;)
			define('USER_AGENT', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.2309.372 Safari/537.36');
			
			//Login action URL. Sometimes, this is the same URL as the login form.
			define('LOGIN_ACTION_URL', api_url."/admin/checkoldpass/");
			
			//An associative array that represents the required form fields.
			$postValues = array(
			'id' => id,
			'password' => password,
			);
			
			//Initiate cURL.
			$curl = curl_init();
			
			//Set the URL where we want to send our POST request.
			curl_setopt($curl, CURLOPT_URL, LOGIN_ACTION_URL);
			
			//Tell cURL that we want to carry out a POST request.
			curl_setopt($curl, CURLOPT_POST, true);
			
			//Set our post fields / date (from the array above).
			curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($postValues));
			
			//We don't want any HTTPS errors.
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			
			//Sets the user agent. Some websites will attempt to block bot user agents.
			//Hence the reason I gave it a Chrome user agent.
			curl_setopt($curl, CURLOPT_USERAGENT, USER_AGENT);
			
			//Tells cURL to return the output once the request has been executed.
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			
			//Do we want to follow any redirects?
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, false);
			
			//Check for errors!
			if(curl_errno($curl)){
				throw new Exception("Error occured=".curl_error($curl));
			}
			
			//Use the same user agent, just in case it is used by the server for session validation.
			curl_setopt($curl, CURLOPT_USERAGENT, USER_AGENT);
			
			//We don't want any HTTPS / SSL errors.
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			
			//Execute the POST request. 
			$response = curl_exec($curl);
			$result = json_decode($response);
			return $result;
			
		}
		
		
		//changing password
		function change_password($admin_id,$newepassword){
			define('id',$admin_id);
			define('password',$newepassword);
			
			//Set a user agent. This basically tells the server that we are using Chrome ;)
			define('USER_AGENT', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.2309.372 Safari/537.36');
			
			//Login action URL. Sometimes, this is the same URL as the login form.
			define('LOGIN_ACTION_URL', api_url."/admin/changeoldpass/");
			
			//An associative array that represents the required form fields.
			$postValues = array(
			'id' => id,
			'password' => password,
			);
			
			//Initiate cURL.
			$curl = curl_init();
			
			//Set the URL where we want to send our POST request.
			curl_setopt($curl, CURLOPT_URL, LOGIN_ACTION_URL);
			
			//Tell cURL that we want to carry out a POST request.
			curl_setopt($curl, CURLOPT_POST, true);
			
			//Set our post fields / date (from the array above).
			curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($postValues));
			
			//We don't want any HTTPS errors.
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			
			//Sets the user agent. Some websites will attempt to block bot user agents.
			//Hence the reason I gave it a Chrome user agent.
			curl_setopt($curl, CURLOPT_USERAGENT, USER_AGENT);
			
			//Tells cURL to return the output once the request has been executed.
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			
			//Do we want to follow any redirects?
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, false);
			
			//Check for errors!
			if(curl_errno($curl)){
				throw new Exception("Error occured=".curl_error($curl));
			}
			
			//Use the same user agent, just in case it is used by the server for session validation.
			curl_setopt($curl, CURLOPT_USERAGENT, USER_AGENT);
			
			//We don't want any HTTPS / SSL errors.
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			
			//Execute the POST request. 
			$response = curl_exec($curl);
			$result = json_decode($response);
			return $result;
			
		}
		
		
		//Get Locations.
		function getall_locations(){
			
			$url =  api_url."/location";
			$client = curl_init($url);
			curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
			$response = curl_exec($client);		
			$result = json_decode($response);
			return $result;
			
			
		}
		
		
		//getting record from contact table.
		function getall_contactus(){
			$url = api_url."/about/getcontactus/";
			$client = curl_init($url);
			curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
			$response = curl_exec($client);		
			$result = json_decode($response);
			return $result;
			//print_r($result); 	
			
		}	
		
		
			//getting record from about_us table.
		function getall_aboutus(){
			$url = api_url."/about/getaboutus/";
			$client = curl_init($url);
			curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
			$response = curl_exec($client);		
			$result = json_decode($response);
			return $result;
			//print_r($result); 	
			
		}	
		
		
		//searching products
			//changing password
		function searching_products($location){
			define('location',$location);
			
			//Set a user agent. This basically tells the server that we are using Chrome ;)
			define('USER_AGENT', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.2309.372 Safari/537.36');
			
			//Login action URL. Sometimes, this is the same URL as the login form.
			define('LOGIN_ACTION_URL', api_url."/vendor/search/");
			
			//An associative array that represents the required form fields.
			$postValues = array(
			'location' => location,
			);
			
			//Initiate cURL.
			$curl = curl_init();
			
			//Set the URL where we want to send our POST request.
			curl_setopt($curl, CURLOPT_URL, LOGIN_ACTION_URL);
			
			//Tell cURL that we want to carry out a POST request.
			curl_setopt($curl, CURLOPT_POST, true);
			
			//Set our post fields / date (from the array above).
			curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($postValues));
			
			//We don't want any HTTPS errors.
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			
			//Sets the user agent. Some websites will attempt to block bot user agents.
			//Hence the reason I gave it a Chrome user agent.
			curl_setopt($curl, CURLOPT_USERAGENT, USER_AGENT);
			
			//Tells cURL to return the output once the request has been executed.
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			
			//Do we want to follow any redirects?
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, false);
			
			//Check for errors!
			if(curl_errno($curl)){
				throw new Exception("Error occured=".curl_error($curl));
			}
			
			//Use the same user agent, just in case it is used by the server for session validation.
			curl_setopt($curl, CURLOPT_USERAGENT, USER_AGENT);
			
			//We don't want any HTTPS / SSL errors.
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			
			//Execute the POST request. 
			$response = curl_exec($curl);
			$result = json_decode($response);
			return $result;
			
		}
		//token
		function client_token(){
		$url = api_url."/payment/client_token";
		$client = curl_init($url);
		curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
		$response = curl_exec($client);	
		return $response;
	}


	// Checkout a paymnet status for buying product 

	function payment_status($ordertotalamount,$payment_method_nonce,$orderfrom,$orderdate,$userid,$productsdetail){
		
		define('ordertotalamount',$ordertotalamount);
		define('payment_method_nonce',$payment_method_nonce);
		define('orderfrom',$orderfrom);
		define('orderdate',$orderdate);
		define('userid',$userid);
		define('productsdetail',$productsdetail);
		
		//Set a user agent. This basically tells the server that we are using Chrome ;)
		define('USER_AGENT', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.2309.372 Safari/537.36');

		//Login action URL. Sometimes, this is the same URL as the login form.
		define('LOGIN_ACTION_URL', api_url.'/payment/checkouts/');
		
		//An associative array that represents the required form fields.
		$postValues = array(
			'ordertotalamount' => ordertotalamount,
			'payment_method_nonce' => payment_method_nonce,
			'orderfrom' => orderfrom,
			'orderdate' => orderdate,
			'userid' => userid,
			'productsdetail' => productsdetail
		);


		//Initiate cURL.
		$curl = curl_init();

		//Set the URL where we want to send our POST request.
		curl_setopt($curl, CURLOPT_URL, LOGIN_ACTION_URL);

		//Tell cURL that we want to carry out a POST request.
		curl_setopt($curl, CURLOPT_POST, true);

		//Set our post fields / date (from the array above).
		curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($postValues));

		//We don't want any HTTPS errors.
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

		//Sets the user agent. Some websites will attempt to block bot user agents.
		//Hence the reason I gave it a Chrome user agent.
		curl_setopt($curl, CURLOPT_USERAGENT, USER_AGENT);

		//Tells cURL to return the output once the request has been executed.
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

		//Do we want to follow any redirects?
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, false);

		//Check for errors!
		if(curl_errno($curl)){
			throw new Exception("Error occured=".curl_error($curl));
		}

		//Use the same user agent, just in case it is used by the server for session validation.
		curl_setopt($curl, CURLOPT_USERAGENT, USER_AGENT);

		//We don't want any HTTPS / SSL errors.
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

		//Execute the POST request. 
		$response = curl_exec($curl);
		$result = json_decode($response);

		return $result;
		
	}


	?>
