<?php
session_start();
if(!isset($_SESSION["email"])) {
	header("location:login.php");
	exit();
	}
// make sure that this manager SESSION value is in the database

$managerID=($_SESSION["id"]);
$manager=($_SESSION["email"]);
$password=($_SESSION["password"]);


include"script/connect.php";
$sql=mysql_query("SELECT * FROM user WHERE id='$managerID' AND email='$manager' AND password='$password' LIMIT 1");


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<a href="logout.php">Logout</a>
</body>
</html>
