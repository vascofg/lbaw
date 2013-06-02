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
		$id = $_POST['id'];
		$image = "";
		if (($_FILES["image"]["type"] == "image/jpeg" || $_FILES["image"]["type"] == "image/jpg") && $_FILES["image"]["size"] < $maxfilesize)
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
				editProduct($name,$price,$quantity,$brandid,$description,$image,$id);
		}
		else{
			echo("Fill all fields");
			die;
		}
		redirect('pages/manager/products/list_products.php');
	}
?>
