<?php

  // Get all customers
  function getAllCustomers() {
    global $db;
    $stmt = $db->prepare("SELECT frequent_customerid, email, fullname, username FROM frequent_customer");
    $stmt->execute();
    return $stmt->fetchAll();
  }
  
  function getAllCustomersPage($pagenr) {
    global $db;
    global $pagesize;
    $stmt = $db->prepare("SELECT frequent_customerid, email,fullname, username, count(*) OVER() as count FROM frequent_customer LIMIT :pagesz OFFSET :pagenr");
    $stmt->execute(array(pagesz=>$pagesize,pagenr=>$pagesize*$pagenr));
    return $stmt->fetchAll();
  }
  
  function searchCustomersPage($search, $pagenr) {
    global $db;
    global $pagesize;
    $searcharray = explode(" ",$search);
  	$search = str_replace(" ","|",$search);
  	$search = "(".$search.")";
  	$searchwhole="^".$search."$";
    //TODO: Acentos
  	//Vale mais uma match pela palavra inteira
    $stmt = $db->prepare("SELECT frequent_customerid, email,fullname, username, count(*) OVER() as count
  			 ,(case when frequent_customer.username ~* ? then 1 else 0 end) +
  			  (case when frequent_customer.fullname ~* ? then 1 else 0 end) +
  			  (case when frequent_customer.username ~* ? then 2 else 0 end) +
				  (case when frequent_customer.fullname ~* ? then 2 else 0 end) as priority FROM frequent_customer WHERE frequent_customer.username ~* ? or frequent_customer.fullname ~* ? ORDER BY priority DESC, frequent_customer.username LIMIT ? OFFSET ?");
    $stmt->execute(array($search, $search,$searchwhole,$searchwhole, $search, $search, $pagesize,$pagesize*$pagenr));
    return $stmt->fetchAll();
  }
  
  function getCustomer($id) {
  	global $db;
    $stmt = $db->prepare("SELECT frequent_customerid, email,fullname, picture, username FROM frequent_customer where frequent_customerid = :id");
    $stmt->execute(array(id=>$id));
    $result = $stmt->fetch();
    return ($result);
  }
  
  function deleteCustomer($id) {
    global $db;
    $stmt = $db->prepare("DELETE FROM frequent_customer WHERE frequent_customerid = :id");
    $stmt->execute(array(id=>$id));
    return;
  }
  
  function register($username,$password,$fullname,$email) {
  	global $db;
  	try {
  		$stmt = $db->prepare("INSERT INTO frequent_customer (username,password,fullname,email) values (:username,:password,:fullname,:email)");
  		$stmt->execute(array($username,$password,$fullname,$email));
  	}
  	catch (PDOException $e) {
  		if($e->getCode() == 23505)
  			echo "Duplicate email or username";
  		else
  			echo $e->getMessage();
  		die;
  	}
  	return intval($db->lastInsertId(frequent_customer_frequent_customerid_seq));
  }
  
?>
