<html>

<head> 
<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body  background="far_reg_log.jpg"
style="background-color:#F2C736;  background-repeat: no-repeat; background-size:100% 100vh; " >

<div class="header">
    <h1> Farmer registration </h1>
</div>
    <form class="content" action="far_reg_database.php" method="post">
	
	
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
		
		<label>Distric</label>
		<select name="district_id" >
	<option value="Bagerhat">Bagerhat</option>
	<option value="Bandarban">Bandarban</option>
	<option value="Barguna">Barguna</option>
	<option value="Barisal">Barisal</option>
	<option value="Bhola">Bhola</option>
	<option value="Bogra">Bogra</option>
	<option value="Brahmanbaria">Brahmanbaria</option>
	<option value="Chandpur">Chandpur</option>
	<option value="Chapainawabganj">Chapainawabganj</option>
	<option value="Chittagong">Chittagong</option>
	<option value="Chuadanga">Chuadanga</option>
	<option value="Comilla">Comilla</option>
	<option value="Coxs Bazar">Coxs Bazar</option>
	<option value="Dhaka">Dhaka</option>
	<option value="Dinajpur">Dinajpur</option>
	<option value="Faridpur">Faridpur</option>
	<option value="Feni">Feni</option>
	<option value="Gaibandha">Gaibandha</option>
	<option value="Gopalganj">Gopaganj</option>
	<option value="Habiganj">Habiganj</option>
	<option value="Jamalpur">Jamalpur</option>
	<option value="Jessore">Jessore</option>
	<option value="Jhalokati">Jhalokati</option>
	<option value="Jhenaidah">Jhenaidah</option>
	<option value="Joypurhat">Joypurhat</option>
	<option value="Khagrachhari">Khagrachhari</option>
	<option value="Khulna">Khulna</option>
	<option value="Kushtia">Kushtia</option>
	<option value="Lakshmipur">Lakshmipur</option>
	<option value="Lalmonirhat">Lalmonirhat</option>
	<option value="Madaripur">Madaripur</option>
	<option value="Magura">Magura</option>
	<option value="Manikganj">Manikganj</option>
	<option value="Meherpur">Meherpur</option>
	<option value="Mouluvibazar">Mouluvibazar</option>
	<option value="Munshiganj">Munshiganj</option>
	<option value="Naogaon">Naogaon</option>
	<option value="Narail">Narail</option>
	<option value="Narayanganj">Narayanganj</option>
	<option value="Narsingdi">Narsingdi</option>
	<option value="Natore">Natore</option>
	<option value="Netrakona">Netrokona</option>
	<option value="Noakhali">Noakhali</option>
	<option value="Pabna">Pabna</option>
	<option value="Panchagarh">Panchagarh</option>
	<option value="Patuakhali">Patuakhali</option>
	<option value="Pirojpur">Pirojpur</option>
	<option value="Rajbari">Rajbari</option>
	<option value="Rajbari">Rajbari</option>
	<option value="Rajshahi">Rajshahi</option>
	<option value="Rangamati">Rangamati</option>
	<option value="Rangpur">Rangpur</option>
	<option value="Satkhira">Satkhira</option>
	<option value="Shariatpur">Shariatpur</option>
	<option value="Sirajgonj">Sirajgonj</option>
	<option value="Sylhet">Sylhet</option>
	<option value="Tangail">Tangail</option>
	<option value="Thakurgaon">Thakurgaon</option>
</select>


   
   <div class="input-group">
  	  <button type="submit" class="btn" name="far_sign_up_btn">Register</button>
  	</div>
   
   
    </form>
    
 <br><br>

  <form class="content_2" action = "Home_Page.php" method = "POST" >
		<input type = "submit" name = "Back" value="<Home" />
	</form> 

</body>
</html>