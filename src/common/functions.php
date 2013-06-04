<?php
	//Define function to strip tags from an array
	//From http://www.hotscripts.com/forums/php/52598-strip-tags-within-array.html#post172197
	function strip_tags_recursive( $str, $allowable_tags = NULL )
	{
		  if ( is_array( $str ) )
		  {
		      $str = array_map( 'strip_tags_recursive', $str, array_fill( 0, count( $str ), $allowable_tags ) );
		  }
		  else
		  {
		      $str = strip_tags( $str, $allowable_tags );
		  }
		  return $str;
	} 

	//Define function to check login status
	function isLoggedInAdmin() {
		return isset($_SESSION['admin']['username']);
	}

  function isLoggedInOperator() {
		return isset($_SESSION['operator']['username']);
	}
	
	function isLoggedInCustomer() {
		return isset($_SESSION['customer']['username']);
	}
	
	//Define redirect funtion
	function redirect($page) {
		global $BASE_URL;
		header('Location: '.$BASE_URL.$page);
	}
  
  $pagesize=12; //Constant - Number of elements of each page
  $maxfilesize=1048576; //Constant - Picture max size (in bytes)
?>
