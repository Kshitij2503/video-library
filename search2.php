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

<title>
</title>
<link rel="stylesheet" href="css/styling.css" type="text/css">
</head>
<body >
<center><img src="videoheader.png" width="100%" height="250px">    
</center>
	<img src="film-animated-No-Background.gif" width="200px" height="200px" align="left">
		<img src="film-animated-No-Background.gif" width="200px" height="200px" align="right">
<style>

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
}

</style>

<h1 style="color:white;text-align:center">

<?php
	if(isset($_POST['submit1']))
    {
		$name = $_POST['name'];
		$option = $_POST['option1'];

		   	$con = mysqli_connect("localhost","root","","library");
			$query1="SELECT * FROM customer where $option ='$name'";
			$data=mysqli_query($con,$query1);
			$total=mysqli_num_rows($data);
		if($total != 0)
		{?>	
		<CENTER><table id="myTable">
		<thead><tr>
		<th>S.No</th>
		<th>Customer ID</th>
		<th>Customer Name</th>
		<th>Date of birth</th>
		<th>Age</th>
		<th>Address</th>
		<th>Phone No.</th> 
		</tr>
		</thead></CENTER>
		<?php $i=1;
		while ($result = mysqli_fetch_assoc($data))
		{ echo "<tr>
			<td>".$i."</td>
			<td>".$result['c_id']."</td>
			<td>".$result['c_name']."</td>
			<td>".$result['dob']."</td>";
			$age=$result['dob'];
			$diff = (date('Y') - date('Y',strtotime($age)));
			echo "<td>$diff</td>
			<td>".$result['address']."</td>
			<td>".$result['phone_no']."</td>
			</tr>";
			$i=$i+1;
		}
		}	
		else { echo "NO DATA FOUND"; }
		}	?> 
	</table> 

	<?php
	if(isset($_POST['submit2']))
    {
		$name = $_POST['name'];
		$option = $_POST['option1'];

		   	$con = mysqli_connect("localhost","root","","library");
			$query1="SELECT * FROM videos where $option ='$name'";
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
		else { echo "NO DATA FOUND"; }
		}	?> 
	</table> 
	
	<?php
	if(isset($_POST['submit3']))
    {
		$name = $_POST['name'];
		$option = $_POST['option1'];

		   	$con = mysqli_connect("localhost","root","","library");
			$query1="SELECT * FROM rented_videos where $option ='$name'";
			$data=mysqli_query($con,$query1);
			$total=mysqli_num_rows($data);
		if($total != 0)
{?>	
	<CENTER><table>
	<thead><tr>
		<th>S.No</th>
		<th>Video ID</th>
		<th>Customer ID</th>
		<th>PRICE</th>
		<th>DATE OF PURCHASE</th> 
		<th>DATE OF RETURN</th> 
	</tr>
	</thead></CENTER>
	<?php $i=1;
while ($result = mysqli_fetch_assoc($data))
{ echo "<tr>
			<td>".$i."</td>
			<td>".$result['v_id']."</td>
			<td>".$result['c_id']."</td>
			<td>".$result['r_price']."</td>
			<td>".$result['date_of_purchase']."</td>
			<td>".$result['date_of_return']."</td>
			</tr>";
$i=$i+1;
		}

}	
		else { echo "NO DATA FOUND"; }
		}	?> 
	</table> 
	
	<?php
	if(isset($_POST['submit4']))
    {
		$name = $_POST['name'];
		$option = $_POST['option1'];

		   	$con = mysqli_connect("localhost","root","","library");
			$query1="SELECT * FROM payment where $option ='$name'";
			$data=mysqli_query($con,$query1);
			$total=mysqli_num_rows($data);
if($total != 0)
{?>	
	<CENTER><table>
	<thead><tr>
		<th>S.No</th>
		<th>BILL NO.</th>
		<th>VIDEO ID</th>
		<th>CUSTOMER ID</th>
		<th>PRICE</th>
		<th>DATE </th> 
		<th>PAYMENT MODE</th> 
	</tr>
	</thead></CENTER>
	<?php $i=1;
while ($result = mysqli_fetch_assoc($data))
{ echo "<tr>
			<td>".$i."</td>
			<td>".$result['bill_no']."</td>
			<td>".$result['v_id']."</td>
			<td>".$result['c_id']."</td>
			<td>".$result['price']."</td>
			<td>".$result['date']."</td>
			<td>".$result['payment_mode']."</td>
			</tr>";
$i=$i+1;
		}

}	
		else { echo "NO DATA FOUND"; }
		}	?> 
	</table> 
	
	
	
	</h1>
	</body>
</html>	
