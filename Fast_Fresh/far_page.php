<html>
<body  background="far_page.png"
style="background-color:#F2C736;  background-repeat: no-repeat; background-size:100% 100vh; " >

<?php
    session_start();
    
    if(isset($_POST['far_log_in_btn']) ){
        $_SESSION['farmers_id'] = $_POST['farmers_id']; $_SESSION['password'] = $_POST['password'];	
    }
    
    if(empty($_SESSION['farmers_id'])||empty($_SESSION['password']) )
    {

        header("Location: ./far_log_in.php?error=empty fields");
        exit();
    }
    
    if (isset($_POST['Back_to_far_page']) ){
        $farmers_id = $_SESSION['farmers_id'];
        $passwords = $_SESSION['password'];	
    }
    else{
        $farmers_id = $_SESSION['farmers_id'];
        $passwords = $_SESSION['password'];  
    }
    
	
    	
	$user = 'root';
	$pass = '';
	$db = 'fast&fresh';
    //localhost or 127.0.0.1
	$db_connect = new mysqli('localhost',$user,$pass,$db) or die('unable to connect');
                                
    

    
	
    $qry="SELECT farmers_id , passwords 
FROM farmers 
WHERE farmers_id =".$farmers_id." and passwords='".$passwords."'";

	$res = $db_connect->query($qry) or die('bad query');
	
    if ($res->num_rows == 1 ) {
    }else {
        header("Location: ./far_log_in.php?err=".$count);
    }
    
    
    
    $_SESSION['farmers_id'] = $farmers_id;	
    
    
    
    echo "<h3>selling Products</h3>";
    $qry2="SELECT fp.farmers_product_id , fp.Available_KG ,fp.price_taka_per_KG, p.Product_name
from farmers_product fp join products p
on fp.product_id=p.product_id WHERE fp.farmers_id=".$farmers_id."";
    
    $res2 = $db_connect->query($qry2) or die('bad query');
    
    echo "<h4>product id --- product name --- availble (kg) --- price in taka per kg "."<br>"."</h4>";
    while($row2 = $res2->fetch_assoc()) {
        
        ini_set('display_errors',0); //to remove error
        
        echo " >>      ".$row2["farmers_product_id"]."  --- ".$row2["Product_name"]." --- ".$row2["Available_KG"]." kg --- ".$row2["price_taka_per_KG"]." taka<br>";
    }


?>





<br>
<h2>To update a product available </h2>
    <form action = "far_pro_update.php" method = "post" >
        Your_Product_ID: <input type = "text" name = "farmers_product_id"/> 
        Available KG: <input type = "text" name = "Available_KG"/> 
        price taka per KG: <input type = "text" name = "price_taka_per_KG"/> 
        
        <!-- use a submite button -->
	   <input type = "submit" name="update_btn" value = "Update"/>
      

    </form>



<br>
<h2>To ADD a NEW product </h2>
    <form action = "far_pro_add.php" method = "post" >
        
        
   
                <select name="product_id" >
	<option value="Ankher_Rosh">Ankher_Rosh</option>
	<option value="Broad_Beans">Broad_Beans</option>
	<option value="Cottage_cheese">Cottage_cheese</option>
	<option value="Fresh_Cream">Fresh_Cream</option>
	<option value="Jackfruit">Jackfruit</option>
	<option value="Khejur_Gurr">Khejur_Gurr</option>
	<option value="Lychee">Lychee</option>
	<option value="Mango_Amropali">Mango_Amropali</option>
	<option value="Mango_Ashwini">Mango_Ashwini</option>
	<option value="Mango_Fozli">Mango_Fozli</option>
	<option value="Mango_Gobindobhog">Mango_Gobindobhog</option>
	<option value="Mango_Gopalbhog">Mango_Gopalbhog</option>
	<option value="Mango_Guti">Mango_Guti</option>
	<option value="Mango_Haribhanga">Mango_Haribhanga</option>
	<option value="Mango_HimShagor">Mango_HimShagor</option>
	<option value="Mango_Lengra">Mango_Lengra</option>
	<option value="Meuwa">Meuwa</option>
	<option value="Mishti_Doi">Mishti_Doi</option>
	<option value="Mushroom">Mushroom</option>
	<option value="Roshmalai">Roshmalai</option>
	
</select>

        Available KG: <input type = "text" name = "Available_KG"/> 
        price taka per KG: <input type = "text" name = "price_taka_per_KG"/> 
        
        <!-- use a submite button -->
	   <input type = "submit" name="add_btn" value = "Add"/>
     
      <?php
        

        $user = 'root';
	$pass = '';
	$db = 'fast&fresh';
    //localhost or 127.0.0.1
	$db_connect = new mysqli('localhost',$user,$pass,$db) or die('unable to connect');
                                
        
        
        echo "<h3>Products List</h3>";
        $qry2="SELECT * FROM products WHERE 1";
        $res2 = $db_connect->query($qry2) or die('bad query');
        
        echo "Product name"."<br>"."<br>";
        while($row2 = $res2->fetch_assoc()) {
        
            ini_set('display_errors',0); //to remove error
        
            echo $row2["Product_name"]."<br>";
        }   
     ?>   
	    

    </form>



<h2>To see products sold</h2>
    <?phh echo "prev order list"; ?>
    <!-- cus_prev_order.php -->
    <form action="far_prev_sold.php" method="post">
        
        <input type = "submit" name="prev_order" value ="Previous Orders"/>
        
    </form>
    




<h2>To see recommended location for a product</h2>
    <?phh echo "recommended location list"; ?>
    <!-- cus_prev_order.php -->
    <form action="far_rec_loc_for_pro.php" method="post">
       
        
     
        <select name="product_name" >
	<option value="Ankher_Rosh">Ankher_Rosh</option>
	<option value="Broad_Beans">Broad_Beans</option>
	<option value="Cottage_cheese">Cottage_cheese</option>
	<option value="Fresh_Cream">Fresh_Cream</option>
	<option value="Jackfruit">Jackfruit</option>
	<option value="Khejur_Gurr">Khejur_Gurr</option>
	<option value="Lychee">Lychee</option>
	<option value="Mango_Amropali">Mango_Amropali</option>
	<option value="Mango_Ashwini">Mango_Ashwini</option>
	<option value="Mango_Fozli">Mango_Fozli</option>
	<option value="Mango_Gobindobhog">Mango_Gobindobhog</option>
	<option value="Mango_Gopalbhog">Mango_Gopalbhog</option>
	<option value="Mango_Guti">Mango_Guti</option>
	<option value="Mango_Haribhanga">Mango_Haribhanga</option>
	<option value="Mango_HimShagor">Mango_HimShagor</option>
	<option value="Mango_Lengra">Mango_Lengra</option>
	<option value="Meuwa">Meuwa</option>
	<option value="Mishti_Doi">Mishti_Doi</option>
	<option value="Mushroom">Mushroom</option>
	<option value="Roshmalai">Roshmalai</option>
	
</select>

        
        <input type = "submit" name="loc_btn" value ="go"/>
        
        
    </form>
    
    
 
    
    
    
    
<br><br>
 <hr />
 
  <form action = "far_log_in.php" method = "POST" >
		<input type = "submit" name = "logout" value="Log out" />
	</form>

   
    

</body>
</html> 