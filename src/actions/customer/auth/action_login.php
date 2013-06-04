<?php
	// initialize
    include_once('../../../common/init.php');

    // include needed database functions
    include_once($BASE_PATH . 'database/auth.php');    

	$username = $_POST['username'];
	$password = $_POST['password'];
	
	$userID = checkLoginCustomer($username,md5($password));
	
	if($userID>0) //md5 hash to be replaced by something a bit more secure
	{
		$_SESSION['customer']['username']=$username;
		$_SESSION['customer']['id']=$userID;
		redirect('pages/customer');
	}
	else
		echo "Wrong login data";
?>
