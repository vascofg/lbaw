<?php
	// initialize
    include_once('../../../common/init.php');

	if (!isLoggedInAdmin())
		redirect('');
	
	else {
		
		// include needed database functions
		include_once($BASE_PATH . 'database/operators.php');    

		$username = strip_tags($_POST['username']);
		$password = strip_tags($_POST['password']);
		$fullname = strip_tags($_POST['fullname']);
		$email = strip_tags($_POST['email']);
		$image = "";
		if (($_FILES["image"]["type"] == "image/jpeg" || $_FILES["image"]["type"] == "image/jpg") && $_FILES["image"]["size"] < 1048576)
			$image = base64_encode(file_get_contents($_FILES['image']['tmp_name']));
		
		if(!empty($username)&&!empty($password)&&!empty($fullname)&&!empty($email))
		{
			register($username,md5($password),$fullname,$email,$image); //md5 hash to be replaced by something a bit more secure
			redirect('pages/manager/operators/list_operators.php');

		}
		else
			echo "Fill all fields";
	}
?>
