<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
</head>

<body>
<?php
   function checkUserCredentals($inputUsername, $inputPassword)
   {
   /*
   This function takes input username and password as parameters and 
   returns TRUE if the user is authenticated, FALSE if the user is not authenticated
   */
	   
	// create connection
	$mysqli = new mysqli("localhost", "lia15", "06121987", "lia15mysql1");
	if ($mysqli->connect_errno) {
		echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
	}
	  // query the users table for name and surname 
	  $sql = "SELECT LastName, FirstName FROM Employees Where LastName='".$inputUsername."' AND FirstName='".$inputPassword."'";

	 //Execute query
	$rs=$mysqli->query($sql);
	if (!$rs)
	  {exit("Error in SQL");}

	//Count the record number
	$counter = $rs->num_rows;
      
	  if ($counter>0)
	  {
		  //authentication succeeded
		  return (true);
	  }
	  else
	  {
		  //authentication failed
		  return (false);	
	  }
   }
   
?>

</body>
</html>
