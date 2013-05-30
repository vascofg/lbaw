<?php
	// initialize
    include_once('../../../common/init.php');

	if (!isLoggedInAdmin())
		redirect('');
	
	else{
		
		// include needed database functions
		include_once($BASE_PATH . 'database/products.php');    

		$id = $_GET['id'];
		if(!empty($id))
		  deleteProduct($id);
		redirect('pages/manager/products/list_products.php');
	}
?>
