<?php 
	session_start();
	if(isset($_SESSION['user']))
	{
		header("location:video_library.php");
		session_destroy();
	}
?>

<h1 style="color:white;text-align:center"><?php 
    if(isset($_POST['login']))
    {
        $name = $_POST['uname'];
	    $password = $_POST['paswd'];
        $con = mysqli_connect("localhost","root","","library");

        $query = "SELECT DECODE(`password`, 'secret') AS `pswd` FROM `admin` WHERE `u_name` = '$name'";

        $res = mysqli_query($con, $query);
		$res1 = mysqli_fetch_assoc($res);
		$password1=$res1['pswd'];		
		if($password==$password1)
		{
			$result=1;


		}
		else
		{
			$result=0;
		}
		
        if($result==1)
        {       
		$_SESSION['user'] = $name;
		$_SESSION['timeout'] = time();
        header("Location: main1.php"); /* Redirect browser */
		exit();
        
        }
        else {       

        echo "Incorrect Password";

		}
		}
    
?>
</h1>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>

/* Add Zoom Animation */
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

}

</style>
<title> LOGIN
</title>
<link rel="stylesheet" href="css/styling.css" type="text/css">
</head>
<body>
 <center><img src="videoheader.png" width="100%" height="250px">    
</center>
>	<img src="film-animated-No-Background.gif" width="200px" height="200px" align="left">
		<img src="film-animated-No-Background.gif" width="200px" height="200px" align="right">
<div id="id01" class="simple-form">
 
  <form id='reg1' method="POST" action="login.php" class="modal-content animate">
<h1>Admin login</h1>     
    <div class="container">
	
      <b>Username :</b>
      <input type="text" placeholder="Enter Username" name="uname" id="button" required><br><br><br>

      <b>Password :</b>
      <input type="password" placeholder="Enter Password" name="paswd" id="button" required><br><br><br>

        
<input type="submit" name ="login" value="Login" id="butt">

    </div>


  </form>
</div>


</body>
</html>
