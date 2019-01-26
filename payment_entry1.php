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
Payment
</title>
<link rel="stylesheet" href="css/styling.css" type="text/css">
</head>
<body>
 <center><img src="videoheader.png" width="100%" height="250px">    
</center>
	<img src="film-animated-No-Background.gif" width="200px" height="200px" align="left">
		<img src="film-animated-No-Background.gif" width="200px" height="200px" align="right">

<div class="simple-form" >
<form id='reg1' action="payment_entry1.php" method="POST" enctype="multipart/form-data" class="modal-content animate">
<h1>
CHECK PAYMENT
</H1> 
<B>Video ID:</B><br> <input type="text" name="vid" id="button" placeholder="VIDEO ID" required><br><br>
<a href="main1.php" id="button">Back</a>
<input type="submit" name ="submit1" value="Check Price" id="butt" onclick="document.getElementById('id01').style.display='block'" style="width:auto";>

</form>

<form id='reg1' action="payment_entry1.php" method="POST" enctype="multipart/form-data" class="modal-content animate">
<h1>
PAYMENT ENTRY
</H1> 
<B>Customer ID:</B><br> <input type="text" name="cid" id="button" placeholder="CUSTOMER ID" required><br><br>
<B>Video ID:</B><br> <input type="text" name="vid" id="button" placeholder="VIDEO ID" required><br><br>
<B>Date of Payment:</B> <br><input type="date" name="date1" id="button" placeholder="DATE" required><br><br>
<B>Payment Mode	:</B> <br> <select id="button" name="option1" required>
<option  value="Cash" >Cash</option>
<option  value="Credit Card">Credit Card</option>
<option  value="Debit Card">Debit Card</option>
</select><br><br><br>
<a href="main1.php" id="button">Back</a>
<input type="submit" name ="submit2" value="Make Payment" id="butt">
</form>

</div>
<br>
<h1 style="color:white;text-align:center"><?php 
    if(isset($_POST['submit1']))
    {
        $vid = $_POST['vid'];
		 $con = mysqli_connect("localhost","root","","library");
			$que="select b_price from videos where v_id=$vid";
			$res=mysqli_query($con,$que);
			$res1 = mysqli_fetch_assoc($res);
			$price1=$res1['b_price'];
			if($price1==NULL)
			echo"INVAILD VIDEO ID";
		else
			echo " Amount to be paid is $price1";	
			}
    
?>
</h1>


<h1 style="color:white;text-align:center"><?php 
    if(isset($_POST['submit2']))
    {
        $cid = $_POST['cid'];
        $vid = $_POST['vid'];
		$date1 = $_POST['date1'];
		$option1 = $_POST['option1'];
        $con = mysqli_connect("localhost","root","","library");
			$que="select b_price from videos where v_id=$vid";
			$res=mysqli_query($con,$que);
			$res1 = mysqli_fetch_assoc($res);
			$price1=$res1['b_price'];
			
			 $query = "insert into payment (v_id,c_id,price,date,payment_mode) values ('$vid','$cid','$price1','$date1','$option1')";

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
</h1>


</body>
</html>
