<?php
	// initialize
    include_once('../../../common/init.php');

	if (!isLoggedInAdmin())
		redirect('');
	
	else {
		
		// include needed database functions
		include_once($BASE_PATH . 'database/auth.php');    

		$username = strip_tags($_POST['username']);
		$password = strip_tags($_POST['password']);
		$fullname = strip_tags($_POST['fullname']);
		$email = strip_tags($_POST['email']);
		$id = $_POST['id'];
		$image = "";
		if (($_FILES["image"]["type"] == "image/jpeg" || $_FILES["image"]["type"] == "image/jpg") && $_FILES["image"]["size"] < $maxfilesize)
			$image = base64_encode(file_get_contents($_FILES['image']['tmp_name']));
		
		if(!empty($username)&&!empty($fullname)&&!empty($email))
		{
			if(empty($password))
				editManager($username,$fullname,$email,$image,$id);
			else
				editManagerWithPassword($username,md5($password),$fullname,$email,$image,$id); //md5 hash to be replaced by something a bit more secure
			redirect('pages/manager/managers/list_managers.php');
		}
		else
			echo "Fill all fields";
	}
?>
