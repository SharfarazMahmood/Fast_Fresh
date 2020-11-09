<!DOCTYPE html>
<html>
<body  background="cus_page.png"
style="background-color:#91C2C6;  background-repeat: no-repeat; background-size:100% 100vh; " >

<h2>Purchase</h2>

<?php
    session_start();
  
    if(isset($_POST['order']) ){
        $_SESSION['farmers_product_id'] = $_POST['farmers_product_id']; 
        $_SESSION['ammount'] = $_POST['ammount'];
        //$_SESSION['customer_id'] = $_SESSION['customer_id'];
        
        $farmers_product_id = $_SESSION['farmers_product_id'];
        $ammount = $_SESSION['ammount'];
        $customer_id = $_SESSION['customer_id'];
    }else{
        $farmers_product_id = $_SESSION['farmers_product_id'];
        $ammount = $_SESSION['ammount'];
        $customer_id = $_SESSION['customer_id'];
    }
    
    if(empty($_SESSION['farmers_product_id']) || empty($_SESSION['ammount']))
	{
		
		header("Location: ./cus_pro_seller_list_DB.php?enter_product_id=");
        
	}
	// problem solving
    
    
    
	
    
    //echo $customer_id;
    
    $user = 'root';
	$pass = '';
	$db = 'fast&fresh';
	
    //localhost or 127.0.0.1
	$db_connect = new mysqli('localhost',$user,$pass,$db) or die('unable to connect');
    
    ///check if order is ok
    $qry="SELECT farmers_product_id , Available_KG
from farmers_product 
WHERE farmers_product_id=".$farmers_product_id."";
    
    $res = $db_connect->query($qry) or die('bad qry');
    
    if($res->num_rows != 1 ){
        header("Location: ./cus_pro_seller_list_DB.php?enter_product_id=");
    }else {
        $row = $res->fetch_assoc();
        if( $ammount > $row["Available_KG"] ){
            header("Location: ./cus_pro_seller_list_DB.php?enter_product_id=");
        }
    }
    
        
      //echo   $customer_id.", ".$farmers_product_id.", ".$ammount;
        
        
        ////when order ok---
    $qry="INSERT INTO `orders` (`Order_id`, `customer_id`, `farmers_product_id`, `amount_KG`, `rating`) VALUES (Order_id, ".$customer_id.", ".$farmers_product_id.", ".$ammount.", NUll)";
    
    
    $res = $db_connect->query($qry) or die('bad insert');
    
    $qry="UPDATE farmers_product  fp
    SET fp.Available_KG = (fp.Available_KG - ".$ammount.")
    WHERE fp.farmers_product_id=".$farmers_product_id."
    ";
    
    
    $res = $db_connect->query($qry) or die('bad update');
    
    
    echo "purchase successful"."<br>";

?>
          
          
<br><br>
<hr />
 
  <form action = "cus_page.php" method = "POST" >
		<input type = "submit" name = "Back" value="<Back" />
	</form> 

          
</body>
</html>























