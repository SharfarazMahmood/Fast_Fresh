<!DOCTYPE html>
<html>
<body  background="cus_page.png"
style="background-color:#91C2C6;  background-repeat: no-repeat; background-size:100% 100vh; " >
   
   <?php 
    session_start();
    
    echo "prev order list"; 
    
    if(isset($_POST['prev_order']) ){
        
        $customer_id = $_SESSION['customer_id'];
    }
    else{
        $customer_id = $_SESSION['customer_id'];
    }
    
        
	$user = 'root';
	$pass = '';
	$db = 'fast&fresh';
	
    //localhost or 127.0.0.1
	$db_connect = new mysqli('localhost',$user,$pass,$db) or die('unable to connect');
    
 
    $qry="SELECT o.Order_id , f.first_name,f.last_name, f.contact_no,p.product_name as product_name, fp.price_taka_per_KG , o.amount_KG, (o.amount_KG * fp.price_taka_per_KG) total_price ,o.rating from orders o join farmers_product fp join farmers f join products p on o.farmers_product_id=fp.farmers_product_id and fp.farmers_id = f.Farmers_id and fp.product_id=p.Product_id WHERE o.customer_id=".$customer_id."";
    
    $res = $db_connect->query($qry) or die('bad query');
	echo "<br>".'<br>';
    
    
    echo "<h4>Order id ---- Farmer name --- product name ---contact no --- bought ammount (kg) --- total price --- rate "."<br>"."</h4>";
    
	while($row = $res->fetch_assoc()) {
        
        ini_set('display_errors', 0); //to remove error.....check explanation
        
        echo "Order id:".$row["Order_id"]." --- ".$row["first_name"]." ".$row["last_name"]." --- ".$row["product_name"]." --- ".$row["contact_no"]." --- ".$row["amount_KG"]." KG --- ".$row["total_price"]." Taka ----- ".$row["rating"]."<br>";
    };

    
    ?>
    <!-- cus_prev_order.php -->
    
    
    
    <br /><br />
<h2>To rate an previous order </h2> <br />

    <form action="cus_rate_order.php" method="post">

        Enter order id: <input type = "text" name = "order_id"/>
        <p><br></p>
    rate: <input type = "text" name = "rating"/>out of 10
        <p><br></p>   
         
        <input type = "submit" name="rate_btn" value ="rate_order"/>
    </form>

    
                  
<br><br>
<hr />   
 <form action = "cus_page.php" method = "POST" >
		<input type = "submit" name = "Back_to_cus_pro_seller_list" value="<Back" />
	</form> 
	
	                
</body>
</html>















