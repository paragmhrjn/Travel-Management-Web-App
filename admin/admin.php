<?php
ob_start();
session_start();
?>
<?php
if(isset($_POST["username"]) && isset($_POST["password"])) {
$manager=($_POST["username"]);
$password=($_POST["password"]);

include"../script/connect.php";
$sql=mysql_query("SELECT id FROM admin WHERE username='$manager' AND password='$password' LIMIT 1");
$existCount=mysql_num_rows($sql);
if($existCount==1) {
	while($row=mysql_fetch_array($sql)) {
		$id=$row["id"];
		}
	$_SESSION["id"]=$id;
	$_SESSION["manager"]=$manager;
	$_SESSION["password"]=$password;
	header("location:index.php");
	exit();
	} else {
	echo '<script type="text/javascript">alert("Invalid username or password."); window.location.href = "http://localhost/11/admin/index.php";</script>';
	exit();
	}
}
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>travel</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link rel="shortcut icon" href="../images/fav.png" />
<style type="text/css">
body{
	 background-image:url(../images/new_01.png);
	 font:bold 12px Arial, Helvetica, sans-serif;
	 margin:0;
	 padding:0;
	 min-width:960px;
	 color:#bbbbbb; 
}

a { 
	text-decoration:none; 
	color:#00c6ff;
}

h1 {
	font: 4em normal Arial, Helvetica, sans-serif;
	padding: 20px;	margin: 0;
	text-align:center;
}

h1 small{
	font: 0.2em normal  Arial, Helvetica, sans-serif;
	text-transform:uppercase; letter-spacing: 0.2em; line-height: 5em;
	display: block;
}

h2 {
    color:#bbb;
    font-size:3em;
	text-align:center;
	text-shadow:0 1px 3px #161616;
}

.container {width: 960px; margin: 0 auto; overflow: hidden;}

#content {	float: left; width: 100%; margin-top:20px;}

.post { margin: 0 auto; padding-bottom: 50px; float: left; width: 960px; }

.btn-sign {
	width:240px;
	margin-bottom:20px;
	margin:0 auto;
	padding:20px;
	border-radius:10px;
	background: -moz-linear-gradient(center top, #00c6ff, #018eb6);
    background: -webkit-gradient(linear, left top, left bottom, from(#00c6ff), to(#018eb6));
	background:  -o-linear-gradient(top, #00c6ff, #018eb6);
    filter: progid:DXImageTransform.Microsoft.gradient(startColorStr='#00c6ff', EndColorStr='#018eb6');
	text-align:center;
	font-size:36px;
	color:#fff;
	text-transform:uppercase;
}

.btn-sign a { color:#fff; text-shadow:0 1px 2px #161616; }

#mask {
	display: none;
	background: #000; 
	position: fixed; left: 0; top: 0; 
	z-index: 10;
	width: 100%; height: 100%;
	opacity: 0.8;
	z-index: 999;
}

.login-popup{width:300px; 
	display:none;
	background: #333;
	padding: 10px; 	
	border: 2px solid #ddd;
	float: left;
	font-size: 1.2em;
	position: fixed;
	top: 50%; left: 50%;
	z-index: 99999;
	box-shadow: 0px 0px 20px #999;
	-moz-box-shadow: 0px 0px 20px #999; /* Firefox */
    -webkit-box-shadow: 0px 0px 20px #999; /* Safari, Chrome */
	border-radius:3px 3px 3px 3px;
    -moz-border-radius: 3px; /* Firefox */
    -webkit-border-radius: 3px; /* Safari, Chrome */
}

img.btn_close {
	float: right; 
	margin: -28px -28px 0 0;
}

fieldset { 
	border:none; 
}

form.signin .textbox label { 
	display:block; 
	padding-bottom:7px; 
}

form.signin .textbox span { 
	display:block;
}

form.signin p, form.signin span { 
	color:#999; 
	font-size:15px; 
	line-height:18px;
} 

form.signin .textbox input { 
	background:#666666; 
	border-bottom:1px solid #333;
	border-left:1px solid #000;
	border-right:1px solid #333;
	border-top:1px solid #000;
	color:#fff; 
	border-radius: 3px 3px 3px 3px;
	-moz-border-radius: 3px;
    -webkit-border-radius: 3px;
	font:13px Arial, Helvetica, sans-serif;
	padding:6px 6px 4px;
	width:260px;
}

form.signin input:-moz-placeholder { color:#bbb; text-shadow:0 0 2px #000; }
form.signin input::-webkit-input-placeholder { color:#bbb; text-shadow:0 0 2px #000;  }

.button { 
	background: -moz-linear-gradient(center top, #f3f3f3, #dddddd);
	background: -webkit-gradient(linear, left top, left bottom, from(#f3f3f3), to(#dddddd));
	background:  -o-linear-gradient(top, #f3f3f3, #dddddd);
    filter: progid:DXImageTransform.Microsoft.gradient(startColorStr='#f3f3f3', EndColorStr='#dddddd');
	border-color:#000; 
	border-width:1px;
	border-radius:4px 4px 4px 4px;
	-moz-border-radius: 4px;
    -webkit-border-radius: 4px;
	color:#333;
	cursor:pointer;
	display:inline-block;
	padding:6px 6px 4px;
	margin-top:10px;
	font:12px; 
	
}

.button:hover { background:#ddd; }

</style>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('a.login-window').click(function() {
		
		// Getting the variable's value from a link 
		var loginBox = $(this).attr('href');

		//Fade in the Popup and add close button
		$(loginBox).fadeIn(300);
		
		//Set the center alignment padding + border
		var popMargTop = ($(loginBox).height() + 30) / 2; 
		var popMargLeft = ($(loginBox).width() + 30) / 2; 
		
		$(loginBox).css({ 
			'margin-top' : -popMargTop,
			'margin-left' : -popMargLeft
		});
		
		// Add the mask to body
		$('body').append('<div id="mask"></div>');
		$('#mask').fadeIn(300);
		
		return false;
	});
	
	// When clicking on the button close or the mask layer the popup closed
	$('a.close, #mask').live('click', function() { 
	  $('#mask , .login-popup').fadeOut(300 , function() {
		$('#mask').remove();  
	}); 
	return false;
	});
});
</script>

</head>
<body>
<div class="header_wrapper" style="background-image:url(../images/menu_02.png); height:92px;">
        <div class="container" >
      							<a href="#">
								<div id="logo">
            					<center>	<img src="../images/logo1.png" style="margin-top:15px;"/></center>
                				</div></a>
                        </div>
            	</div>
<div class="container">
<h1>Welcome to Travel!!!</h1>
	<div id="content" >
    
		<div class="post">
        	<div class="btn-sign">
				<a href="#login-box" class="login-window">Admin Login</a>
        	</div>
		</div>
        
        <div id="login-box" class="login-popup">
        <a href="#" class="close"><img src="../images/close_pop.png" class="btn_close" title="Close Window" alt="Close" /></a>
          <form method="post" class="signin" action="admin.php">
                <fieldset class="textbox">
            	<label class="username">
                <span>Username or email</span>
                <input id="username" name="username" value="" type="text" autocomplete="on" placeholder="Username">
                </label>
                
                <label class="password">
                <span>Password</span>
                <input id="password" name="password" value="" type="password" placeholder="Password">
                </label>
                
                <button class="submit button" type="submit">Sign in</button>
                
                </fieldset>
          </form>
		</div>
    
    </div>
</div>

</body>
</html>