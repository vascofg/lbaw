<?php
	// initialize
    include_once('../../../common/init.php');

	if (!isLoggedInAdmin())
		redirect('');
	
	else{
		
		// include needed database functions
		include_once($BASE_PATH . 'database/auth.php');    

		$id = $_GET['id'];
		if(!empty($id))
		  deleteManager($id);
		redirect('pages/manager/managers/list_managers.php');
	}
?>
