<?php
//check if user submitted form
if($_SERVER['REQUEST_METHOD']=='POST'){
	
	//connect to database
	include('connection.php');
	//create an array for errors:
	$errors=array();
	//check for email address:
	if(empty($_POST['email'])){
		$errors[]='You forgot to enter your email';	
	}else{
		$e=mysqli_real_escape_string($dbc,trim($_POST['email']));
	}
	//check current password;
	
	if(empty($_POST['pass'])){
		$errors[]='You forgot to enter your current password';	
	}else{
		$p=mysqli_real_escape_string($dbc,trim($_POST['pass']));
	}
	if(!empty($_POST['pass1'])){
		if($_POST['pass1']!=$_POST['pass2']){
			$errors[]='Your new password does not match confirmed password';
		}else{
			$np=mysqli_real_escape_string($dbc,trim($_POST['pass1']));
		}
	}else{
		$errors[]='You forgot to enter your new password';
	}
	//if there is no errors:
	if(empty($errors)){
		// check user 
		$q="SELECT id FROM users WHERE (email='$e' AND pass='$p')";
		$r=mysqli_query($dbc,$q);
		$num=mysqli_num_rows($r);
		if($num==1){
			$row=mysqli_fetch_array($r,MYSQLI_NUM);
			$q="UPDATE users SET pass='$np' WHERE id='$row[0]'";
			if(mysqli_affected_rows($dbc)==1)
			{
				echo "thanks u have updated your password";
			}else{
				echo "Your password could not be changed";
			}
			mysqli_close($dbc);
		}else{
			echo "The email and password dont match records";
		}
	} else{
		echo "Error ";
		foreach($errors as $msg){
			echo $msg;
		}
	}
	
	
	
	
	
	
	
	
	
}






?>

<h1>Change Password</h1>
<form action="password.php" method="post">

  <p>Email: <input type="text" name="email" size="20" maxlength="50" value="<?php if(isset($_POST['email'])){echo $_POST['email'];}?>"/> </p>
  <p>Current Password : <input type="password" name="pass" size="10" maxlength="50" value="<?php if(isset($_POST['pass'])){echo $_POST['pass'];}?>"/></p>
  <p>New Password:<input type="password" name="pass1" size="10" maxlength="50" value="<?php if(isset($_POST['pass1'])){echo $_POST['pass1'];}?>"/></p>
  <p>Confirm New Password:<input type="password" name="pass2" size="10" maxlength="50" value="<?php if(isset($_POST['pass2'])){echo $_POST['pass2'];}?>"/></p>
  <p><input type="submit" name="submit" value="Change Password"/></p>




</form>