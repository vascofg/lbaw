<?php
	// initialize
  include_once('../../common/init.php');
  
  if (!isLoggedInOperator())
		redirect('');
		
	elseif(isset($_POST['products']))
	{
		// include needed database functions
		include_once($BASE_PATH . 'database/sales.php');
		saveSale($_POST['products']);
	}

?>
