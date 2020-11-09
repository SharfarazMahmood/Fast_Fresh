<html>
 <body  background="far_page.jpg" 
style="background-color:#F2C736;  background-repeat: no-repeat; background-size:100% 100vh; " >
  
   <?php

    $first_Name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $contact_no =$_POST['contact_no'];
    $passwords = $_POST['password'];  
    $village_or_PO = $_POST['village/PO'];
    $post_code = $_POST['post_code'];
    $upazila = $_POST['upazila'];
    $district_id = $_POST['district_id'];
	


    if(empty($first_Name)||empty($last_name)||empty($contact_no)||empty($passwords)||empty($village_or_PO)||empty($post_code)||empty($upazila) || empty($district_id) )
    {

        header("Location: ./far_reg.php?error=empty fields");
        exit();
    }


    $user = 'root';
	$pass = '';
	$db = 'fast&fresh';
	
	$db_connect = new mysqli('localhost',$user,$pass,$db) or die('unable to connect') ;
                                //localhost or 127.0.0.1

///contect no check
    $qry = "select farmers_id from farmers where  contact_no = '".$contact_no."'";
    
    $res = $db_connect->query($qry) or die('bad query');
    

    if($res->num_rows >=1 ){
        header("Location: ./far_reg.php?error=Contact already in use");
        exit();
        
    }  
      
////check distric

    $qry="SELECT district_id,district_name FROM `districts` where district_name='".$district_id."' " ;
    
$res = $db_connect->query($qry) or die('bad qry');
    
    if($res->num_rows != 1 ){
        header("Location: ./far_reg.php?wrong_Idistrict_id=");
        exit();
    }else {
        $row = $res->fetch_assoc();
        //echo " ID is ".$row["district_id"]."<br>";
        $district_id = $row["district_id"];
        
      //echo  "ID is   ".$district_id ;
      
    }
    
///insert

	$qry = "INSERT INTO farmers ( farmers_id, first_name, last_name, contact_no, passwords , village_or_PO, post_code, upazila , district_id) VALUES ( farmers_id , '".$first_Name."', '".$last_name."', '".$contact_no."', '".$passwords."', '".$village_or_PO."', ".$post_code.", '".$upazila."', '".$district_id."')";

	//echo $qry." "."<br>";

	$res = $db_connect->query($qry) or die('bad query');
      
    echo "Farmer Signed up"."<br>";


    $qry = "select farmers_id from farmers where first_name='".$first_Name."' and last_name ='".$last_name."' and contact_no = '".$contact_no."'";
    
    $res = $db_connect->query($qry) or die('bad query');
    
    while($row = $res->fetch_assoc()) { 
        ini_set('display_errors',0); //to remove error....
        echo "Your ID is ".$row["farmers_id"]."<br>";
    };

?>


<br><br>
 <hr />
 
  <form class="content_2" action = "Home_Page.php" method = "POST" >
		<input type = "submit" name = "Back" value="<Home" />
	</form> 

</body>
</html>
