<?php 
	session_start();
	if(!isset($_SESSION['user']))
	{
		header("location:login.php");
		session_destroy();
	}
	
	if(isset($_SESSION['timeout']))
	{
		if($_SESSION['timeout'] + 300 < time())
		{
			echo "<script>alert('Session Timed Out');window.location.href = 'login.php';</script>";
			session_destroy();
		}
	}
?>


<?php 
    if(isset($_POST['submit']))
    {
        $name = $_POST['name'];
        $dob = $_POST['dob'];
        $address = $_POST['address'];
		$phone = $_POST['phone'];
        $con = mysqli_connect("localhost","root","","library");

        $query = "insert into customer (c_name,dob,address,phone_no) values ('$name','$dob','$address','$phone')";

        $result = mysqli_query($con, $query);

        if($result==1)
        {       

        echo "Inserted successfully";
        
        }
        else {       

        echo "Insertion Failed";

		}
		}
    
?>
<html>
<head>

<style>
input[type=text] {
  width: 250px;
  -webkit-transition: width .35s ease-in-out;
  transition: width .35s ease-in-out;
}
input[type=text]:focus {
  width: 400px;
}
input[type=integer] {
  width: 250px;
  -webkit-transition: width .35s ease-in-out;
  transition: width .35s ease-in-out;
}
input[type=number]:focus {
  width: 400px;
}

a:link {
    color: green;
    background-color: transparent;
    text-decoration: none;
}
a:visited {
    color: green;
    background-color: transparent;
    text-decoration: none;
}
a:hover {
    color: red;
    background-color: transparent;
    text-decoration: underline;
}
a:active {
    color: purple;
    background-color: transparent;
    text-decoration: underline;
}
.animate {
    -webkit-animation: animatezoom 0.6s;
    animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
    from {-webkit-transform: scale(0)} 
    to {-webkit-transform: scale(1)}
}
    
@keyframes animatezoom {
    from {transform: scale(0)} 
    to {transform: scale(1)}
}
</style>
<title>
Data Entry
</title>
<link rel="stylesheet" href="css/styling.css" type="text/css">
</head>
<body> <center><img src="videoheader.png" width="100%" height="250px">    
</center>
	<img src="film-animated-No-Background.gif" width="200px" height="200px" align="left">
		<img src="film-animated-No-Background.gif" width="200px" height="200px" align="right">

<div class="simple-form">
<form id='reg1' action="customer_entry.php" method="POST" enctype="multipart/form-data" class="modal-content animate">
<h1>
CUSTOMER ENTRY
</H1> 
<B>Customer Name:</B><br> <input type="text" name="name" id="button" placeholder="Name" required><br>
<B>DOB:</B><br> <input type="date" name="dob" id="button" placeholder="DOB" required><br>
<B>Phone Number:</B><br> <input type="text" name="phone" id="button" placeholder="PHONE NUMBER"required maxlength="10"><br>
<B>Address:</B><br><textarea name="address"  rows="3" cols="25" placeholder="ADDRESS" id="button" required></textarea><br>
<a href="main1.php" id="butt">Back</a>
<input type="submit" name ="submit" value="Submit" id="butt">
</form>
</div>
</body>
</html>

