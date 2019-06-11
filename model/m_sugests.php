<?php 
	require_once('connect/database.php');

	class Sugests extends Database{

		public function __construct()
	    {
	    	parent::__construct();
	    }

	     public function insertSugests($sugestsArr=array()){
	    	$conn = parent::getConn();
	    	$stmt = null;
	    	try {
	    		$stmt = $conn->prepare('INSERT INTO sugests(email, comment, user_id) VALUES ( N'.'?'.', N'.'?'.', ?)');
	    		$stmt->execute( $sugestsArr);
	    		$stmt=null;
	    		$conn=null;
	    		return true;
	    	}catch(PDOException $e){
	    		echo "Lỗi insert: " . $e->getMessage();
	    	}
	    	$stmt=null;
	    	$conn=null;
	    	return false;
	    }
	}
 ?>