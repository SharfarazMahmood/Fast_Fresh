<!DOCTYPE html>
<html>
<body  background="far_page.png"
style="background-color:#F2C736;  background-repeat: no-repeat; background-size:100% 100vh; " >

   <?php 
    session_start();
    
    echo "prev order list"; 
    
    if(isset($_POST['prev_order']) ){
        
        $farmers_id = $_SESSION['farmers_id'];
    }
    else{
        $farmers_id = $_SESSION['farmers_id'];
    }
    
        
	$user = 'root';
	$pass = '';
	$db = 'fast&fresh';
	
    //localhost or 127.0.0.1
	$db_connect = new mysqli('localhost',$user,$pass,$db) or die('unable to connect');
    
 
    $qry="SELECT o.Order_id , p.Product_name , o.amount_KG , o.rating , c.contact_no , c.first_name , c.last_name

from orders o join  farmers_product fp join  farmers f join products p join customers c
on o.farmers_product_id=fp.farmers_product_id 
and o.customer_id=c.Customer_id
and fp.farmers_id=f.Farmers_id
and fp.product_id=p.Product_id

where f.Farmers_id=".$farmers_id."";
    
    $res = $db_connect->query($qry) or die('bad query_33');
	echo "<br>";
    
    
     echo "<h4>Order id --- product name --- sold ammount (kg) --- customer name --- contact no "."<br>"."</h4>";
    
	while($row = $res->fetch_assoc()) {
        
        ini_set('display_errors', 0); //to remove error.....check explanation
        
        echo "Order id:".$row["Order_id"]." --- ".$row["Product_name"]." --- ".$row["amount_KG"]."kg --- ".$row["rating"]." --- ".$row["first_name"]." ".$row["last_name"]." --- ".$row["contact_no"]."<br>";
    };

    
    ?>

    
    
    <br /><br />

<hr />   
 <form action = "far_page.php" method = "POST" >
		<input type = "submit" name = "Back_to_far_page" value="<Back" />
	</form> 
	
	                
</body>
</html>















