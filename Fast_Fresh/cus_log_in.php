<html>

<head> 
<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body  background="cus_reg_log.png"
style="background-color:#91C2C6;  background-repeat: no-repeat; background-size:100% 100vh; " >


<div class="header">
	<h1>log in as customer </h1>
</div>


    <form class="content" action = "cus_page.php" method = "post" >
 
	 <div class="input-group">
            <label>Customer id</label>
            <input type = "text" name = "customer_id" />
        </div>
     
	 <div class="input-group">
            <label>Password</label>
            <input type = "password" name = "password" />
        </div>
		
    
	<div class="input-group">
  	  <button type="submit" class="btn" name="log_in_btn">Log in</button>
  	</div>

	
	
	
    </form>
   
    
 <br><br>

 
  <form class="content_2" action = "Home_Page.php" method = "POST" >
		<input type = "submit" name = "Back" value="<Home" />
	</form> 

</body>
</html>