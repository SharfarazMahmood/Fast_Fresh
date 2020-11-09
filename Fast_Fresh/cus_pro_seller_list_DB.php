<!DOCTYPE html>
<html>
<body  background="cus_page.png"
style="background-color:#91C2C6;  background-repeat: no-repeat; background-size:100% 100vh; " >

<h2>Currently sellers available</h2>

<?php
    session_start(); 
    
    if(isset($_POST['Product_btn']))
	{
		$Product_name = $_POST['Product_name'];
		$_SESSION["Product_name"] = $Product_name;
		//echo "<br>".$Product_name."<br>";
	}
    
    if(empty( $_SESSION["Product_name"] ) && !isset($_POST['back']) )// 
	{
        header("Location: ./cus_page.php?enter_Product_name=");
		
	}
    
    if(isset($_POST['back']))
	{
		$Product_name = $_SESSION["Product_name"];
	}
    else
    {
        $Product_name = $_SESSION["Product_name"] ;
    }


	$user = 'root';
	$pass = '';
	$db = 'fast&fresh';
	
    //localhost or 127.0.0.1
	$db_connect = new mysqli('localhost',$user,$pass,$db) or die('unable to connect');
                                
    echo $Product_name."<br>";
    
    $qry="select *
    from (SELECT fp.farmers_product_id as fpid1, fp.product_id , f.first_name , f.last_name ,f.contact_no , (SELECT round(avg(o.rating),2) as rate from orders o WHERE o.farmers_product_id= fp.farmers_product_id ) as avg_rate 
    from farmers_product fp JOIN farmers f join products p 
    on fp.farmers_id=f.Farmers_id 
    and fp.product_id=p.Product_id 
    where p.Product_name='".$Product_name."') as total_rate join farmers_product ffpp 
    on total_rate.fpid1 = ffpp.farmers_product_id
    where 1";
	//echo $qry." "."<br>";

	   $res = $db_connect->query($qry) or die('bad query');
    
        //echo $res->num_rows."<br>";
      echo "<h3>ID --- seller --- avaiable(kg) --- price in taka per KG</h3>"."<br>";
            while($row = $res->fetch_assoc()) {
        
                ini_set('display_errors',0); //to remove error.....
        
            echo $row["farmers_product_id"]." --- ".$row["first_name"]." ".$row["last_name"]." --- ".$row["contact_no"]." --- ".$row["Available_KG"]." KG --- ".$row["price_taka_per_KG"]." taka --- ".$row["avg_rate"]." "."<br>";
        };

?>

<br /><br />
<h2>To order </h2> <br />
    <?phh echo "prev purchase list"; ?>
    <!-- cus_prev_order.php -->
    <form action="cus_purchase.php" method="post">

        Enter id: <input type = "text" name = "farmers_product_id"/>
        <p><br></p>
    ammount: <input type = "text" name = "ammount"/>
        <p><br></p>   
         

        <input type = "submit" name="order" value ="Order"/>
    </form>
 

<br><br>
<hr />
 
  <form action = "cus_page.php" method = "POST" >
		<input type = "submit" name = "Back_to cus_page" value="<Back" />
	</form> 
      
</body>
</html>























