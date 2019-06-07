<?php 
	require_once('connect/database.php');
	/**
	 * summary
	 */
	class Product extends Database
	{
	    /**
	     * summary
	     */
	    public function __construct()
	    {
	    	parent::__construct();
	    }

	    function queryProduct($id){
			$conn = parent::getConn();
			$stmt = null;
			try {
				$stmt = $conn->prepare("SELECT types_products.* , products.* FROM types_products, products WHERE types_products.id = products.type_id AND types_products.shop_id =:id");
				// $stmt = $conn->prepare("SELECT * FROM types_products Where shop_id=:id");
				$stmt->bindValue(":id",$id);
				$stmt->execute();
			} catch (PDOException $e) {
				echo 'queryProduct failed: '.$e.getMessage();
			}
			$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
			if( $stmt->rowCount() == 0 ){ //không có
				$stmt=null;
				$conn=null;
				return $data;
		    }else{ //có
		    	$stmt=null;
		    	$conn=null;
		    	return $data;
		    }
		}
	}
?>