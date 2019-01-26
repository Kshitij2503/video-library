<?php error_reporting(0); ?>
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
<title>Video Display
</title>
<link rel="stylesheet" href="css/styling.css" type="text/css">
</head>
<body >
<center><img src="videoheader.png" width="100%" height="250px">    
</center>
	<img src="film-animated-No-Background.gif" width="200px" height="200px" align="left">
		<img src="film-animated-No-Background.gif" width="200px" height="200px" align="right">

<CENTER>
<br>
<form id="reg45" action="search2.php" method="POST" enctype="multipart/form-data" class="modal-content animate">
<B>Search according to:</B><select id="button" name="option1" required>
<option  value="title" >Title</option>
<option  value="year_released" >Year Released</option>
</select>
<B>Search:</B> <input  type="text" name="name" id="button" placeholder="Search">
<input type="submit" name ="submit2" value="Submit1" id="butt"><br>
</form>
<style>

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
#reg45{
	
	text-align:center;
	color:#000000;
	float:center; 
	width:75%;
	font-family: arial;
	background-color:#f5f5f5;
	background-size: cover;
	opacity:1;
	border-width:5px;  
    border-left-style:dotted;
	border-right-style:dotted;
	padding: 20px 20px;
	 border-radius: 30px 30px;
	 border-right-width: thick;
	 border-left-width: thick;
	}
table {
    border-collapse: collapse;
    width: 70%;
	background-color:inherit;
	font-family: 'Lato', sans-serif;
	color: white;
}

th {
    padding: 15px;
    text-align: center;
    border-bottom: 1px solid #ddd;
}
td {
    padding: 8px;
    text-align: center;
    border-bottom: 1px solid #ddd;
}</style>

<H1 style="color:white;text-align:center">VIDEO DETAILS </H1>
<?php
$con = mysqli_connect("localhost","root","","library");
$query1="SELECT * FROM videos ";
$data=mysqli_query($con,$query1);
$total=mysqli_num_rows($data);


if($total != 0)
{?>	
	<CENTER><table id="myTable">
	<thead><tr>
		<th>S.No</th>
		<th>Video ID</th>
		<th>Video Title</th>
		<th>Year Released</th>
		<th>Buying Price</th> 
		<th>Renting Price</th> 
	</tr>
	</thead></CENTER>
	<?php $i=1;
while ($result = mysqli_fetch_assoc($data))
{ echo "<tr>
			<td>".$i."</td>
			<td>".$result['v_id']."</td>
			<td>".$result['title']."</td>
			<td>".$result['year_released']."</td>
			<td>".$result['b_price']."</td>
			<td>".$result['r_price']."</td>
			</tr>";
$i=$i+1;
		}

}
?> 
</table><br>
<a href="main1.php">Back</a>
</CENTER>
</body>
</html>
