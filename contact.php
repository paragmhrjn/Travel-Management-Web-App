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
		<a href="login.html" style="float:right; color:#999999;">Login/Register</a>
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
   											<li><a href="package.html">Travel Package</a></li>
   											<li><a href="gallery.html">Gallery</a></li>
   											<li class="active"><a href="contact.php">Contact Us</a></li>
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
                    <h3 style="color:#999999">Find Us Here</h3>
			    	 		<div class="map">
					   			<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3532.2392368979276!2d85.3131643!3d27.7098988!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb18fe16ab3d19%3A0x2c7fd006b39d8d93!2sByayaam+Galli%2C+Kathmandu+44600%2C+Nepal!5e0!3m2!1sen!2s!4v1407253734037" width="100%" height="210" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" style="border:4px solid #fff; border-radius:4px;"></iframe><br><small><a href="https://www.google.com/maps/place/Byayaam+Galli,+Kathmandu+44600,+Nepal/@27.7098988,85.3131643,17z/data=!3m1!4b1!4m2!3m1!1s0x39eb18fe16ab3d19:0x2c7fd006b39d8d93" style="color:#666;text-align:left;font-size:0.85em">View Larger Map</a></small>
                	</div>
					<div class="row">
					<div class="contactFrom group">
				<div class="address">
					<h2>Address</h2>
					<p>Travel <br>

Byayaam Galli<br>
Kathmandu, Nepal
</p>
<p class="no">
Phone : +977 (1) 123 456<br>
Mobile: +977 (0) 1234 567 890
</p>				<!--<img src="files/resources/Site.qr_image.png" alt="" />	-->		</div>
<?php
$action=$_REQUEST['action'];
if ($action=="")
	{
	?>
				<div class="form">
					<h2>Contact Us</h2>
					<form action="" id="contactform" name="contactForm" class="contactForm" method="post" accept-charset="utf-8">
					<input type="hidden" name="action" value="submit"/>
										<label for="name">Name (<span>required</span>) </label>
						<input type="text" name="name" id="name" class="required">
						<label>Email (<span>required</span>)</label>
						<input type="text" name="email" id="email" class="required email">
						<label>Subject (<span>required</span>)</label>
						<input type="text" name="subject" id="subject" class="required">
						<label>Message (<span>required</span>)</label>
						<textarea name="message" id="message" class="required"></textarea>
						
						<input type="submit" class="submit" value="send email">
					</form>
				</div>
				 <?php 
    }  
else                /* send the submitted data */ 
    { 
    $name=$_REQUEST['name']; 
    $email=$_REQUEST['email'];
	$subject=$_REQUEST['subject'];  
    $message=$_REQUEST['message']; 
    if (($name=="")||($email=="")||($message=="")) 
        { 
		echo '<script type="text/javascript">alert("All fields are required, please fill the form again.");window.location.href = "http://localhost/11/contact.php";</script>';
        } 
    else{         
        $from="From: $name<$email>\r\nReturn-path: $email"; 
        //$subject="Message sent using your contact form"; 
        mail("parajmhrjn@gmail.com", $subject, $message, $from); 
        echo "Email sent!"; 
        } 
    }   
?>	
			</div>	
			<script>
	$(function(){
		$.validator.messages.required = "";
		$('form#contactform').validate();
	});
</script></div>			
					
					</div>
 	<!--End of container-->
	<div class="scroll-top-wrapper ">
    <span class="scroll-top-inner">
        <p>Top</p>
    </span>
</div>
<script>
 
$(function(){
 
    $(document).on( 'scroll', function(){
 
        if ($(window).scrollTop() > 100) {
            $('.scroll-top-wrapper').addClass('show');
        } else {
            $('.scroll-top-wrapper').removeClass('show');
        }
    });
});
</script>
<script>
 
$(function(){
 
    $(document).on( 'scroll', function(){
 
        if ($(window).scrollTop() > 100) {
            $('.scroll-top-wrapper').addClass('show');
        } else {
            $('.scroll-top-wrapper').removeClass('show');
        }
    });
 
    $('.scroll-top-wrapper').on('click', scrollToTop);
});
 
function scrollToTop() {
    verticalOffset = typeof(verticalOffset) != 'undefined' ? verticalOffset : 0;
    element = $('body');
    offset = element.offset();
    offsetTop = offset.top;
    $('html, body').animate({scrollTop: offsetTop}, 500, 'linear');
}
</script>
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
   											<li><a href="package.html">Travel Package</a></li>
   											<li><a href="#">Gallery</a></li>
   											<li style="border-right: 0px solid #aea68c;"><a href="contactUS.html">Contact Us</a></li>
									</ul>
                                   <center> <a href="#">
								<div id="logo" style="float:none;">
            						<img src="images/logo2.png" style="margin-top:15px;"/>
                				</div></a></center>
                                    <p>Copyright © Travel 2014. All Rights Reserved<</p>
                                    </center>
        				</div>
                        
                        
    </div>
    <!--End of footer-->
</div>
</body>
</html>
