<?php
ob_start();
session_start();
?>
<?php

	if(isset($_POST["email"]) && isset($_POST["password"])) {
		$email=($_POST["email"]);
		$password=($_POST["password"]);
		
		include"script/connect.php";
		$sql=mysql_query("SELECT id FROM user WHERE email='$email' AND password='$password' LIMIT 1");
		$existCount=mysql_num_rows($sql);
			if($existCount==1) {
				while($row=mysql_fetch_array($sql)) {
					$id=$row["id"];
				}
				$_SESSION["id"]=$id;
				$_SESSION["email"]=$email;
				$_SESSION["password"]=$password;
				header("location:test.php");
				exit();
			} else {
				echo '<script type="text/javascript">alert("Invalid username or password."); window.location.href = "http://localhost/11/test.php";</script>';
				echo
				exit();
				}
	}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>travel</title>
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
   <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
   <!--Required libraries-->
    <script src="js/min/jquery-v1.10.2.min.js" type="text/javascript"></script>
    <script src="js/min/modernizr-custom-v2.7.1.min.js" type="text/javascript"></script>
    <script src="js/min/jquery-finger-v0.1.0.min.js" type="text/javascript"></script>
    <script src="js/script.js" type="text/javascript"></script>
    <script src="js/collapse.js" type="text/javascript"></script>
</head>

<body>
<div class="wrapper">
    <div class="clear"></div>
    <!--Start of header-->
	<div class="container" style="margin-top:0px;">
	<div class="row" style="float:right;">
		<a href="login.php" style=" color:#999999;">Login</a> &nbsp;|&nbsp;
		<a href="register.php" style=" color:#999999;">Register</a>
		</div>
		</div>
    	<div class="header_wrapper">
        <div class="container"style="margin-top:0px;">
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
   											<li><a href="package.html" class="active">Travel Package</a></li>
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
                	<div class="row" style="padding-left:300px;">
					<h3 style="margin-left:25px">Account</h3>
					 <div class="col-md-8">
		<div class="login-form">
			<h2>Login</h2>
			<form action="login.php" name="loginForm" id="LoginSignupForm" method="post" accept-charset="utf-8"><div style="display:none;"><input type="hidden" name="_method" value="POST"/></div>				<div class="input text"><input name="email" class="username" placeholder="Email" type="text" id="LoginEmail"/></div>				<div class="input password"><input name="password" class="password" placeholder="Password" type="password" id="LoginPassword"/></div>				<input type="submit" name="login" value="Login" class="login-wrapper">
        <img src="img/load.gif" id="loginLoad" alt="" />				
			</form>
		</div>
		</div>
	
	</div>
</div>

<script type="text/javascript">
$(function(){
  $('div#flashMessage').hide();
  $('img#loginLoad').hide();
	$('form#LoginSignupForm').live('submit',function(){
   var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
   if($('input[name=email]').val() != '' && $('input[name=password]').val() != '' && reg.test(document.loginForm.email.value) == true){
    var data = $('form#LoginSignupForm').serializeArray();
    $("form#LoginSignupForm :input").attr("disabled", true);
    //$('p.ac_holder').fadeIn('1000');
    $(window).bind('beforeunload', function(){
     return 'Your are being logged in. \n Please wait for while...';
    });
    var url = $(this).attr('action');
    $.ajax({
     url: url,
     type: 'post',
     data: data,
     dataType: 'json',
     success: function(json) {
      if (json['success']) {
      	window.onbeforeunload = null;
        window.location.replace(json['back']);
       
      }
      if (json['error']) {
       //$('p.ac_holder').fadeOut('2000');
       $('div#flashMessage').show();
       $('div#flashMessage').html(json['error']);
       $("form#LoginSignupForm :input").attr("disabled", false);
       window.onbeforeunload = null;
      } 
     }
    });
   $('img#loginLoad').show();
   
    return false;
   }
   $('div#flashMessage').show();
   $('img#loginLoad').hide();
   $('div#flashMessage').html('Please provide the required information for the login.');
   return false;
  });
})
</script>
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
                                    <p>Copyright � Travel 2014. All Rights Reserved</p>
                                    </center>
        				</div>
                        
                        
    </div>
    <!--End of footer-->
</div>
</body>
</html>
