<?php
	// initialize
    include_once('../../../common/init.php');

	if (!isLoggedInAdmin())
		redirect('');
	
	else {
		
		// include needed database functions
		include_once($BASE_PATH . 'database/products.php');    
		
		$name = strip_tags($_POST['name']);
		$price = strip_tags($_POST['price']);
		$quantity = strip_tags($_POST['quantity']);
		$brandid = strip_tags($_POST['brandid']);
		$description = strip_tags($_POST['description']);
		$image = "";
		if ((($_FILES["file"]["type"] == "image/gif")
			|| ($_FILES["file"]["type"] == "image/jpeg")
			|| ($_FILES["file"]["type"] == "image/jpg")
			&& ($_FILES["file"]["size"] < 1024)))
			$image = base64_encode(file_get_contents($_FILES['image']['tmp_name']));

		if(!empty($name)&&!empty($price)&&isset($quantity)&&!empty($brandid))
		{
			if($brandid=='other')
			{
				$newbrand = strip_tags($_POST['newbrand']);
				if(!empty($newbrand))
				{
					include_once($BASE_PATH . 'database/brands.php');
					$brandid = addBrand($newbrand);
				}
				else
				{
					echo "Fill new brand name";
					die;
				}
			}
			addProduct($name,$price,$quantity,$brandid,$description,$image);
		}
		else{
			echo("Fill all fields");
			die;
		}
		redirect('pages/manager/products/list_products.php');
	}
?>
