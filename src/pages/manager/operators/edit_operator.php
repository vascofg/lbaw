<?php
	// initialize
  include_once('../../../common/init.php');

  if (!isLoggedInAdmin())
	redirect('');

  else {
	include_once($BASE_PATH . 'database/operators.php');
	// fetch data
	$operator = getOperator($_GET['id']);

	// send data to smarty
	$smarty->assign('operator', $operator);
	
	// display smarty template
	$smarty->display('manager/operators/form_edit_operator.tpl');
  }
?>
