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
// Error reporting
error_reporting(E_ALL);
ini_set('display_errors', '1');
?>


<?php
// Parse the form data and add to the database
if(isset($_POST['package_name'])) {
	
	$package_name=mysql_real_escape_string($_POST['package_name']);
	$package_information=mysql_real_escape_string($_POST['information']);
	$category=mysql_real_escape_string($_POST['category']);
	$sub_category=mysql_real_escape_string($_POST['sub-category']);
	
	$sql=mysql_query("SELECT id FROM packages WHERE prackage_name='$package_name' LIMIT 1");
	$packageMatch=mysql_num_rows($sql);
	if($packageMatch>0) {
	echo'<script type="text/javascript">alert("The album you are trying to add already exist."); window.location.href = "http://localhost/11/admin/managepackages.php";</script>';
	exit();
	}
	$sql=mysql_query("INSERT INTO packages (package_name, package_information, category, sub_category) VALUES ('$package_name', '$package_information', '$category', '$sub_category')") or die (mysql_error());
	$aid=mysql_insert_id();
	$newname="$aid.jpg";
	move_uploaded_file($_FILES['pack_img']['tmp_name'],"/images/pkgimg/$newname");
	header("location:managepackages.php");
	exit();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Manage Packages</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link rel="shortcut icon" href="../images/fav.png"/>
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
<form action="managepackages.php" method="post">
                <table width="62%" border="0" cellspacing="0" cellpadding="6">
                
                <tr>
                    <td align="right" width="20%">Package Name:</td>
                    <td width="80%"><label>
                    <input name="package_name" type="text" id="package_name" size="50" value=""  />
                    </label></td>
                </tr>
               <tr>
                    <td align="right">Packages Information:</td>
                    <td><label>
                    <textarea name="information" id="information" cols="40" rows="10"></textarea>
                    </label></td>
                </tr>
                <tr>
                    <td align="right">Category:</td>
                    <td><label>
                    <select name="category" >
                    <option value=""></option>
					<option value="Trekking">Trekking</option>
                    <option value="Pick Climbing">Pick Climbing</option>
					<option value="Restricted Area">Restricted Area</option>
					<option value="Safari">Safari</option>
					<option value="Rafting">Rafting</option>
                    </select>
						</label>
                    
                </tr>
                <tr>
                    <td align="right">Sub-Category:</td>
                    <td><label>
                    <select name="sub-category" >
                    <option value=""></option>
					<option value="Annapurna Region">Annapurna </option>
                    <option value="Pick Climbing">Pick Climbing</option>
					<option value="Restricted Area">Restricted Area</option>
					<option value="Safari">Safari</option>
					<option value="Rafting">Rafting</option>
                    </select>
						</label>
                    
                </tr>
                <tr>
                    <td align="right">Package Image:</td>
                    <td><label>
                    <input type="file" name="pack_img" id="pack_img"  />
                    </label></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td><label>
                    <input name="button" type="submit" id="button" value="Add This Package"  />
                    </label></td>
                </tr>
                </table>
                </form>
</body>
</html>
