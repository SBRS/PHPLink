<?php
require("CheckLogin.php");
?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
<link href="WABootstrap/bootstrap.css" rel="stylesheet" type="text/css" />
<link href="WAStyleSheet/Practical.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
	function strValidateName(strStudentName)
	{
	/*
	 */

	var iLen, cFirst, bFirst;
	iLen = strStudentName.length;
	cFirst = strStudentName.substring(0,1);

	//Check the first letter and make sure that it is a letter and a capital letter
	if ((cFirst.toLowerCase() != cFirst.toUpperCase()) && (cFirst == cFirst.toUpperCase()))        
	{
		bFirst = true;
	}

	if (((5 <= iLen) && (20 > iLen)) && bFirst )
	{
		return(true);
	}
	else
	{
		return(false);
	} 
	}

	function testStudentName()
	{
		var test = strValidateName(txtStudentName.value);
	if (strValidateName(txtStudentName.value)) 
		//The input name is valid
		window.location="index.php?content_page=page1Action&StudentName=" + txtStudentName.value;
	else
		alert("This name is invalid");	
	}
</script>
</head>
<body>
Student Name: <input name="txtStudentName" size="20" id="txtStudentName"/> <br />
<input type="button" value="Submit Input" onclick="testStudentName();"  />
</body>
</html>
