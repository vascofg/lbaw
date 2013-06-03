<?php

  // Get all operators
  function getAllOperators() {
    global $db;
    $stmt = $db->prepare("SELECT pos_operatorid, email,fullname, username FROM pos_operator ORDER BY username");
    $stmt->execute();
    return $stmt->fetchAll();
  }
  
  function getAllOperatorsPage($pagenr) {
    global $db;
    global $pagesize;
    $stmt = $db->prepare("SELECT pos_operatorid, email,fullname, username, count(*) OVER() as count FROM pos_operator ORDER BY username LIMIT :pagesz OFFSET :pagenr");
    $stmt->execute(array(pagesz=>$pagesize,pagenr=>$pagesize*$pagenr));
    return $stmt->fetchAll();
  }
  
  function searchOperatorsPage($search, $pagenr) {
    global $db;
    global $pagesize;
    $searcharray = explode(" ",$search);
  	$search = str_replace(" ","|",$search);
  	$search = "(".$search.")";
  	$searchwhole="^".$search."$";
    //TODO: Acentos
  	//Vale mais uma match pela palavra inteira
    $stmt = $db->prepare("SELECT pos_operatorid, email,fullname, username, count(*) OVER() as count
  			 ,(case when pos_operator.username ~* ? then 1 else 0 end) +
  			  (case when pos_operator.fullname ~* ? then 1 else 0 end) +
  			  (case when pos_operator.username ~* ? then 2 else 0 end) +
				  (case when pos_operator.fullname ~* ? then 2 else 0 end) as priority FROM pos_operator WHERE pos_operator.username ~* ? or pos_operator.fullname ~* ? ORDER BY priority DESC, pos_operator.username LIMIT ? OFFSET ?");
    $stmt->execute(array($search, $search,$searchwhole,$searchwhole, $search, $search, $pagesize,$pagesize*$pagenr));
    return $stmt->fetchAll();
  }
  
  function getOperator($id) {
  	global $db;
    $stmt = $db->prepare("SELECT pos_operatorid, email,fullname, picture, username FROM pos_operator where pos_operatorid = :id");
    $stmt->execute(array(id=>$id));
    $result = $stmt->fetch();
    return ($result);
  }
  
  function deleteOperator($id) {
    global $db;
    $stmt = $db->prepare("DELETE FROM pos_operator WHERE pos_operatorid = :id");
    $stmt->execute(array(id=>$id));
    return;
  }

  function editOperatorWithPassword($username,$password,$fullname,$email,$image,$id) {
    global $db;
    
    try {
      if(empty($image)){
        $stmt = $db->prepare("UPDATE pos_operator SET username=:username,password=:password,fullname=:fullname,email=:email WHERE pos_operatorid=:id");
        $stmt->execute(array(username=>$username,password=>$password,fullname=>$fullname,email=>$email,id=>$id));
      }
      else{
        $stmt = $db->prepare("UPDATE pos_operator SET username=:username,password=:password,fullname=:fullname,email=:email,picture=:picture WHERE pos_operatorid=:id");
        $stmt->execute(array(username=>$username,password=>$password,fullname=>$fullname,email=>$email,picture=>$image,id=>$id));
      }
    }
    catch (PDOException $e) {
      echo $e->getMessage();
      die;
    }
  }

  function editOperator($username,$fullname,$email,$image,$id) {
    global $db;
    
    try {
      if(empty($image)){
        $stmt = $db->prepare("UPDATE pos_operator SET username=:username,fullname=:fullname,email=:email WHERE pos_operatorid=:id");
        $stmt->execute(array(username=>$username,fullname=>$fullname,email=>$email,id=>$id));
      }
      else{
        $stmt = $db->prepare("UPDATE pos_operator SET username=:username,fullname=:fullname,email=:email,picture=:picture WHERE pos_operatorid=:id");
        $stmt->execute(array(username=>$username,fullname=>$fullname,email=>$email,picture=>$image,id=>$id));
      }
    }
    catch (PDOException $e) {
      echo $e->getMessage();
      die;
    }
  }
  
  function register($username,$password,$fullname,$email,$image) {
  	global $db;
    if(empty($image))
      $image = null;
  	try {
  		$stmt = $db->prepare("INSERT INTO pos_operator (username,password,fullname,email,picture) values (:username,:password,:fullname,:email,:picture)");
  		$stmt->execute(array(username=>$username,password=>$password,fullname=>$fullname,email=>$email,picture=>$image));
  	}
  	catch (PDOException $e) {
  		if($e->getCode() == 23505)
  			echo "Duplicate email or username";
  		else
  			echo $e->getMessage();
  		die;
  	}
  	return intval($db->lastInsertId(pos_operator_pos_operatorid_seq));
  }
  
?>
