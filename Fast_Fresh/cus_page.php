<html>
<body  background="cus_page.png"
style="background-color:#91C2C6;  background-repeat: no-repeat; background-size:100% 100vh; " >
<?php
    session_start();
    
    if(isset($_POST['log_in_btn']) ){
        $_SESSION['customer_id'] = $_POST['customer_id']; $_SESSION['password'] = $_POST['password'];	
    }
    
    if(empty($_SESSION['customer_id'])||empty($_SESSION['password']) )
    {

        header("Location: ./cus_log_in.php?error=empty fields");
        exit();
    }
    
    if (isset($_POST['back']) ){
        $customer_id = $_SESSION['customer_id'];
        $passwords = $_SESSION['password'];	
    }
    else{
        $customer_id = $_SESSION['customer_id'];
        $passwords = $_SESSION['password'];  
    }
    
	
    	
	$user = 'root';
	$pass = '';
	$db = 'fast&fresh';
    //localhost or 127.0.0.1
	$db_connect = new mysqli('localhost',$user,$pass,$db) or die('unable to connect');
                                
    

    
	
    $qry="SELECT c.Customer_id , c.passwords 
FROM customers c 
WHERE c.Customer_id =".$customer_id." and c.passwords=".$passwords."";

	$res = $db_connect->query($qry) or die('bad query');
	
    if ($res->num_rows == 1 ) {
        
    }else {
        header("Location: ./cus_log_in.php?err=wrong_input");
    }
    
    
    
    $_SESSION['customer_id'] = $customer_id;	
    
    
    
    echo "<h2>Products List</h2>";
    $qry2="SELECT * FROM products WHERE 1";
    $res2 = $db_connect->query($qry2) or die('bad query');
    while($row2 = $res2->fetch_assoc()) {
        
        ini_set('display_errors',0); //to remove error
        
        echo $row2["Product_name"]."<br>";
    }


?>





<br>
<h2>To search about a product </h2>
    <form action = "cus_pro_seller_list_DB.php" method = "post" >
        
        <select name="Product_name" >
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

    
        
	    <!-- use a submite button -->
	   <input type = "submit" name="Product_btn" value = "Search"/>

    </form>






<h2>To see prev orders</h2>
    <?phh echo "prev order list"; ?>
    <!-- cus_prev_order.php -->
    <form action="cus_prev_order.php" method="post">
        
        <input type = "submit" name="prev_order" value ="Previous Orders"/>
        
    </form>
    
    
    
    
    
    
    
<br>
 <hr />
 
  <form action = "cus_log_in.php" method = "POST" >
		<input type = "submit" name = "logout" value="Log out" />
	</form>

   
    

</body>
</html> 