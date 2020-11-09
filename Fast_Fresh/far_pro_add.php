<!DOCTYPE html>
<html>
<body  background="far_page.png"
style="background-color:#F2C736;  background-repeat: no-repeat; background-size:100% 100vh; " >

   <?php 
    session_start();
    
    if(isset($_POST['add_btn']) ){
        
  
        //$_SESSION['farmers_id'] = $_SESSION['farmers_id'];
        
        $_SESSION['product_id'] = $_POST['product_id'];
        $_SESSION['Available_KG'] = $_POST['Available_KG'];
        $_SESSION['price_taka_per_KG']= $_POST['price_taka_per_KG'];
        
       //echo   $_SESSION['farmers_id'].", ".$_SESSION['product_id'].", ".$_SESSION['Available_KG']." , ".$_SESSION['price_taka_per_KG'];
        
        $farmers_id = $_SESSION['farmers_id'];
        $product_id=$_SESSION['product_id'];
        $Available_KG = $_SESSION['Available_KG'];
        $price_taka_per_KG = $_SESSION['price_taka_per_KG'];

        
    }
    else{
        
        $farmers_id = $_SESSION['farmers_id'];
        $product_id=$_SESSION['product_id'];
        $Available_KG = $_SESSION['Available_KG'];
        $price_taka_per_KG = $_SESSION['price_taka_per_KG'];
        
    }
    
    
    
    //echo   $farmers_id.", ".$product_id.", ".$Available_KG." , ".$price_taka_per_KG;
    
    
    
    if(empty($_SESSION['product_id']) || empty($_SESSION['Available_KG'])  || empty($_SESSION['price_taka_per_KG']) )
	{
		
		header("Location: ./far_page.php?empty_fields=");
        exit();
	}

    
    
    
    
    
    $user = 'root';
	$pass = '';
	$db = 'fast&fresh';
    //localhost or 127.0.0.1
	$db_connect = new mysqli('localhost',$user,$pass,$db) or die('unable to connect');
    

    
    
    
    
    
    // check if valid product id
        $qry="SELECT product_id , product_name
from products
WHERE product_name='".$product_id."'";
    
    $res = $db_connect->query($qry) or die('bad qry2');
    
    if($res->num_rows != 1 ){
        header("Location: ./far_page.php?invalid_product_id=");
        exit();
    }else{
        $row = $res->fetch_assoc();
        //echo " ID is ".$row["district_id"]."<br>";
        $product_id = $row["product_id"];
        
      //echo  "ID is   ".$district_id ;
    }
    
    
    
    
    
    
    $qry="INSERT INTO `farmers_product` (`farmers_product_id`, `product_id`, `farmers_id`, `Available_KG`, `price_taka_per_KG`) VALUES (farmers_product_id, '".$product_id."', ".$farmers_id.", ".$Available_KG.",".$price_taka_per_KG." )"  ;
   
    //echo "<br>".$Available_KG"   "$price_taka_per_KG."  ".'<br>';
    $res = $db_connect->query($qry) or die('bad product add');
	
    echo "<br>"."Successful new product Add".'<br>';
    
    ?>
 
    <br /><br />
         

<br><br>
<hr />
     
 <form action = "far_page.php" method = "POST" >
		<input type = "submit" name = "Back_to_far_page" value="<Back" />
	</form> 
	
	      
          
</body>
</html>























