<html>

<head> 
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body  background="far_reg_log.jpg"
style="background-color:#F2C736;  background-repeat: no-repeat; background-size:100% 100vh; " >

<div class="header">
	<h1>log in as Farmer </h1>
</div>

    <form class="content" action = "far_page.php" method = "post" >

	
	<div class="input-group">
            <label>Farmer id</label>
            <input type = "text" name = "farmers_id" />
        </div>
     
	 <div class="input-group">
            <label>Password</label>
            <input type = "password" name = "password" />
        </div>
		
    
	<div class="input-group">
  	  <button type="submit" class="btn" name="far_log_in_btn">Log in</button>
  	</div>


	
    </form>
   
    
 <br><br>

 
  <form class="content_2" action = "Home_Page.php" method = "POST" >
		<input type = "submit" name = "Back" value="<Home" />
	</form> 

</body>
</html>