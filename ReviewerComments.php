<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
<link href="WABootstrap/bootstrap.css" rel="stylesheet" type="text/css" />
<link href="WAStyleSheet/Practical.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?php
if (isset($_FILES["icon_file"]) and ($_FILES["icon_file"]["error"] > 0))
 {
  echo "Error: " . $_FILES["icon_ file"]["error"] . "<br />";
  }
elseif (isset($_FILES["icon_file"]))
  {
  move_uploaded_file($_FILES["icon_file"]["tmp_name"], "../uploads/PHPUploaded/" . $_FILES["icon_file"]["name"]); //Save the file as the supplied name
  }
 ?>
 
<?php

// create connection
$mysqli = new mysqli("localhost", "lia15", "06121987", "lia15mysql1");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

if (isset($_POST['paper_ID']) && ($_POST['paper_ID'] != ''))
{
// create SQL statement  
$sql = "UPDATE Employees 
        SET City = '". $_FILES["icon_file"]["name"] . 
      "' WHERE EmployeeID =". $_POST['paper_ID'];
	   
// execute SQL statement and get results 
if (!$mysqli->query($sql)) {
    echo "SQL operation failed: (" . $mysqli->errno . ") " . $mysqli->error;
} 
}
?>
<?php

//Select the file information
$sql="SELECT Employees.EmployeeID As paper_ID,
              Employees.FirstName As paper_author,
              Employees.Title As paper_title,
			  Employees.City As paper_icon 
      FROM Employees";
	  
$rs=$mysqli->query($sql);
if (!$rs)
  {exit("Error in SQL");}
  
?>
<TABLE><TR><TD> <!-- Page outline table first column starts -->
<TABLE bgcolor="silver" border="2"> <!-- File information table starts -->
  <TR>
    <TH> paper ID </TH>
    <TH> paper author </TH>
    <TH> paper title </TH>
    <TH> paper icon </TH>
  </TR>

<?php  
//Display the file information in a table
while ($row = $rs->fetch_assoc())
{
  $paper_id=$row["paper_ID"];;
  $paper_author=$row["paper_author"];
  $paper_tile=$row["paper_file"];
  $paper_icon=$row["paper_icon"];
  $img_name = $paper_icon;
  if (!$paper_icon) 
  {$img_name = "WALogo.gif";}
  echo "<TR>";
  echo "<TD>$paper_id</TD>";
  echo "<TD>$paper_author</TD>";
  echo "<TD>$paper_tile</TD>";
  echo "<TD><div style='background: #FFCCFF; height:60; width:60; padding:10px'>
            <img src='../uploads/PHPUploaded/" . $img_name ."' width='50' height='50' onClick=\"window.location='index.php?content_page=ReviewerComments&PaperID=" .$paper_id . "'\"></div></TD>";
  echo "</TR>";
}
?>
</TABLE> <!-- File information table ends -->
<!-- Page outline table first column ends, second column starts-->
</TD><TD valign="top">
<?php
if (isset($_GET['PaperID']) && ($_GET['PaperID'] != ''))
{
$sql= "SELECT Employees.Address As paper_comments,    
       Employees.Title As paper_title
       FROM Employees
       WHERE EmployeeID =". $_GET['PaperID'];
	  
$rs=$mysqli->query($sql);
if (!$rs)
  {exit("Error in SQL");}
  
while ($row = $rs->fetch_assoc())
{
$paper_tile=$row["paper_title"];
$comments=$row["paper_comments"];
echo "<br> The reviewers' comments for paper " . $paper_tile ."<br>";
echo "<textarea id='Comments' rows='5' cols='60'>" . $comments ."</textarea>";
}
?>
<!-- Page outline table second column ends, page outline table ends-->
</TD></TR></TABLE>

<script>
    Comments.focus()
</script>
<?php 
} 
$mysqli->close(); 
?>

</body>
</html>
