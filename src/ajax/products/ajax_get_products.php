<?php
	// initialize
  include_once('../../common/init.php');
  
  if (!isLoggedInAdmin() && !isLoggedInOperator())
		redirect('');
		
	else {
 
		// include needed database functions
		include_once($BASE_PATH . 'database/products.php');
		$search = strip_tags($_POST['search']);
    
    if(isset($_POST['pagenr']))
    {
    	$pagenr = $_POST['pagenr'];
    	if($search)
      	$products = searchProductPage($search,$pagenr);
      else
      	$products = getAllProductsPage($pagenr);
      echo json_encode(array("numpages"=>ceil($products[0]['count']/$pagesize),"products"=>$products));
    }
    else //if parameter empty use getAllProducts (more efficient)
    {
    	if($search)
      	$products = searchProduct($search);
     	else
     		$products = getAllProducts();
     	echo json_encode(array("products"=>$products));
    }
	}

?>
