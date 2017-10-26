<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<link href="WABootstrap/bootstrap.css" rel="stylesheet" type="text/css" />
<link href="WAStyleSheet/Practical.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php
if (isset($_FILES["paper_file"]) && ($_FILES["paper_file"]["error"] > 0))
  {
  echo "Error: " . $_FILES["paper_ file"]["error"] . "<br />";
  }
elseif (isset($_FILES["paper_file"]))
  {
    move_uploaded_file($_FILES["paper_file"]["tmp_name"], "../uploads/PHPUploaded/" . $_FILES["paper_file"]["name"]); //Save the file as the supplied name
  }
	
// create connection
$mysqli = new mysqli("localhost", "lia15", "06121987", "lia15mysql1");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
//echo $mysqli->host_info . "\n";
  
// create SQL statement 
$sql = "INSERT INTO Employees(FirstName,LastName,Title)
        VALUES('" . $_POST['paper_author'] . "','" 
		         . $_FILES["paper_file"]["name"] . "','" 
				 . $_POST['paper_title'] . "')"; 
				 
// execute SQL statement and get results 
if (!$mysqli->query($sql)) {
    echo "SQL operation failed: (" . $mysqli->errno . ") " . $mysqli->error;
} 

//Select the file information
$sql="SELECT Employees.EmployeeID As paper_ID,
              Employees.FirstName As paper_author,
              Employees.LastName As paper_file,
              Employees.Title As paper_title 
      FROM Employees";
	  
$rs=$mysqli->query($sql);
if (!$rs)
  {exit("Error in SQL");}

//Display the file information in a table
echo "<TABLE BORDER='1'>
      <TR>
      <TH> paper ID </TH>
      <TH> paper author </TH>
      <TH> paper file </TH>
      <TH> paper title </TH>
      </TR>";
	  
while ($row = $rs->fetch_assoc())
{
  $paper_id=$row["paper_ID"];
  $paper_author=$row["paper_author"];
  $paper_file=$row["paper_file"];
  $paper_title=$row["paper_title"];
  echo "<TR>";
  echo "<TD>$paper_id</TD>";
  echo "<TD>$paper_author</TD>";
  echo "<TD>$paper_file</TD>";
  echo "<TD>$paper_title</TD>";
  echo "</TR>";
}

echo "</TABLE>";
?>

<form method="post" enctype="multipart/form-data" action="index.php?content_page=ReviewerComments">
<br>
Paper ID:&nbsp;&nbsp;&nbsp;
<input type="text" name="paper_ID" size="20"><br> 
Icon File:&nbsp;&nbsp;&nbsp;&nbsp;
<input type="File" name="icon_file" value="" size="30"><br>
<br> 
<input type="Submit" name="submit" value="Submit Icon">
</form>

</body>
</html>
