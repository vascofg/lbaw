<?php
	// initialize
  include_once('../../common/init.php');
  
  if (!isLoggedInAdmin())
		redirect('');
		
	else {
 
		// include needed database functions
		include_once($BASE_PATH . 'database/operators.php');
		$search = strip_tags($_POST['search']);
    
    if(isset($_POST['pagenr']))
    {
    	$pagenr = $_POST['pagenr'];
    	if($search)
      	$operators = searchOperatorsPage($search,$pagenr);
      else
      	$operators = getAllOperatorsPage($pagenr);
      echo json_encode(array("numpages"=>ceil($operators[0]['count']/$pagesize),"operators"=>$operators));
    }
    else
    {
    	if(!$search)
     		$operators = getAllOperators();
     	echo json_encode(array("operators"=>$operators));
    }
	}

?>
