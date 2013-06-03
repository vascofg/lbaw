<?php

  // Check Manager Login
  function checkLoginManager($username,$password) {
    global $db;
    $stmt = $db->prepare("SELECT count(*) FROM system_manager where username = :username and password = :password");
    $stmt->execute(array($username,$password));
		$result = $stmt->fetch(PDO::FETCH_NUM);
    return ($result[0]>0);
  }

  // Check Operator Login
  function checkLoginOperator($username,$password) {
    global $db;
    $stmt = $db->prepare("SELECT pos_operatorid FROM pos_operator where username = :username and password = :password");
    $stmt->execute(array($username,$password));
		$result = $stmt->fetch(PDO::FETCH_NUM);
		if($result)
    	return ($result[0]);
    else
    	return (0);
  }

    // Get all Managers
  function getAllManagers() {
    global $db;
    $stmt = $db->prepare("SELECT system_managerid, email,fullname, username FROM system_manager ORDER BY username");
    $stmt->execute();
    return $stmt->fetchAll();
  }
  
  function getAllManagersPage($pagenr) {
    global $db;
    global $pagesize;
    $stmt = $db->prepare("SELECT system_managerid, email,fullname, username, count(*) OVER() as count FROM system_manager ORDER BY username LIMIT :pagesz OFFSET :pagenr");
    $stmt->execute(array(pagesz=>$pagesize,pagenr=>$pagesize*$pagenr));
    return $stmt->fetchAll();
  }
  
  function searchManagersPage($search, $pagenr) {
    global $db;
    global $pagesize;
    $searcharray = explode(" ",$search);
    $search = str_replace(" ","|",$search);
    $search = "(".$search.")";
    $searchwhole="^".$search."$";
    //TODO: Acentos
    //Vale mais uma match pela palavra inteira
    $stmt = $db->prepare("SELECT system_managerid, email,fullname, username, count(*) OVER() as count
         ,(case when system_manager.username ~* ? then 1 else 0 end) +
          (case when system_manager.fullname ~* ? then 1 else 0 end) +
          (case when system_manager.username ~* ? then 2 else 0 end) +
          (case when system_manager.fullname ~* ? then 2 else 0 end) as priority FROM system_manager WHERE system_manager.username ~* ? or system_manager.fullname ~* ? ORDER BY priority DESC, system_manager.username LIMIT ? OFFSET ?");
    $stmt->execute(array($search, $search,$searchwhole,$searchwhole, $search, $search, $pagesize,$pagesize*$pagenr));
    return $stmt->fetchAll();
  }
  
  function getManager($id) {
    global $db;
    $stmt = $db->prepare("SELECT system_managerid, email,fullname, picture, username FROM system_manager where system_managerid = :id");
    $stmt->execute(array(id=>$id));
    $result = $stmt->fetch();
    return ($result);
  }
  
  function deleteManager($id) {
    global $db;
    $stmt = $db->prepare("DELETE FROM system_manager WHERE system_managerid = :id");
    $stmt->execute(array(id=>$id));
    return;
  }
  
  function editManager($username,$fullname,$email,$image,$id) {
    global $db;   
    try {
      if(empty($image)){
        $stmt = $db->prepare("UPDATE system_manager SET username=:username, fullname=:fullname,email=:email WHERE system_managerid=:id");
        $stmt->execute(array(username=>$username,fullname=>$fullname,email=>$email,id=>$id));
      }
      else{
        $stmt = $db->prepare("UPDATE system_manager SET username=:username, fullname=:fullname,email=:email,picture=:picture WHERE system_managerid=:id");
        $stmt->execute(array(username=>$username,fullname=>$fullname,email=>$email,picture=>$image,id=>$id));
      }
    }
    catch (PDOException $e) {
      echo $e->getMessage();
      die;
    }
  }

  function editManagerWithPassword($username,$password,$fullname,$email,$image,$id) {
    global $db;   
    try {
      if(empty($image)){
        $stmt = $db->prepare("UPDATE system_manager SET username=:username, password=:password,fullname=:fullname,email=:email WHERE system_managerid=:id");
        $stmt->execute(array(username=>$username,password=>$password,fullname=>$fullname,email=>$email,id=>$id));
      }
      else{
        $stmt = $db->prepare("UPDATE system_manager SET username=:username, password=:password,fullname=:fullname,email=:email,picture=:picture WHERE system_managerid=:id");
        $stmt->execute(array(username=>$username,password=>$password,fullname=>$fullname,email=>$email,picture=>$image,id=>$id));
      }
    }
    catch (PDOException $e) {
      echo $e->getMessage();
      die;
    }
  }

  function registerManager($username,$password,$fullname,$email,$image) {
  	global $db;
    if(empty($image))
      $image = null;
  	try {
  		$stmt = $db->prepare("INSERT INTO system_manager (username,password,fullname,email,picture) values (:username,:password,:fullname,:email,:picture)");
  		$stmt->execute(array(username=>$username,password=>$password,fullname=>$fullname,email=>$email,picture=>$image));
  	}
  	catch (PDOException $e) {
  		if($e->getCode() == 23505)
  			echo "Duplicate email or username";
  		else
  			echo $e->getMessage();
  		die;
  	}
  	return intval($db->lastInsertId(system_manager_system_managerid_seq));
  }


?>
