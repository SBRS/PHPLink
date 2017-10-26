<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
</head>

<body>
<?php 
// create connection
$mysqli = new mysqli("localhost", "lia15", "06121987", "lia15mysql1");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

// create SQL statement 
$sql = "SELECT * FROM Suppliers
        WHERE SupplierID=$_POST[choice]"; 

//Execute the SQL statement
$rs=$mysqli->query($sql);
if (!$rs)
  {exit("Error in SQL");}

//Select the result
while ($row = $rs->fetch_assoc())
{
  $id=$row["SupplierID"];
  $compname=$row["CompanyName"];
  $conname=$row["ContactName"];
}

// free resources and close connection 
$mysqli->close();    
?> 
<FORM NAME="page3Form" METHOD="POST" ACTION="index.php?content_page=page3Action">
<INPUT TYPE="HIDDEN" NAME="SupplierID" VALUE="<?php echo $id; ?>">
<pre>
 Company Name:<INPUT TYPE="TEXT" NAME="CompanyName" VALUE="<?php echo $compname; ?>"><BR>
 Contact Name:<INPUT TYPE="TEXT" NAME="ContactName" VALUE="<?php echo $conname; ?>"><BR>
</pre>
<INPUT TYPE="SUBMIT"><BR> 
</FORM>

</body>
</html>
