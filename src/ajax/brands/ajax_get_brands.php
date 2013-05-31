<?php
	// initialize
  include_once('../../common/init.php');
  
  if (!isLoggedInAdmin())
		redirect('');
		
	else {
 
		// include needed database functions
		include_once($BASE_PATH . 'database/brands.php');
		$search = strip_tags($_POST['search']);
    
    if(isset($_POST['pagenr']))
    {
    	$pagenr = $_POST['pagenr'];
    	if($search)
      	$brands = searchBrandsUsagePage($search,$pagenr);
      else
      	$brands = getAllBrandsUsagePage($pagenr);
      echo json_encode(array("numpages"=>ceil($brands[0]['count']/$pagesize),"brands"=>$brands));
    }
    else
    {
    	if(!$search)
     		$brands = getAllBrandsUsage();
     	echo json_encode(array("brands"=>$brands));
    }
	}

?>
