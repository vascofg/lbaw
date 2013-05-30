<?php

  // Get all products
  function getAllBrands() {
    global $db;
    $stmt = $db->prepare("SELECT * FROM brand ORDER BY brand.name");
    $stmt->execute();
    return $stmt->fetchAll();
  }
  
  function getAllBrandsUsage() {
    global $db;
    $stmt = $db->prepare("SELECT brand.brandid, brand.name, count(product.brandid) as usage FROM product RIGHT JOIN brand on (brand.brandid = product.brandid) GROUP BY brand.name, brand.brandid ORDER BY count(product.brandid)=0 DESC, brand.name");
    $stmt->execute();
    return $stmt->fetchAll();
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
