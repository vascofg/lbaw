<?php
	// initialize
  include_once('../../common/init.php');
  
  if (!isLoggedInAdmin())
		redirect('');
		
	else {
 
		// include needed database functions
		include_once($BASE_PATH . 'database/products.php');
		$search = strip_tags($_POST['search']);
    $pagenr = $_POST['pagenr'];
    $pagesz = $_POST['pagesz'];
    
    if($search)
      $products = searchProductPage($search,$pagenr);
    else //if parameter empty use getAllProducts (more efficient)
      $products = getAllProductsPage($pagenr);
		
		echo json_encode(array("numpages"=>ceil($products[0]['count']/$pagesize),"products"=>$products));
	}

?>
