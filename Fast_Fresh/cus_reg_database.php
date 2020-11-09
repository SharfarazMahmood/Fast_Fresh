<html>
<body  background="cus_page.png"
style="background-color:#91C2C6;  background-repeat: no-repeat; background-size:100% 100vh; " >

   <?php
    $first_Name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $contact_no =$_POST['contact_no'];
    $passwords = $_POST['password'];  
    $house_no = $_POST['house_no'];
    $village_or_PO = $_POST['village/PO'];
    $post_code = $_POST['post_code'];
    $upazila = $_POST['upazila'];
	

	$user = 'root';
	$pass = '';
	$db = 'fast&fresh';
	
	$db_connect = new mysqli('localhost',$user,$pass,$db) or die('unable to connect') ;
                                //localhost or 127.0.0.1
	//echo 'Done'."<br>";
    //echo 'from- '.$db.'<br>';


    if(empty($first_Name)||empty($last_name)||empty($contact_no)||empty($passwords)||empty($house_no)||empty($village_or_PO)||empty($post_code)||empty($upazila))
    {

        header("Location: ./cus_reg.php?error=empty fields");
        exit();
    }
    
    // check uniq contact no
    $qry = "select Customer_id from customers where  contact_no = '".$contact_no."'";
    
    $res = $db_connect->query($qry) or die('bad query');
    

    if($res->num_rows >=1 ){
        header("Location: ./cus_reg.php?error=Contact already in use");
        exit();
        
    }



    
    
	$qry = "INSERT INTO customers ( Customer_id, first_name, last_name, contact_no, passwords , house_no, village_or_PO, post_code, upazila) VALUES ( Customer_id , '".$first_Name."', '".$last_name."', '".$contact_no."', '".$passwords."', '".$house_no."', '".$village_or_PO."', ".$post_code.", '".$upazila."')";

	//echo $qry." "."<br>";

	$res = $db_connect->query($qry) or die('bad query');
    echo "Customer Signed up"."<br>";


    
    ///show new customer ID
    $qry1 = "select customer_id from customers 
    where  contact_no = '".$contact_no."'";
    
    $res1 = $db_connect->query($qry1) or die('bad query 1');

   
    $row1 = $res1->fetch_assoc();
//ini_set('display_errors',0); //to remove error....
        echo "Your ID is ".$row1["customer_id"]."<br>";
    
    
?>


<br><br>
 <hr />
 
  <form action = "Home_Page.php" method = "POST" >
		<input type = "submit" name = "Back" value="<Home" />
	</form> 

</body>
</html>
