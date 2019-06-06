<?php 
require_once("m_foodshop.php");

class ValidationShop
{
	
	public function __construct()
	{

	}
     function test_input($data) {
         $data = trim($data);
         $data = stripslashes($data);
         $data = htmlspecialchars($data);
         return $data;
    }

	function checkNameShop($nameShop){
        //check name
        if (empty($nameShop)){
            return "Vui lòng nhập tên cửa hàng!";
        }
        // else{  
        //     $mUser = new User();
        //     $had = $m_foodshop->queryNameShop($userName);

        //     if($had != 0){
        //         return "Tài khoản đã tồn tại!";
        //     }
        // }
        return null;
    }
    function checkType($shop_type){
        if (empty($shop_type)){
            return "Vui lòng nhập loại cửa hàng!";
        }
        return null;
    }
    function checkAddress($address){
        if (empty($address)){
            return "Vui lòng nhập địa chỉ!";
        }else{
            $m_foodshop = new FoodShop();
            $had = $m_foodshop->queryAddress($address);
            if($had == 1){
                return "Địa chỉ đã tồn tại!";
            }
        }
        return null;
    }
    function checkTime($openTime){
        if (empty($openTime)){
            return "Vui lòng nhập thời gian mở cửa!";
        }
        return null;
    }
	//hacker insert js vafo database
   
}
?>