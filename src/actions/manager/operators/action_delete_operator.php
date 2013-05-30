<?php
	// initialize
    include_once('../../../common/init.php');

	if (!isLoggedInAdmin())
		redirect('');
	
	else{
		
		// include needed database functions
		include_once($BASE_PATH . 'database/operators.php');    

		$id = $_GET['id'];
		if(!empty($id))
		  deleteOperator($id);
		redirect('pages/manager/operators/list_operators.php');
	}
?>
