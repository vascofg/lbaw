<?php

  // Get all brands
  function getAllBrands() {
    global $db;
    $stmt = $db->prepare("SELECT * FROM brand ORDER BY brand.name");
    $stmt->execute();
    return $stmt->fetchAll();
  }

    // Get a brand
  function getBrand($id) {
    global $db;
    $stmt = $db->prepare("SELECT * FROM brand WHERE brandid=:id");
    $stmt->execute(array(id=>$id));
    return $stmt->fetch();
  }

  function editBrand($name, $id) {
    global $db;
    try{
        $stmt = $db->prepare("UPDATE brand SET name=:name WHERE brandid=:id");
        $stmt->execute(array(name=>$name,id=>$id));
    }
    catch (PDOException $e) {
      echo $e->getMessage();
      die;
    }
  }

  function getAllBrandsUsage() {
    global $db;
    $stmt = $db->prepare("SELECT brand.brandid, brand.name, count(product.brandid) as usage FROM product RIGHT JOIN brand on (brand.brandid = product.brandid) GROUP BY brand.name, brand.brandid ORDER BY count(product.brandid)=0 DESC, brand.name");
    $stmt->execute();
    return $stmt->fetchAll();
  }
  
  function getAllBrandsUsagePage($pagenr) {
    global $db;
    global $pagesize;
    $stmt = $db->prepare("SELECT brand.brandid, brand.name, count(product.brandid) as usage, count(*) OVER() AS count FROM product RIGHT JOIN brand on (brand.brandid = product.brandid) GROUP BY brand.name, brand.brandid ORDER BY count(product.brandid)=0 DESC, brand.name LIMIT :pagesz OFFSET :pagenr");
    $stmt->execute(array(pagesz=>$pagesize,pagenr=>$pagesize*$pagenr));
    return $stmt->fetchAll();
  }
  
  function searchBrandsUsagePage($search, $pagenr) {
  	global $db;
    global $pagesize;
  	$searcharray = explode(" ",$search);
  	$search = str_replace(" ","|",$search);
  	$search = "(".$search.")";
  	$searchwhole="^".$search."$";
    //TODO: Acentos
  	//Vale mais uma match pela palavra inteira
  	$stmt = $db->prepare("
  	SELECT brand.brandid, brand.name, count(product.brandid) as usage, count(*) OVER() as count
				  ,(case when brand.name ~* ? then 1 else 0 end) +
				  (case when brand.name ~* ? then 2 else 0 end) as priority FROM product RIGHT JOIN brand on (brand.brandid = product.brandid) where brand.name ~* ? GROUP BY brand.name, brand.brandid ORDER BY priority DESC, brand.name LIMIT ? OFFSET ?");
  	$stmt->execute(array($search,$searchwhole,$search,$pagesize,$pagesize*$pagenr));
  	return ($stmt->fetchAll());
  }
  
  function addBrand($name) {
	global $db;
	try {
		$stmt = $db->prepare("INSERT INTO brand (name) values (:name)");
		$stmt->execute(array(name=>$name));
	}
	catch (PDOException $e) {
		if($e->getCode() == 23505)
			echo "Duplicate brand name";
		else
			echo $e->getMessage();
		die;
	}
	return intval($db->lastInsertId(brand_brandid_seq));
  }
  
  function deleteBrand($id) {
    global $db;
	try {
		$stmt = $db->prepare("DELETE FROM brand WHERE brandid = :id");
		$stmt->execute(array(id=>$id));
	}
	catch (PDOException $e) {
		if($e->getCode() == 23503)
			echo "Brand is in use";
		else
			echo $e->getMessage();
		die;
	}
    return;
  }

?>
