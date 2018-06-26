<?php

	//Page title:
	echo "<h3>Control Panel</h3>";
	
	echo "<a href=login.php> Go back to control Panel</a>";
    //include connection to database
    
	include ("connection.php");
	
	//Define query:
	
	$q="SELECT last_name,first_name,email,DATE_FORMAT(registration_date,'%M %d,%Y') AS dr, id FROM users ORDER BY registration_date ASC";
	
	//query select all fields from database
	
	$r=mysqli_query($dbc,$q);
	
	//Count the number of returned rows
	$num=mysqli_num_rows($r);
	
	
	
	//if any rows returned , display records
	if($num>0)
	{

		//inform how many users are registered
		echo "<p>There are $num registered users</p>";
		
		//create table
	echo "<table align='center' border='1' cellspace='3' cellpadding='3' width='75%'>
    <tr>
       <td align='left'><b>Edit</b><//td>
       <td align='left'><b>Delete</b><//td>
       <td align='left'><b>Name</b><//td>
       <td align='left'><b>Email</b><//td>
       <td align='left'><b>Date registered</b><//td>
    </tr>";	   
	
  //use while loopto create an associative array	
	
	while($row=mysqli_fetch_array($r))
	{
		//output values from an associative array
		echo "<tr>
		           <td align='left'><a href='edit_user.php?user_id=".$row['id']."&fname=".$row['first_name']."&lname=".$row['last_name']."&lemail=".$row['email']."'>Edit</a></td>
		           <td align='left'><a href='delete.php?user_id=".$row['id']."'>Delete</a></td>
		          <td align='left'>".$row['last_name'].", ".$row['first_name']."</td>
		          <td align='left'>".$row['email']."</td>
			      <td align='left'>".$row['dr']."</td>
			 </tr>";
				  
	}
	   echo "</table>";
		
		
		
		
		
	}
	else
	{
		echo "There are currently no registered users";
	}	
	
	

    //close mysql connection
mysqli_close($dbc);

?>
