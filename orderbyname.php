<?php

    include ("connection.php");
	
	$r=mysqli_query($dbc,"SELECT * FROM users ORDER BY last_name ASC");
	
	echo "<table align='center' border='1' cellspace='3' cellpadding='3' width='75%'>
    <tr>
       <td align='left'><b>Name</b></td><td align='left'><b>Email</b></td>
    </tr>";	   
	
	
	
	while($row=mysqli_fetch_array($r))
	{
		
		echo "<tr><td align='left'>".$row['last_name'].", ".$row['first_name']."</td><td align='left'>".$row['email']."</td>";
	   
	}




mysqli_close($dbc);



?>