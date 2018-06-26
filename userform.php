<html>
<head>
<title>This is my form</title>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style type="text/css">
body {
	background-color: rgb(255,255,255);
}
</style>
</head>
<body bgcolor="#D6D6D6" tracingsrc="images (1).jpg" tracingopacity="29" marginheight="320px"> 
  <form action="processing.php" method="post">
  
    <p>First Name:<input type="text" name="fname" size="20" maxlength="50"/></p>
	<p>Last Name:<input type="text" name="lname" size="20" maxlength="50"/></p>
	
	<p>Email:<input type="text" name="email" size="40" maxlength="50"/></p>
	<p>Gender:<input type="radio" name="gender" value="M"/>Male 
	<input type="radio" name="gender" value="F"/>Female 
	<p>Age:<select name="age">
	           <option value="0-29">Under 30</option>
			   <option value="30-60">Between 30 to 60</option>
			   <option value="60+">Over 60</option>
		    </select>
	</p>
	<p>Comments:<textarea name="comments" maxlength ="200" rows="3" cols="40"></textarea></p>
	<p>Password:<input type="password" name="password" maxlength="50"></p>
	<p><input type="submit" name="submit" value="Submit"/></p>
 

 

 </form>  
<a href='index.php'>Go back to login form</a>";
    
  
  </body>
</html>   
   