<?php
//processing form
if($_SERVER['REQUEST_METHOD']=='POST')
 {

  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $email = $_POST['email'];
  $gender = $_POST['gender'];
  $age = $_POST['age'];
  $comments = $_POST['comments'];
  $password = $_POST['password'];

	if(!empty($fname)&&!empty($lname)&&!empty($email)&&!empty($gender)&&!empty($age)&&!empty($comments)&&!empty($password))
	{
         include('connection.php'); 
		 
		 mysqli_query($dbc,"INSERT INTO users(first_name,last_name,email,gender,age,comments,password)VALUES('$fname','$lname','$email','$gender','$age','$comments','$password')");
         $registered=mysqli_affected_rows($dbc);
			 echo "<h3>You have successfully registered! Please Login <a href='index.php'>HERE</a></h3>";
	
	}    
	
	else
	{
	  echo "<p style='color:red;'Please fill all values of form";	
    }      
 }
 else
 {	
	echo "No form has been submitted";
 }
?>