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
// View whole list
$enquiry_list="";
$sql=mysql_query("SELECT * FROM enquiry ORDER BY id DESC");
$enquiryCount=mysql_num_rows($sql);
if($enquiryCount>0) {
		while($row=mysql_fetch_array($sql)) {
		$id=$row['id'];
		$name=$row['name'];
		$phone_number=$row['phone_number'];
		$email=$row['email'];
		$arrival=$row['arrival_date'];
		$departure=$row['departure_date'];
		$destination=$row['destination_of_interest'];
		$minbudget=$row['minimum_budget'];
		$maxbudget=$row['maximum_budget'];
		$accommodation_type=$row['accommodation_type'];
		
		$enquiry_list.='<tr style="color:#FFF;" bgcolor="#000000">';
					$enquiry_list.='<td>'.$id.'</td>';
					$enquiry_list.='<td>'.$name.'</td>';
					$enquiry_list.='<td>'.$phone_number.'</td>';
					$enquiry_list.='<td>'.$email.'</td>';
					$enquiry_list.='<td>'.$arrival.'</td>';
					$enquiry_list.='<td>'.$departure.'</td>';
					$enquiry_list.='<td>'.$destination.'</td>';
					$enquiry_list.='<td>'.$minbudget.'</td>';
					$enquiry_list.='<td>'.$maxbudget.'</td>';
					$enquiry_list.='<td>'.$accommodation_type.'</td>';
					$enquiry_list.='</tr>';
					
		}
	} else {
	$enquiry_list="You have no enquiry yet.";
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="icon" href="http://localhost/my_project/image/store_icon.ico">
	<link rel="shortcut icon" href="http://localhost/my_project/image/store_icon.ico" />
<title>All Album List | Music Store</title>
	<link rel="stylesheet" href="../style/style.css" media="screen" />

</head>

<body>
	<div align="center" id="main_wrapper">
   		
        <div id="content">
        
          
              <div align="left" style="margin-left:24px; margin-right: 24px;";>
              <div align="right" style="margin-right:32px;margin-top: 13px";>
          
          </div>
                <h2 align="center">All Enquiry List</h2>
                <table width="100%" border="0" cellpadding="6" >
                <tr style="color:#FFF;" bgcolor="#367999">
                  <td width="2%"><strong>ID</strong></td>
                  <td width="15%"><strong>Name</strong></td>
                  <td width="15%"><strong>Phone No.</strong></td>
                  <td width="20%"><strong>email</strong></td>
                  <td width="12%"><strong>Arrival Date</strong></td>
                  <td width="14%"><strong>Departure Date</strong></td>
				  <td width="15%"><strong>destination</strong></td>
				  <td width="8%"><strong>Maximum Budget</strong></td>
				  <td width="8%"><strong>Minimum Budget</strong></td>
				  <td width="8%"><strong>Accommodation type</strong></td>
                </tr>
                <?php echo $enquiry_list; ?>
               </table><br />
              </div>
        
              	
        </div>
     
        
    </div>
</body>
</html>

