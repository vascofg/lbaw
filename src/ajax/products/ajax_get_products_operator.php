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
      	$products = searchProductPageImage($search,$pagenr);
      else
      	$products = getAllProductsPageImage($pagenr);
      echo json_encode(array("numpages"=>ceil($products[0]['count']/$pagesize),"products"=>$products));
    }
	}

?>
