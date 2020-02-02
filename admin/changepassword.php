<?php
ob_start();
session_start();
if(!isset($_SESSION["manager"])) {
	header("location:admin.php");
	exit();
	}
	// make sure that this manager SESSION value is in the database

$managerID=($_SESSION["id"]);
$manager=($_SESSION["manager"]);
$password=($_SESSION["password"]);
// connect to database
include"../script/connect.php";
$sql=mysql_query("SELECT * FROM admin WHERE id='$managerID' AND username='$manager' AND password='$password' LIMIT 1");


?>

<?php
$msg = "";
if (($_POST['submit'])) {

	$username = mysql_real_escape_string($_POST['username']);
	$password = mysql_real_escape_string(($_POST['password']));
	$newpwd = mysql_real_escape_string(($_POST['newpwd']));
	$rpwd = mysql_real_escape_string(($_POST['rpwd']));

	$sql = "SELECT * FROM admin WHERE username = '$username'";
	$query = mysql_query($sql);
	$numrows = mysql_num_rows($query);

		while ($rows = mysql_fetch_array($query)) {
		
		$dbname = $rows['username'];
		$dbpassword = $rows['password'];
		$fullname = $rows ['name'];
		$email = $rows ['email'];
		}


// check all the fields in the form are filled
			if (empty($username) || empty($password) || empty($newpwd) || empty($rpwd))
			$msg = "All fields are required.";
					else if($numrows == 0)
					$msg = "This username does not exist.";
							else if ($password != $dbpassword)
							$msg = "The current password you entered is incorrect.";
									else if ($newpwd != $rpwd)
									$msg = "Your new passwords do not match.";
											else if ($newpwd == $password)
											$msg = "Your new password cannot match your old password.";
													else {
													$msg = "Your password has been changed.";
													mysql_query("UPDATE admin SET password = '$newpwd' WHERE username = '$username'");
													}
													
													
																}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Change Password</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link rel="shortcut icon" href="../images/fav.png" />
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
				<center>
<form method="post" action="">
            <table width="510" height="240" style="margin-left: -158px;">
              <tr>
              <th width="322" height="47" align="right">Username:</th>
                <td width="176"><input type="text" name="username"  value="" size="30"/></td>
              </tr>
              <tr>
                <th height="51" align="right">Current Password:</th>
                <td><input type="password" name="password" value="" size="30"/></td>
              </tr>
              <tr>
                <th height="58" align="right">New Password:</th>
                <td><input type="password" name="newpwd" value="" size="30"/></td>
              </tr>
              <tr>
                <th align="right">Re-type New Password:</th>
                <td><input type="password" name="rpwd" value="" size="30"/></td>
              </tr>
            </table>
			<input type="submit" name="submit" value="Update"/>
	</form>
	</center>
	</div>
</body>
</html>
