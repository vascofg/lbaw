<?php

  // Get all products
  function getAllProducts() {
    global $db;
    $stmt = $db->prepare("SELECT product.name, product.productid, product.price, product.quantity, brand.name as brandname FROM product LEFT JOIN brand on (brand.brandid = product.brandid) ORDER BY brand.name, product.name");
    $stmt->execute();
    return $stmt->fetchAll();
  }
  
  function getAllProductsPage($pagenr) {
    global $db;
    global $pagesize;
    $stmt = $db->prepare("SELECT product.name, product.productid, product.price, product.quantity, brand.name as brandname, count(*) OVER() AS count FROM product LEFT JOIN brand on (brand.brandid = product.brandid) ORDER BY brand.name, product.name LIMIT :pagesz OFFSET :pagenr");
    $stmt->execute(array(pagesz=>$pagesize,pagenr=>$pagesize*$pagenr));
    return $stmt->fetchAll();
  }
  
  function getAllProductsPageImage($pagenr) { //get with images (for operator)
    global $db;
    global $pagesize;
    $stmt = $db->prepare("SELECT product.*, brand.name as brandname, count(*) OVER() AS count FROM product LEFT JOIN brand on (brand.brandid = product.brandid) ORDER BY brand.name, product.name LIMIT :pagesz OFFSET :pagenr");
    $stmt->execute(array(pagesz=>$pagesize,pagenr=>$pagesize*$pagenr));
    return $stmt->fetchAll();
  }
  

  function addProduct($name, $price, $quantity, $brandid, $description, $image) {
    global $db;
    if(empty($description))
      $description = null;
     if(empty($image))
      $image = null;
    try {
      $stmt = $db->prepare("INSERT INTO product (name, price, quantity, brandid, description, picture) VALUES (:name, :price, :quantity, :brandid, :description, :picture)");
      $stmt->execute(array(name=>$name,price=>$price,quantity=>$quantity,brandid=>$brandid,description=>$description,picture=>$image));
    }
    catch (PDOException $e) {
      if($e->getCode() == 23505)
        echo "Duplicate product/brand pair";
      else
        echo $e->getMessage();
      die;
    }
    return intval($db->lastInsertId(product_productid_seq));
  }

  function deleteProduct($id) {
    global $db;
    $stmt = $db->prepare("DELETE FROM product WHERE productid = :id");
    $stmt->execute(array(id=>$id));
    return;
  }
  
  function getProduct($id) {
  	global $db;
    $stmt = $db->prepare("SELECT product.*, brand.name as brandname FROM product LEFT JOIN brand on (brand.brandid = product.brandid) where productid = :id");
    $stmt->execute(array(id=>$id));
    $result = $stmt->fetch();
    return ($result);
  }
  
  function searchProduct($search) {
  	global $db;
  	$searcharray = explode(" ",$search);
  	$search = str_replace(" ","|",$search);
  	$search = "(".$search.")";
  	$searchwhole="^".$search."$";
    //TODO: Acentos
  	//Vale mais uma match pela palavra inteira
    //A marca vale mais que o produto
  	$stmt = $db->prepare("
  	SELECT product.name, product.productid, product.price, product.quantity, brand.name as brandname
				  ,(case when product.name ~* ? then 1 else 0 end) +
				  (case when brand.name ~* ? then 1 else 0 end) +
				  (case when product.name ~* ? then 2 else 0 end) +
				  (case when brand.name ~* ? then 3 else 0 end) as priority
		FROM product LEFT JOIN brand on (brand.brandid = product.brandid)
		where product.name ~* ?
		or brand.name ~* ?
		ORDER BY priority DESC, brand.name, product.name
  	");
  	
  	$stmt->execute(array($search,$search,$searchwhole,$searchwhole,$search,$search));
  	return ($stmt->fetchAll());
  }
  
  function searchProductPage($search,$pagenr) {
  	global $db;
    global $pagesize;
  	$searcharray = explode(" ",$search);
  	$search = str_replace(" ","|",$search);
  	$search = "(".$search.")";
  	$searchwhole="^".$search."$";
    //TODO: Acentos
  	//Vale mais uma match pela palavra inteira
    //A marca vale mais que o produto
  	$stmt = $db->prepare("
  	SELECT product.name, product.productid, product.price, product.quantity, brand.name as brandname
				  ,(case when product.name ~* ? then 1 else 0 end) +
				  (case when brand.name ~* ? then 1 else 0 end) +
				  (case when product.name ~* ? then 2 else 0 end) +
				  (case when brand.name ~* ? then 3 else 0 end) as priority,
          count(*) OVER() AS count
		FROM product LEFT JOIN brand on (brand.brandid = product.brandid)
		where product.name ~* ?
		or brand.name ~* ?
		ORDER BY priority DESC, brand.name, product.name
    LIMIT ? OFFSET ?
  	");
  	
  	$stmt->execute(array($search,$search,$searchwhole,$searchwhole,$search,$search,$pagesize,$pagesize*$pagenr));
  	return ($stmt->fetchAll());
  }
  
  function searchProductPageImage($search,$pagenr) {
  	global $db;
    global $pagesize;
  	$searcharray = explode(" ",$search);
  	$search = str_replace(" ","|",$search);
  	$search = "(".$search.")";
  	$searchwhole="^".$search."$";
    //TODO: Acentos
  	//Vale mais uma match pela palavra inteira
    //A marca vale mais que o produto
  	$stmt = $db->prepare("
  	SELECT product.*, brand.name as brandname
				  ,(case when product.name ~* ? then 1 else 0 end) +
				  (case when brand.name ~* ? then 1 else 0 end) +
				  (case when product.name ~* ? then 2 else 0 end) +
				  (case when brand.name ~* ? then 3 else 0 end) as priority,
          count(*) OVER() AS count
		FROM product LEFT JOIN brand on (brand.brandid = product.brandid)
		where product.name ~* ?
		or brand.name ~* ?
		ORDER BY priority DESC, brand.name, product.name
    LIMIT ? OFFSET ?
  	");
  	
  	$stmt->execute(array($search,$search,$searchwhole,$searchwhole,$search,$search,$pagesize,$pagesize*$pagenr));
  	return ($stmt->fetchAll());
  }

?>
