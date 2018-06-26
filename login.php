<?php
//avoid errors only reports warnings
error_reporting(2);
include("connection.php");
//grab values email and password from login form
$login_email=$_POST['login_email'];
$login_password=$_POST['login_password'];

// create the query and number of rows returned from the query

$query = mysqli_query($dbc,"SELECT*FROM users WHERE email='".$login_email."'");
$numrows=mysqli_num_rows($query);

if($_SERVER['REQUEST_METHOD']=='POST')
{


//create condition to check if there is 1 row with that email

if($numrows!=0)
{
//grab the email and password from that row returned before	
	while($row=mysqli_fetch_array($query))
	{
		
		$dbemail=$row['email'];
		$dbpass=$row['password'];
		
	}
//create condition to check if email and password are equal to the returned value
	if($login_email==$dbemail)
	{		
		if($login_password==$dbpass)
		{
			echo "<p>Welcome".$dbfirstname.",You will be redirected to login page in 5 seconds</p>";
            header('Refresh: 3;URL=output.php');          
		    include("navbar.php");		
			
		}else
		{
			echo "your password is incorrect!<a href='index.php'> Go back to login form</a>";
		}		
	}
	else
	{
	  echo "Your email is incorrect! <a href='index.php'> Go back to login form</a>";	
	}

 }
 else
 {
	echo " Invalid credentials.You are not registered Plz register  <a href='userform.php'>HERE</a>";
 }
}
else{
	echo "Please login <a href='index.php'>HERE</a>";
}

?>