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
        $cid = $_POST['cid'];
        $vid = $_POST['vid'];
		$date1 = $_POST['date1'];
		$date2 = $_POST['date2'];
        $con = mysqli_connect("localhost","root","","library");
			$que="select r_price from videos where v_id=$vid";
			$res=mysqli_query($con,$que);
			$res1 = mysqli_fetch_assoc($res);
			$price1=$res1['r_price'];
			echo"$price1";
        $query = "insert into rented_videos (v_id,c_id,r_price,date_of_purchase,date_of_return) values ('$vid','$cid','$price1','$date1','$date2')";

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
input[type=number] {
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
RENTED Video Entry
</title>
<link rel="stylesheet" href="css/styling.css" type="text/css">
</head>
<body>
 <center><img src="videoheader.png" width="100%" height="250px">    
</center>
	<img src="film-animated-No-Background.gif" width="200px" height="200px" align="left">
		<img src="film-animated-No-Background.gif" width="200px" height="200px" align="right">

<div class="simple-form">
<form id='reg1' action="rented_e.php" method="POST" enctype="multipart/form-data" class="modal-content animate">
<h1>
RENTED VIDEO ENTRY
</H1> 
<B>Customer ID:</B><br> <input type="text" name="cid" id="button" placeholder="CUSTOMER ID" required><br><br>
<B>Video ID:</B> <br><input type="text" name="vid" id="button" placeholder="VIDEO ID" required><br><br>
<B>Date of purchase:</B><br> <input type="date" name="date1" id="button" placeholder="DATE" required><br><br>
<B>Date of return:</B><br> <input type="date" name="date2" id="button" placeholder="DATE" required><br><br>
<a href="main1.php" id="butt">Back</a>
<input type="submit" name ="submit" value="Submit" id="butt">
</form>
</div>
</body>
</html>