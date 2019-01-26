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
<HTML>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.fa {
  padding: 20px;
  font-size: 30px;
  width: 50px;
  text-align: center;
  text-decoration: none;
  margin: 5px 2px;
}

.fa:hover {
    opacity: 0.7;
}

.fa-facebook {
  background: #3B5998;
  color: blue;
}

a:link {
    color: white;
    background-color: transparent;
    text-decoration: none;
}
a:visited {
    color: white;
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
table {
	 display: table;
    border-collapse: separate;
  border-spacing: 200px 20px;

}
td {
	    text-align: center;

		border-bottom: 1px solid #ddd;
	    font-family: 'Lato', sans-serif;
	}
#b{
	
}
	
	th{
	    text-align: center;
		border-top: 1px solid #ddd;	
		border-bottom: 1px solid #ddd;
	    font-family: 'Lato', sans-serif;
		color:WHITE;
		 border-left: none;
  border-right: none;
	}
	
	img {
    border-radius: 0%;
}
.footer {
    background-color: ;
    padding: 10px;
	color: white;
    text-align: center;
	position: absolute;
	left:38%;
bottom: 0px;
	}

</style>
<title>
VIDEO LIBRARY
</title>

<link rel="stylesheet" href="css/styling.css" type="text/css">
</head>

<BODY>



    <center><img src="videoheader.png" width="100%" height="250px">    
</center>
<BR><BR>
<P>	<img src="film-animated-No-Background.gif" width="200px" height="200px" align="left">
		<img src="film-animated-No-Background.gif" width="200px" height="200px" align="right">
	<CENTER>
	<table cellpadding="10" rules="cols" >
	<TR><TH><h2>DATA ENTRIES</h2></TH>
	<TH><h2>SHOW DATA</h2></TH></TR>
	<TR><TD><A href="customer_entry.php" >CUSTOMER DATA ENTRY</A></TD>
	<TD><A href="customer_display.php">DETAILS CUSTOMER</A></TD></TR>
	<TR><TD><A href="video_entry.php">VIDEO ENTRY</A></TD>
	<TD><A href="video_display.php">VIDEO DETAILS </A></TD></TR>
	<TR><TD><A href="rented_e.php">RENTED VIDEOS ENTRY</A></TD>
	<TD><A href="rented_display.php">RENTED VIDEOS DETAILS</A></TD></TR>	
	<TR><TD><A href="payment_entry1.php">PAYMENT ENTRY</A></TD>
	<TD><A href="payment_display.php">PAYMENT DETAILS</A></TD></TR>	
	
	</CENTER></table>
	</P>	
	<div class="footer">
  Contact us: 	
	<a href="#" class="fa fa-facebook" title="Facebook"></a>
    <a href="#" class="fa fa-twitter" title="Twitter"></a>
	<a href="#" class="fa fa-instagram" title="Instagram"></a>
</div>
	</BODY>
</HTML>