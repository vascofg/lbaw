<?php
	// initialize
  include_once('../../common/init.php');
  
  if (!isLoggedInAdmin())
		redirect('');
		
	else {
 
		// include needed database functions
		include_once($BASE_PATH . 'database/auth.php');
		$search = strip_tags($_REQUEST['search']);
    
    if(isset($_REQUEST['pagenr']))
    {
    	$pagenr = $_REQUEST['pagenr'];
    	if($search)
      	$managers = searchManagersPage($search,$pagenr);
      else
      	$managers = getAllManagersPage($pagenr);
      echo json_encode(array("numpages"=>ceil($managers[0]['count']/$pagesize),"managers"=>$managers));
    }
    else
    {
    	if(!$search)
     		$managers = getAllManagers();
     	echo json_encode(array("managers"=>$managers));
    }
	}

?>
