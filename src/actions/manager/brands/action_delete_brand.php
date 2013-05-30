<?php
	// initialize
    include_once('../../../common/init.php');

	if (!isLoggedInAdmin())
		redirect('');
	
	else{
		
		// include needed database functions
		include_once($BASE_PATH . 'database/brands.php');    

		$id = $_GET['id'];
		if(!empty($id))
		  deleteBrand($id);
		redirect('pages/manager/brands/list_brands.php');
	}
?>
