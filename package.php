<?php
// select query to display 5 albums
// connect to database
include"/script/connect.php";
$dynamicList="";
$sql=mysql_query("SELECT * FROM packages WHERE sub_category="Annapurna Region");
$albumCount=mysql_num_rows($sql);
if($albumCount>0) {
		while($row=mysql_fetch_array($sql)) {
		$id=$row["id"];
		$package_name=$row["package_name"];
		$package_information=$row["package_information"];
		$price=$row["price"];
		$release_year=$row["release_year"];
		$date_added=strftime("%b %d %Y", strtotime($row["date_added"]));
		
		setlocale(LC_MONETARY, "en_US");
		$price=number_format("$price", 2);
		
		$dynamicList.='<table width="100%" border="0" cellpadding="6" style="padding-bottom: 20px;">
        <tr>
          <td width="21%" valign="top"><a href="album.php?id='. $id . '"><img style="border:#CCC 1px solid" src="image/album_art/'. $id . '.jpg" width="127" height="131" alt="'. $album_name . '" border="1" /></a></td>
          <td width="79%"><strong>Album:</strong> '. $album_name . '<br />
          <strong> Artist:</strong> '. $album_artist . '<br />
		   <strong>Release Year:</strong> '. $release_year . '<br />
		   <strong>Price:</strong> $'. $price . '
            <table><tr><td><a href="album.php?id='. $id . '"><img src="image/details.gif" /></a></td>
			<td><form id="form1" method="post" action="cart.php">
			  <input type="hidden" name="aid" id="aid" value="'.$id.'" />
			  <input type="submit" value name="add_to_cart" class="add_to_cart" style="height: 30px; width: 40px; margin-left: 15px;" />
			  </form></td></tr><br />
			</table></td>
        </tr>
      </table>';
		}
	} else {
	$dynamicList="We have no album listed in our store yet.";
	}
	mysql_close();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Travel</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link rel="shortcut icon" href="images/fav.png" />
  <!-- Bootstrap -->
      <link rel="stylesheet" type="text/css" href="css/reset.css">
		<script src="js/bootstrap.min.js"></script>
    		<script src="js/jquery.min.js"></script>
     <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media 
         queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page 
         via file:// -->
      <!--[if lt IE 9]>
         <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/
            html5shiv.js"></script>
         <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/
            respond.min.js"></script>
      <![endif]-->
   <link rel="stylesheet" type="text/css" href="css/style.css">
   
   <!--Required libraries-->
    <script src="js/min/jquery-v1.10.2.min.js" type="text/javascript"></script>
    <script src="js/min/modernizr-custom-v2.7.1.min.js" type="text/javascript"></script>
    <script src="js/min/jquery-finger-v0.1.0.min.js" type="text/javascript"></script>
    <script src="js/script.js" type="text/javascript"></script>
    <script src="js/collapse.js" type="text/javascript"></script>
<script src="js/tab.js" type="text/javascript"></script>
<script src="js/dropdown.js" type="text/javascript"></script><link rel="stylesheet" type="text/css" href="css/bootstrap.min (2).css">
</head>

<body>
<div class="wrapper">
    <div class="clear"></div>
    <!--Start of header-->
	<div class="container" style="margin-top:0px;">
	<div class="row">
		<a href="login.html" style="float:right; color:#999999;"> Login/Register</a>
		</div>
		</div>
    	<div class="header_wrapper">
        <div class="container" style="margin-top:0px;">
        	<div id="header">
            	
               <nav class="navbar navbar-default navbar-static-top" role="navigation">
   							<div class="navbar-header">
   								<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#example-navbar-collapse">
         									<span class="sr-only">Toggle navigation</span>
         									<span class="icon-bar"></span>
         									<span class="icon-bar"></span>
         									<span class="icon-bar"></span>
      							</button>
      							<a class="navbar-brand" href="#">
								<div id="logo">
            						<img src="images/logo2.png" style="margin-top:15px; float:left;"/>
                				</div></a>
   							</div>
   							<div class="collapse navbar-collapse" id="example-navbar-collapse">
									<ul class="nav navbar-nav">
   											<li><a href="index.html" target="_self" >Home</a></li>
   											<li><a href="info.html" target="_self">Nepal Information</a></li>
   											<li class="active"><a href="package.html" class="active">Travel Package</a></li>
   											<li><a href="#">Gallery</a></li>
   											<li><a href="contactUS.html">Contact Us</a></li>
									</ul>

   					</div>
				</nav>
                        </div>
                        </div>
            	</div>
	
	<!--End of Header-->
    
     <!--Start of Body-->
    <div class="bodywraper">
    <!--Start of Container-->
    			<div class="container">
                	<div class="row">
                    <ul id="myTab" class="nav nav-tabs" style="background-color:rgba(54, 121, 153, 0.09);">
   <li class="active">
      <a href="#trek" data-toggle="tab">
         Trekking
      </a>
   </li>
   <li><a href="#pick" data-toggle="tab">Pick Climbing</a></li>
  <li><a href="#Res" data-toggle="tab">Restricted Area</a></li>
  <li><a href="#Safari" data-toggle="tab">Safari</a></li>
  <li><a href="#Rafting" data-toggle="tab">Rafting</a></li>
  <li><a href="#Other" data-toggle="tab">Enquiry</a></li>
</ul>
<div id="myTabContent" class="tab-content">
   <div class="tab-pane fade in active" id="trek">
   <div class="jumbotron" style="border: 1px #CAC1C1 solid; padding:15px; margin-top:7px;">
  <div class="block">
   <h3 style="text-transform: uppercase;color: #888585;margin-bottom: 12px;text-decoration: underline;margin-left: 10px;font-size:1.5em;"> Annapurna Region</h3>
   <ul class="group">
   <li class="col-md-6">
						<div class="media">
						<a class="pull-left" href="#"><img src="images/products/123.jpg" alt="" />	</a>					<p><h3>Annapurna Circuit Trek</h3>
						
	This trek circumnavigates the entire Annapurna massif from&nbsp;Dumre, through Manang, over...	<br />		<br />		
		<span class="label label-default" style="border-radius:4px; color:#FFFFFF; margin-top:10px; padding:5px;"><a href="#" style="color:#FFFFFF;">Read More >>></a></span>		</p>		</div>	</li>
										<li class="col-md-6">
	<div class="media">					<a class="pull-left" href="#"><img src="images/products/23.jpg" alt="" />	</a>		<p>			<h3>Annapurna Sanctuary Trek </h3>
						
	The massive Annapurna &amp; Dhaulagri Himals dominate Central Nepal, and this route north of...			<br />		<br />		
		<span class="label label-default" style="border-radius:4px; color:#FFFFFF; margin-top:10px; padding:5px;"><a href="#" style="color:#FFFFFF;">Read More >>></a></span></p></div> </li>
										<li class="col-md-6">
				<div class="media">		<a class="pull-left" href="#"><img src="images/products/1.jpg" alt="" /></a>						<p>
				<h3>Dhaulagiri Trek</h3>
						
	There is a long, difficult trek around Dhaulagiri that starts from Beni on the Kali-Gandaki....					<br />		<br />		
		<span class="label label-default" style="border-radius:4px; color:#FFFFFF; margin-top:10px; padding:5px;"><a href="#" style="color:#FFFFFF;">Read More >>></a></span>	</p>		</div>	</li>
										<li class="col-md-6">
<div class="media"><a class="pull-left" href="#"><img src="images/products/7f000001-9923-8844.jpg" alt="" />	</a>			<p>		<h3>Muktinath- Ghorepani Trek</h3>
						
	This is by far the most popular trek in Nepal. It referred to as a highway by people who have...					<br />		<br />		
		<span class="label label-default" style="border-radius:4px; color:#FFFFFF; margin-top:10px; padding:5px;"><a href="#" style="color:#FFFFFF;">Read More >>></a></span></p>	</div>	</li>
   </ul>
   </div>
   <div class="block">
   <h3 style="text-transform: uppercase;color: #888585;margin-bottom: 12px;text-decoration: underline;margin-left: 10px;font-size:1.5em;"> Annapurna Region</h3>
   <ul class="group">
   <li class="col-md-6">
						<div class="media">
						<a class="pull-left" href="#"><img src="images/products/123.jpg" alt="" />	</a>					<p><h3>Annapurna Circuit Trek</h3>
						
	This trek circumnavigates the entire Annapurna massif from&nbsp;Dumre, through Manang, over...	<br />		<br />		
		<span class="label label-default" style="border-radius:4px; color:#FFFFFF; margin-top:10px; padding:5px;"><a href="#" style="color:#FFFFFF;">Read More >>></a></span>		</p>		</div>	</li>
										<li class="col-md-6">
	<div class="media">					<a class="pull-left" href="#"><img src="images/products/23.jpg" alt="" />	</a>		<p>			<h3>Annapurna Sanctuary Trek </h3>
						
	The massive Annapurna &amp; Dhaulagri Himals dominate Central Nepal, and this route north of...			<br />		<br />		
		<span class="label label-default" style="border-radius:4px; color:#FFFFFF; margin-top:10px; padding:5px;"><a href="#" style="color:#FFFFFF;">Read More >>></a></span></p></div> </li>
										<li class="col-md-6">
				<div class="media">		<a class="pull-left" href="#"><img src="images/products/1.jpg" alt="" /></a>						<p>
				<h3>Dhaulagiri Trek</h3>
						
	There is a long, difficult trek around Dhaulagiri that starts from Beni on the Kali-Gandaki....					<br />		<br />		
		<span class="label label-default" style="border-radius:4px; color:#FFFFFF; margin-top:10px; padding:5px;"><a href="#" style="color:#FFFFFF;">Read More >>></a></span>	</p>		</div>	</li>
										<li class="col-md-6">
<div class="media"><a class="pull-left" href="#"><img src="images/products/7f000001-9923-8844.jpg" alt="" />	</a>			<p>		<h3>Muktinath- Ghorepani Trek</h3>
						
	This is by far the most popular trek in Nepal. It referred to as a highway by people who have...					<br />		<br />		
		<span class="label label-default" style="border-radius:4px; color:#FFFFFF; margin-top:10px; padding:5px;"><a href="#" style="color:#FFFFFF;">Read More >>></a></span></p>	</div>	</li>
   </ul>
   </div>
     </div>
   </div>
   <div class="tab-pane fade" id="pick">
      <div class="jumbotron" style="border: 1px #CAC1C1 solid; padding:15px; margin-top:7px;">
	  <div class="block">
   <h3 style="text-transform: uppercase;color: #888585;margin-bottom: 12px;text-decoration: underline;margin-left: 10px;font-size:1.5em;"> Annapurna Region</h3>
   <ul class="group">
   <li class="col-md-6">
						<div class="media">
						<a class="pull-left" href="#"><img src="images/products/123.jpg" alt="" />	</a>					<p><h3>Annapurna Circuit Trek</h3>
						
	This trek circumnavigates the entire Annapurna massif from&nbsp;Dumre, through Manang, over...	<br />		<br />		
		<span class="label label-default" style="border-radius:4px; color:#FFFFFF; margin-top:10px; padding:5px;"><a href="#" style="color:#FFFFFF;">Read More >>></a></span>		</p>		</div>	</li>
										<li class="col-md-6">
	<div class="media">					<a class="pull-left" href="#"><img src="images/products/23.jpg" alt="" />	</a>		<p>			<h3>Annapurna Sanctuary Trek </h3>
						
	The massive Annapurna &amp; Dhaulagri Himals dominate Central Nepal, and this route north of...			<br />		<br />		
		<span class="label label-default" style="border-radius:4px; color:#FFFFFF; margin-top:10px; padding:5px;"><a href="#" style="color:#FFFFFF;">Read More >>></a></span></p></div> </li>
		</ul>
		</div>
     </div>
   </div>
  <div class="tab-pane fade" id="Res">
      <div class="jumbotron" style="border: 1px #CAC1C1 solid; padding:15px; margin-top:7px;">
     </div>
   </div>
   <div class="tab-pane fade" id="Safari">
      <div class="jumbotron" style="border: 1px #CAC1C1 solid; padding:15px; margin-top:7px;">
     </div>
   </div>
   <div class="tab-pane fade" id="Rafting">
      <div class="jumbotron" style="border: 1px #CAC1C1 solid; padding:15px; margin-top:7px;">
     </div>
   </div>
   <div class="tab-pane fade" id="Other">
      <div class="jumbotron" style="border: 1px #CAC1C1 solid; padding:15px; margin-top:7px;">
	  <style type="text/css">
	  .bookFrom .content {
	padding: 15px;
	padding-left: 30px;
	background: rgba(255, 255, 255, 0.45);
}

.bookFrom  .form {
	float: right;
	margin: 4% 95px 0px 0px;
	width: 46%;
}
.bookFrom  form label {
	display: block;
	padding: 5px 0px 3px;
	color: #929292;
	font-weight: bold;
}
.bookFrom  form label span{
	color: #C27780;
	font-weight: normal;
	font-style: italic;
}

.bookFrom  form input, .bookFrom  form textarea,.bookFrom  form select{
	padding: 5px;
	display: block;
	/*background: #CACACA;*/
	border: 1px solid #BEBEBE;
	color: black;
	border-radius: 3px;
	width: 60%;
}
.bookFrom  form select option{
	padding: 5px;
}
.bookFrom  form textarea {
	height: 100px;
}
.bookFrom  form input[type="submit"] { 
	background: #477E97;
	border: 1px solid #35808F;
	text-transform: uppercase;
	font-weight: bold;
	margin-top: 10px;
	font-size: 1em;
	width: 98px;
	color: #C8DDE0;
}

.bookFrom  form input[type="submit"]:hover{
	background-color: #245268;
	border: 1px solid #284A57;
	cursor: pointer;
}

.bookFrom input.error {
	border: 1px dotted #F7111A;
}
.bookFrom label.error {
	display: block;
	width: 100%;
	padding: 0px;
	margin-bottom: 0px;
	font-size: 11px;
	color: #dd8b8b;
}
.input1{
	width: 31.5%;
	float: left;
}

.input1 input{
	width: 90% !important;
}
.input2{
	width: 31.5%;
	float: left;
}

.input2 input{
	width: 90% !important;
}
</style>
	  <div id="container" class="articlePage wrapper group">
	<div class="left">
		<div class="group single">
			<h2>Enquiry</h2>
			<div class="bubble"></div>
		</div>

		<div class="bookFrom">
			<div class="content">
				<form action="#" id="EnquiryAddForm" method="post" accept-charset="utf-8"><div style="display:none;"><input type="hidden" name="_method" value="POST"/></div><label for="EnquiryName">Name</label><input name="data[Enquiry][name]" class="required" maxlength="255" type="text" id="EnquiryName"/><label for="EnquiryPhone">Phone Number</label><input name="data[Enquiry][phone]" class="required" maxlength="255" type="text" id="EnquiryPhone"/><label for="EnquiryEmail">Email</label><input name="data[Enquiry][email]" class="required email" maxlength="255" type="text" id="EnquiryEmail"/><div><div class="input1"><label for="arrivalDate">Arrival Date</label><input name="data[Enquiry][arrival_date]" id="arrivalDate" type="text"/></div><div class="input1"><label for="departureDate">Departure Date</label><input name="data[Enquiry][departure_date]" id="departureDate" type="text"/></div></div><div style="clear:both;"></div><label for="EnquiryProductId">DESTINATION OF INTEREST</label><select name="data[Enquiry][product_id]" id="EnquiryProductId">
<option value="1">Annapurna Circuit Trek</option>
<option value="2">Annapurna Sanctuary Trek (BC)</option>
<option value="3">Around Dhaulagiri Trek</option>
<option value="5">Gokyo-KalaPathar Trek</option>
<option value="9">Muktinath- Ghorepani Trek</option>
<option value="20">Instant Everest Trek</option>
<option value="27">Langtang GosaiKunda Trek</option>
<option value="33">Milke Danda Trek</option>
<option value="34">Makalu Base Camp Trek.</option>
<option value="35">Arun Valley Trek</option>
<option value="36">Manaslu  Larke La pass</option>
<option value="37">Mustang Trek  </option>
<option value="43">KATHMANDU-LHASA-KATHMANDU</option>
<option value="44">MT. KAILASH VIA ZHANGMU OVERLAND TRIP</option>
<option value="45">Mt Kailas Trek  Humla-Simikot</option>
<option value="46">Royal Bardia National Park</option>
<option value="47">Royal Chitwan National Park </option>
<option value="48">Trisuli River</option>
<option value="49">Kaligandaki River</option>
<option value="50">Karnali River</option>
<option value="51">Marshyangdi River</option>
<option value="52">Sunkoshi River</option>
<option value="53">Kanchenjunga Trek</option>
<option value="54">Island Peak Climb 6189m</option>
<option value="55">Lobuche Peak Expedition Trek</option>
</select><div><div class="input2"><div class="input text"><label for="EnquiryMinbudget">Minimum Budget</label><input name="data[Enquiry][minbudget]" type="text" id="EnquiryMinbudget"/></div></div><div class="input2"><div class="input text"><label for="EnquiryMaxbudget">Maximum Budget</label><input name="data[Enquiry][maxbudget]" type="text" id="EnquiryMaxbudget"/></div></div></div><div style="clear:both;"></div><div class="input select"><label for="EnquiryAccommodationTypeId">Accommodation Type</label><select name="data[Enquiry][accommodation_type_id]" id="EnquiryAccommodationTypeId">
<option value="">Select Accommodation Type</option>
<option value="1">Hotel</option>
<option value="2">Lodge</option>
<option value="3">Tent</option>
</select></div><div class="submit"><input  type="submit" value="Submit"/></div></form>			</div>
		</div>
	</div>

     </div>
   </div>
</div>
                	</div>
                	</div>
 	<!--End of container-->
	 </div>
 	<!--End of Body-->
     <!--Start of footer-->
   <div class="footer_wrapper">
	
    	<div class="container" style="margin-top:0px;">
        <div class="row">
        	<div class="col-md-5">
            <h4>We are associated with:</h4>
            <img src="images/sotto.png" style="margin:10px;" />
            <img src="images/nepalipatrika.png" style="margin:10px;"  />
            <img src="images/ntb.png" style="margin:10px;"  />
            </div>
            <div class="col-md-7">
            <div class="aaa" style="width:25.3333%; float:left;">
             <h4 class="media-heading" style="text-decoration:underline; text-align:left; font-weight:bold; margin-left:0px;cursor:pointer;">About Us</h4>
             <ul style="text-align:left; cursor:pointer;">
                        <li><a href="#" >Company</a></li>
                        <li><a href="#" >Our Team</a></li>
                        <li><a href="#" >FAQ</a></li>
                        <li><a href="#" >Transport</a></li>
                        </ul>
            </div>
            <div class="aaa" style="width:41.3333%; float:left;">
            <h4 class="media-heading" style="text-decoration:underline; text-align:left;font-weight:bold; margin-left:0px;cursor:pointer;">Activities</h4>
             <ul style="text-align:left; cursor:pointer; float:left;">
                        <li><a href="#" >Paragliding</a></li>
                        <li><a href="#" >Rafting</a></li>
                        <li><a href="#" >Jungle Safari</a></li>
                        <li><a href="#" >Bungy Jump</a></li>
                        </ul>
                        <ul style="text-align:center; cursor:pointer; ">
                        <li><a href="#" >Mountain Flight</a></li>
                        <li><a href="#" >Ultralight Flight</a></li>
                        <li><a href="#" >Helicoptor Tour</a></li>
                        <li><a href="#" >Mountain Biking</a></li>
                        </ul>
            </div>
            <div class="aaa" style="width:33.3333%; float:right;">
           <h4 class="media-heading" style="text-decoration:underline; text-align:right;font-weight:bold; margin-left:0px;cursor:pointer;">Contact Information</h4>
            <ul style="text-align:right; cursor:pointer; float:right;">
                        <li><a href="#" >P.O.BOX 1234, Kathmandu, Nepal</a></li>
                        <li><a href="#" >Tel : +977-1-123456</a></li>
                        <li><a href="#" >Fax : +977-1-123456</a></li>
                        <li><a href="#" >Email : info@travel.com.np</a></li>
                        </ul>
            </div>
            </div>
    	</div>
        
        	
        
        	</div>
    	</div>
   <div class="row">
        				<div class="col-md-12" style="float:none; clear:both; background:#CCCCCC; background-image:url(images/mountain.png);">
                        
                        <center><ul class="footer_menu">
   											<li><a href="index.html" target="_blank">Home</a></li>
   											<li><a href="info.html">Nepal Information</a></li>
   											<li><a href="#">Travel Package</a></li>
   											<li><a href="#">Gallery</a></li>
   											<li style="border-right: 0px solid #aea68c;"><a href="contactUS.html">Contact Us</a></li>
									</ul>
                                   <center> <a href="#">
								<div id="logo" style="float:none;">
            						<img src="images/logo2.png" style="margin-top:15px;"/>
                				</div></a></center>
                                    <p>Copyright © Travel 2014. All Rights Reserved</p>
                                    </center>
        				</div>
                        
                        
    </div>
    <!--End of footer-->
</div>
</body>
</html>
