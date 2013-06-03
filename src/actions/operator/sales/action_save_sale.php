<?php
	// initialize
  include_once('../../../common/init.php');
  
  if (!isLoggedInOperator())
		redirect('');
		
	elseif(isset($_POST['products']))
	{
		// include needed database functions
		include_once($BASE_PATH . 'database/sales.php');
		saveSale($_POST['products'], $_POST['customercard_number'], $_POST['customercard_value'], $_POST['card_number'], $_POST['card_value'], $_POST['cash_value']);
		redirect("pages/operator");
	}

?>
