<!DOCTYPE html>
<html>
<body  background="far_page.png"
style="background-color:#F2C736;  background-repeat: no-repeat; background-size:100% 100vh; " >

   
   <?php 
    session_start();
    
    if(isset($_POST['loc_btn']) ){
        
        $_SESSION['product_name'] = $_POST['product_name'];
        $product_name = $_SESSION['product_name'];
        
    }
    else{
        $product_name= $_SESSION['product_name'];
    }
    
    if( empty($_SESSION['product_name']) ) {
        header("Location: ./far_page.php?empty_fields=");
        exit();
    }
    
        
	$user = 'root';
	$pass = '';
	$db = 'fast&fresh';
	
    //localhost or 127.0.0.1
	$db_connect = new mysqli('localhost',$user,$pass,$db) or die('unable to connect');
    
    
    
    $qry="select *
from orders o join farmers_product fp join products p 
on o.farmers_product_id=fp.farmers_product_id 
and fp.product_id= p.Product_id
where p.Product_name='".$product_name."'";
    
    $res = $db_connect->query($qry) or die('bad query_0');
    
    
    
    if($res->num_rows <1){
            
        echo "this product hasn't been rated yet <br>";
        
    }else{
        
         /*
         $qry="SELECT f.first_name,round(avg(o.rating),2) rate 
from orders o join farmers_product fp join products p join farmers f 
on o.farmers_product_id = fp.farmers_product_id 
and fp.product_id=p.product_id 
and fp.farmers_id=f.Farmers_id 

WHERE p.Product_name ='".$product_name."' 
GROUP by f.Farmers_id ,f.first_name ";
*/
        
        
         $qry="SELECT d.District_name,round(avg(o.rating),2) rate 
from orders o join farmers_product fp join products p join farmers f join districts d 
on o.farmers_product_id = fp.farmers_product_id 
and fp.product_id=p.product_id 
and fp.farmers_id=f.Farmers_id 
and f.district_id=d.District_id 
WHERE p.Product_name ='".$product_name."' 
GROUP by d.District_id , d.District_name ";
    
    $res = $db_connect->query($qry) or die('bad query');
	echo "<br>".'<br>';
    
    
    echo "<h3>District --- rate </h3>";
	while($row = $res->fetch_assoc()) {
        
        ini_set('display_errors', 0); //to remove error.....check explanation
        
        echo $row["District_name"]." --- ".$row["rate"]."<br>";
    };
    }
    
    
    
    
    
 
   

    
    ?>
    <!-- cus_prev_order.php -->
         
<br><br>
<hr />   
 <form action = "far_page.php" method = "POST" >
		<input type = "submit" name = "Back_to_cus_pro_seller_list" value="<Back" />
	</form> 
	
	                
</body>
</html>















