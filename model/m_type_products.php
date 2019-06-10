<?php 
	require_once('connect/database.php');
	/**
	 * summary
	 */
	class TypeProduct extends Database
	{
	    /**
	     * summary
	     */
	    public function __construct()
	    {
	        parent::__construct();
	    }
	    function queryTypeId($shop_id){
	    	$conn = parent::getConn();
			$stmt = null;
			try {
				$stmt = $conn->prepare("select id, shop_id, types from types_products where shop_id = :shop_id");
				$stmt->bindValue(":shop_id",$shop_id);
				$stmt->execute();
			} catch (PDOException $e) {
				echo 'queryTypeId failed: '.$e.getMessage();
			}
			
			if( $stmt->rowCount() == 0 ){ //không có
				$stmt = null;
				$conn = null;
				return 0;
		    }else{ //có
		    	$data = $stmt -> fetchAll( PDO::FETCH_ASSOC );
		    	$stmt = null;
		    	$conn = null;
		    	return $data;
		    }
	    }
	    function queryProductByTypeId($idType){
	    	$conn = parent::getConn();
			$stmt = null;
			try {
				$stmt = $conn->prepare("select id, name, price, img from products where type_id = :type_id");
				$stmt->bindValue(":type_id",$idType);
				$stmt->execute();
			} catch (PDOException $e) {
				echo 'queryProductByTypeId failed: '.$e.getMessage();
			}
			
			if( $stmt->rowCount() == 0 ){ //không có
				$stmt = null;
				$conn = null;
				return 0;
		    }else{ //có
		    	$data = $stmt -> fetchAll( PDO::FETCH_ASSOC );
		    	$stmt = null;
		    	$conn = null;
		    	return $data;
		    }
	    }
	}

 ?>