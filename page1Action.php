<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
<LINK REL=STYLESHEET TYPE="text/css" HREF="WAStyleSheet/Practical.css">
</head>

<body>
<?php 
// create connection
$mysqli = new mysqli("localhost", "lia15", "06121987", "lia15mysql1");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

// create SQL statement 
$sql = "SELECT * FROM Suppliers WHERE SupplierID < 8"; 

//Execute the SQL statement
$rs=$mysqli->query($sql);
if (!$rs)
  {exit("Error in SQL");}
  
//Output the result in an HTML table
//Table head
echo "<table border='2'><tr>";
echo "<th>Supplier ID</th>";
echo "<th>Company Name</th>";
echo "<th>Contact Name</th></tr>";

//Table body
while ($row = $rs->fetch_assoc())
{
  $id=$row["SupplierID"];
  $compname=$row["CompanyName"];
  $conname=$row["ContactName"];
  echo "<tr><td>$id</td>";
  echo "<td>$compname</td>";
  echo "<td>$conname</td></tr>";
}

echo "</table>";
?>

<?php
// Search for an input name 
// create SQL statement 
$sql = "SELECT * FROM Customers 
		WHERE ContactName ='$_GET[StudentName]'"; 

//Execute the SQL statement
if ($result = $mysqli->query($sql)) {
    /* determine number of rows result set */
    $counter = $result->num_rows;
}
else {
	echo "SQL operation failed: (" . $mysqli->errno . ") " . $mysqli->error;
}
 
 if ($counter == 0)
  echo "<SPAN class='caption'> The input student is not in our database </SPAN><br>";
 else  
  echo "<SPAN class='caption'> The input student is found</SPAN><br>";
?>

<form name="page2Form" METHOD="POST" action="index.php?content_page=page2Action">
<?php 

// create SQL statement 
$sql = "SELECT * FROM Suppliers"; 

//Execute the SQL statement
$rs=$mysqli->query($sql);
if (!$rs)
  {exit("Error in SQL");}

//Output the result in an HTML table
//Table head
echo "<table border='2'><tr>";
echo "<th>Supplier ID</th>";
echo "<th>Company Name</th>";
echo "<th>Contact Name</th>";
echo "<th>Country</th>";
echo "<th>Choice</th></tr>";

//Table body
while ($row = $rs->fetch_assoc())
{
  $id=$row["SupplierID"];
  $compname=$row["CompanyName"];
  $conname=$row["ContactName"];
  $contry=$row["Country"];
  echo "<tr><td>$id</td>";
  echo "<td>$compname</td>";
  echo "<td>$conname</td>";
  echo "<td>$contry</td>";
  echo "<td><input type='radio' name='choice' checked='true' value=$id></td></tr>";
}

echo "</table>";

// free resources and close connection 
$mysqli->close();    
?> 
<INPUT TYPE="SUBMIT"><br/>
</form>

</body>
</html>
