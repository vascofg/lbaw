<?php
	// initialize
  include_once('../../common/init.php');
  
  if (!isLoggedInOperator())
		redirect('');
		
	elseif(isset($_POST['cardnumber']))
	{
		// include needed database functions
		include_once($BASE_PATH . 'database/sales.php');
		echo getCardBalance($_POST['cardnumber']);
	}

?>
