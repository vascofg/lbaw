<?php
	// initialize
    include_once('../../../common/init.php');

    // include needed database functions
    include_once($BASE_PATH . 'database/auth.php');    

	$username = $_POST['username'];
	$password = $_POST['password'];
	
	if(checkLoginOperator($username,md5($password))) //md5 hash to be replaced by something a bit more secure
	{
		$_SESSION['operator']['username']=$username;
		redirect('pages/operator');
	}
	else
		echo "Wrong login data";
?>
