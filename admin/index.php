<?php
session_start();
if(!isset($_SESSION["manager"])) {
	header("location:admin.php");
	exit();
	}
// make sure that this manager SESSION value is in the database

$managerID=($_SESSION["id"]);
$manager=($_SESSION["manager"]);
$password=($_SESSION["password"]);


include"../script/connect.php";
$sql=mysql_query("SELECT * FROM admin WHERE id='$managerID' AND username='$manager' AND password='$password' LIMIT 1");


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>travel</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link rel="shortcut icon" href="file:../images/fav.png" />
 <style type="text/css">
 body{ background-image:url(../images/new_01.png);
	 font:bold 12px Arial, Helvetica, sans-serif;
	 margin:0;
	 padding:0;
	 min-width:960px;
	 color:#bbbbbb; 
}
.header_wrapper {
background-image: url(../images/menu_02.png);
height: 92px;
margin-top: 10px;
}
.container {width: 960px; margin: 0 auto; overflow: hidden;}
.body{border:1px #000000 solid; margin-top:10px; border-radius:5px;}
.body a{text-decoration:none; font-size:20px; color:#CCCCCC;}
.body a:hover{color:#0099CC;}
.out a{text-decoration:none; color:#CCCCCC;}
.out a:hover{text-decoration:underline;}
</style>
</head>

<body>
<div class="container">
<div class="out">
<a href="logout.php" style="float:right; color:#999999;">Logout</a></div>
</div>
<div class="header_wrapper">
        <div class="container">
      							<a href="#">
								<div id="logo">
            					<center>	<img src="../images/logo1.png" style="margin-top:15px;"/></center>
                				</div></a>
                        </div>
            	</div>
				<div class="container">
				<h1 style="text-align:center; font: 4em normal Arial, Helvetica, sans-serif;">Welcome!!!</h1>
				<center><table width="326" cellspacing="5" cellpadding="5" class="body">
              <tr>
                <td width="32"><a href="managepackages.php"><img src="../images/icons/manage_categories.png" style="height: 50px;" /></a></td>
                <td width="240"><a href="managepackages.php">Manage Packages</a></td>
              </tr>
              <tr>
                <td><a href="changpassword.php"><img src="../images/icons/change_password.png" style="height: 31px;" /></a></td>
                <td><a href="changepassword.php">Change Your Password</a></td>
              </tr>
              <tr>
                <td><a href="view_all.php"><img src="../images/icons/enquiry.png" style="height: 31px;" /></a></td>
                <td><a href="view_all.php">View Enquiry</a></td>
              </tr>
            </table></center>
			
				</div>
</body>
</html>
