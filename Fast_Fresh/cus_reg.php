<html>
<head> 
<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body  background="cus_reg_log.png"
style="background-color:#91C2C6;  background-repeat: no-repeat; background-size:100% 100vh; " >

<div class="header">
    <h1> customer registration </h1>
</div>


    <form class="content" action="cus_reg_database.php" method="post">
	

        <div class="input-group">
            <label>First name</label>
            <input type = "text" name = "first_name" />
        </div>


        <div class="input-group">
            <label>Last name</label>
            <input type = "text" name = "last_name" />    
        </div>


        <div class="input-group">
            <label>Contact no</label>
            <input type = "text" name = "contact_no" placeholder="must be 11 digits"/>
        </div>

        <div class="input-group">
            <label>Password</label>
            <input type = "password" name = "password" />
        </div>


        <div class="input-group">
            <label>House no</label>
            <input type = "text" name = "house_no" />
        </div>


        <div class="input-group">
            <label>Village or PO</label>
            <input type = "text" name ="village/PO"/>    
        </div>

        <div class="input-group">
            <label>Post Code</label>
            <input type = "text" name = "post code" />   
        </div>


        <div class="input-group">
            <label>Upozila</label>
            <input type = "text" name = "upazila" />   
        </div>

       
       <div class="input-group">
  	  <button type="submit" class="btn" name="sign_up_btn">Register</button>
  	</div>

    </form>
    



 <br><br>

 
  <form class="content_2" action = "Home_Page.php" method = "POST" >
		<input type = "submit" name = "Back" value="<Home" />
	</form> 

</body>
</html>