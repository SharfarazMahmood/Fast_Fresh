<!DOCTYPE html>
<html>
<body  background="far_page.png"
style="background-color:#F2C736;  background-repeat: no-repeat; background-size:100% 100vh; " >
  
   <?php 
    session_start();
    
    if(isset($_POST['update_btn']) ){
        
  
        $_SESSION['farmers_product_id'] = $_POST['farmers_product_id'];
        $_SESSION['Available_KG'] = $_POST['Available_KG'];
        $_SESSION['price_taka_per_KG']= $_POST['price_taka_per_KG'];
        
        $farmers_product_id = $_SESSION['farmers_product_id'];
        $Available_KG = $_SESSION['Available_KG'];
        $price_taka_per_KG = $_SESSION['price_taka_per_KG'];
        
        //echo   $customer_id.", ".$order_id.", ".$rating;
        
    }
    else{
        
        $farmers_product_id = $_SESSION['farmers_product_id'];
        $Available_KG = $_SESSION['Available_KG'];
        $price_taka_per_KG = $_SESSION['price_taka_per_KG'];
        
    }
    
    if(empty($_SESSION['farmers_product_id']) || empty($_SESSION['Available_KG'])  || empty($_SESSION['price_taka_per_KG']) )
	{
		
		header("Location: ./far_page.php?empty_fields=");
        exit();
	}

    
    $user = 'root';
	$pass = '';
	$db = 'fast&fresh';
    //localhost or 127.0.0.1
	$db_connect = new mysqli('localhost',$user,$pass,$db) or die('unable to connect');
    

    
    
    // check if valid  far product id
        $qry="SELECT farmers_product_id 
from farmers_product
WHERE farmers_product_id=".$farmers_product_id."";
    
    $res = $db_connect->query($qry) or die('bad qry');
    
    if($res->num_rows != 1 ){
        header("Location: ./cus_prev_order.php?invalid_product_id=");
        exit();
    }
    
   
    
	$qry="UPDATE farmers_product   SET Available_KG = ".$Available_KG." , price_taka_per_KG=".$price_taka_per_KG."
WHERE farmers_product_id=".$farmers_product_id."";
    
    //echo "<br>".$Available_KG"   "$price_taka_per_KG."  ".'<br>';
    $res = $db_connect->query($qry) or die('bad product update');
	
    echo "<br>"."Successful product info update".'<br>';
    
    ?>
 
    <br /><br />
         

<br><br>
<hr />
     
 <form action = "far_page.php" method = "POST" >
		<input type = "submit" name = "Back_to_far_page" value="<Back" />
	</form> 
	
	      
          
</body>
</html>























