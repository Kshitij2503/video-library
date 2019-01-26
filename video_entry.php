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
        $title = $_POST['title'];
        $year = $_POST['year'];
		$price1 = $_POST['bprice'];
		$price2 = $_POST['rprice'];

        $con = mysqli_connect("localhost","root","","library");

        $query = "insert into videos (title,year_released,b_price,r_price) values ('$title','$year','$price1','$price2')";

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
Video Entry
</title>
<link rel="stylesheet" href="css/styling.css" type="text/css">
</head>
<body>
 <center><img src="videoheader.png" width="100%" height="250px">    
</center>
	<img src="film-animated-No-Background.gif" width="200px" height="200px" align="left">
		<img src="film-animated-No-Background.gif" width="200px" height="200px" align="right">

<div class="simple-form">
<form id='reg1' action="video_entry.php" method="POST" enctype="multipart/form-data" class="modal-content animate">
<h1>
VIDEO ENTRY
</H1> 
<B>Title:</B><br> <input type="text" name="title" id="button" placeholder="TITLE" required><br><br>
<B>YEAR:</B> <br><input type="number" name="year" id="button" placeholder="YEAR OF RELEASE" required max="2050" min="1200"><br><br>
<B>Buying Price:</B><br> <input type="text" name="bprice" id="button" placeholder="PRICE" required><br><br>
<B>Renting Price:</B><br> <input type="text" name="rprice" id="button" placeholder="PRICE" required><br><br>
<a href="main1.php" id="butt">Back</a>
<input type="submit" name ="submit" value="Submit" id="butt">
</form>
</div>
</body>
</html>