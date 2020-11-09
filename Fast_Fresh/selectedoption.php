<html>

<head> 
<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
<div class="header">
    <h1> Farmer registration </h1>
</div>
    <form class="content" action="selectedoption_DB.php" method="post">
	
    <select name="district_id" >
    <option value="Bagerhat">Bagerhat</option>
    <option value="Bandarban">Bandarban</option>
    
  </select>
  <br><br>
    
   <input type = "submit" name ="far_sign_up_btn" value="Sign up" />
    </form>
    
    
    

    
    
    <?php 
    $user = 'root';
	$pass = '';
	$db = 'fast&fresh';
    //localhost or 127.0.0.1
	$db_connect = new mysqli('localhost',$user,$pass,$db) or die('unable to connect');
    
    
    $qry="SELECT district_id,district_name FROM `districts` " ;
    
    $res = $db_connect->query($qry) or die('bad query');
	echo "<br><br><h5> Dristict name --- id </h5>";
    echo "<p></p>";
	while($row = $res->fetch_assoc()) {
        
        ini_set('display_errors', 0); //to remove error.....check explanation
        
        echo $row["district_name"]."---".$row["district_id"]."<br>";
    };
   
    
    ?>
    
    
    
    
    

 <br><br>
<hr />
 
  <form class="content_2" action = "Home_Page.php" method = "POST" >
		<input type = "submit" name = "Back" value="<Home" />
	</form> 

</body>
</html>