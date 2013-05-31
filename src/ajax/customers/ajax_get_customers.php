<?php
	// initialize
  include_once('../../common/init.php');
  
  if (!isLoggedInAdmin())
		redirect('');
		
	else {
 
		// include needed database functions
		include_once($BASE_PATH . 'database/customers.php');
		$search = strip_tags($_REQUEST['search']);
    
    if(isset($_REQUEST['pagenr']))
    {
    	$pagenr = $_REQUEST['pagenr'];
    	if($search)
      	$customers = searchCustomersPage($search,$pagenr);
      else
      	$customers = getAllCustomersPage($pagenr);
      echo json_encode(array("numpages"=>ceil($customers[0]['count']/$pagesize),"customers"=>$customers));
    }
    else
    {
    	if(!$search)
     		$customers = getAllCustomers();
     	echo json_encode(array("customers"=>$customers));
    }
	}

?>
