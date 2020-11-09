<!DOCTYPE html>
<html>
<body  background="cus_page.png"
style="background-color:#91C2C6;  background-repeat: no-repeat; background-size:100% 100vh; " >
   
   <?php 
    session_start();
    
    if(isset($_POST['rate_btn']) ){
        

        $_SESSION['order_id'] = $_POST['order_id'];
        $_SESSION['rating'] = $_POST['rating'];
        
        $customer_id = $_SESSION['customer_id'];
        $order_id = $_SESSION['order_id'];
        $rating = $_SESSION['rating'];
        
        //echo   $customer_id.", ".$order_id.", ".$rating;
        
    }
    else{
        $customer_id = $_SESSION['customer_id'];
        $order_id = $_SESSION['order_id'];
        $rating = $_SESSION['rating'];
    }
    
    if(empty($_SESSION['order_id']) || empty($_SESSION['rating']))
	{
		
		header("Location: ./cus_prev_order.php?rmpty_fields=");
        exit();
	}
    
    if($rating<0 || $rating >10 ){ 
        //rating ammount check
        header("Location: ./cus_prev_order.php?bad_rating=");
        exit();
    }
    
    
    
    
    
    $user = 'root';
	$pass = '';
	$db = 'fast&fresh';
    //localhost or 127.0.0.1
	$db_connect = new mysqli('localhost',$user,$pass,$db) or die('unable to connect');
    
    
    
    
    
    
    // check if valid order id
        $qry="SELECT order_id , rating
from orders
WHERE order_id=".$order_id."";
    
    $res = $db_connect->query($qry) or die('bad qry');
    
    if($res->num_rows != 1 ){
        header("Location: ./cus_prev_order.php?enter_product_id=");
        exit();
    }
    
   
	
    
 
    $qry="UPDATE orders  o SET o.rating = ".$rating." WHERE o.Order_id=".$order_id."
	and o.customer_id=".$customer_id."";
    
    $res = $db_connect->query($qry) or die('bad rate update');
	
    echo "<br>"."Successfull rating , Thank you".'<br>';
    
    ?>
 
    <br /><br />
         

<br><br>
<hr />
     
 <form action = "cus_prev_order.php" method = "POST" >
		<input type = "submit" name = "Back_to_cus_pro_seller_list" value="<Back" />
	</form> 
	
	      
          
</body>
</html>























