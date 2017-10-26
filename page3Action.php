<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
</head>

<body>
<?php

	if(isset($_POST['CompanyName']))
	{
	// create connection 
$mysqli = new mysqli("localhost", "lia15", "06121987", "lia15mysql1");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
	// create SQL statement 
	$sql = "UPDATE Suppliers
			SET CompanyName='$_POST[CompanyName]',
			    ContactName='$_POST[ContactName]'
			WHERE SupplierID=$_POST[SupplierID]"; 
	
    // execute SQL statement 
	if (!$mysqli->query($sql)) {
		echo "SQL operation failed: (" . $mysqli->errno . ") " . $mysqli->error;
	}
	$mysqli->close(); 
	} //end if company
	
	$mysqli = new mysqli("localhost", "lia15", "06121987", "lia15mysql1");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
	// create another SQL statement 
	$sql = "SELECT * FROM Suppliers"; 
	
	//Execute the SQL statement
	$rs=$mysqli->query($sql);
	if (!$rs)
	  {exit("Error in SQL");}

	//Count the record number
	$counter = $rs->num_rows;
	
	$PageSize=5;
    $PageCount=$counter/$PageSize + 1;
	
	//Output page index table
	echo "<table ID=tableID border=2>";
	echo "<tr>";
	for( $i=1; $i <= $PageCount; $i++)
	{
	echo "<td><a href=index.php?content_page=page3Action&pg=$i> Page $i</a></td>";
	} //end for
	echo "</tr></table><br>";
?>
	<TABLE border="2">
	  <TR>
	    <TH> Supplier ID </TH>
	    <TH> Company Name </TH>
	    <TH> Contact Name </TH>
        <TH> Contact Title </TH>
	  </TR>
	  
<?php   

   // Test if this is the first page 
	if (isset($_GET['pg']))
	{
	  // set the parameters for the rest pages 
	  $start= ($_GET['pg']-1)*$PageSize + 1;
	  $end= $_GET['pg']*$PageSize;
	  if( $end > $counter )
		$end = $counter;
	}
	else
	{
	  //set the parameters for the first page
	  $start= 1;
	  $end= $PageSize;
	  if( $end > $counter )
		$end = $counter;
	}//end if IsSet("$_GET['pg']")
	
	$j = $start - 1;
	/* seek to row no. $j */
    $rs->data_seek($j);
	
	//Display the page 
	for( $i=$start; $i <= $end; $i++)
	{
	  $row = $rs->fetch_assoc();
	  $id=$row["SupplierID"];
	  $compname=$row["CompanyName"];
	  $conname=$row["ContactName"];
	  $job=$row["ContactTitle"];
	  echo "<tr><td>$id</td>";
	  echo "<td>$compname</td>";
	  echo "<td>$conname</td>";
	  echo "<td>$job</td></tr>";
	}
	
	echo "</table>";

	$rs->free();    
	//close connection 
	$mysqli->close(); 
	?>

</body>
</html>
