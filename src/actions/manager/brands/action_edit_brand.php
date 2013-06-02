<?php
	// initialize
    include_once('../../../common/init.php');

	if (!isLoggedInAdmin())
		redirect('');
	
	else {
		
		// include needed database functions
		include_once($BASE_PATH . 'database/brands.php');    
		
		$name = strip_tags($_POST['name']);
		$id = strip_tags($_POST['id']);
		
		if(!empty($name)&&!empty($id))
		{
				editBrand($name,$id);
		}
		else{
			echo("Fill all fields");
			die;
		}
		redirect('pages/manager/products/list_products.php');
	}
?>
