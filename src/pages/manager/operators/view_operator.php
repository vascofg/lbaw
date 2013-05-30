<?php
	// initialize
    include_once('../../../common/init.php');

	if (!isLoggedInAdmin())
		redirect('');
	
	else {

		// include needed database functions
		include_once($BASE_PATH . 'database/operators.php');

		$id = $_GET['id'];

		// fetch data
		$operator = getOperator($id);

		// send data to smarty
		$smarty->assign('operator', $operator);

		// display smarty template
		$smarty->display('manager/operators/view_operator.tpl');
  
  }
?>
