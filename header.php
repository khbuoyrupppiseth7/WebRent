<?php
	session_start();
	if($_SESSION['checksession'] !='2015'){
	//if(!$_SESSION['user'] || $_SESSION['ComID'] != 1){
		header('location:login.php');
	}
	include('connectionclass/connect.php');
	include('connectionclass/function.php');
	include('connectionclass/metencrypt.php');
	$db=new MyConnection();
	$db->connect();
	mysql_query("SET NAMES 'UTF8'");
	
	$U_id = $_SESSION['UserID'];
	$U_Acc = $_SESSION['user'];
	//$ip=$_SERVER['REMOTE_ADDR'];
	$ip= '192.168.1.1';
	$sarchprd = get('sarchprd');
	//$CompanyIdUser=get('ComID');
	//$_SESSION['CompanyID']=$CompanyIdUser;
	$getComIDUser=$_SESSION['CompanyID'];
	
?>

	
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>AdminLTE | Dashboard</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="//code.ionicframework.com/ionicons/1.5.2/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Morris chart -->
        <link href="css/morris/morris.css" rel="stylesheet" type="text/css" />
        <!-- jvectormap -->
        <link href="css/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
        <!-- Date Picker -->
        <link href="css/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
        <!-- Daterange picker -->
        <link href="css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
        <!-- bootstrap wysihtml5 - text editor -->
        <link href="css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="http://www.formmail-maker.com/var/demo/jquery-popup-form/colorbox.css" />
        <script src="js/jquery1.10.js"></script>
        <script src="js/inputonlynumber.js" type="text/javascript" ></script>
		<script src="js/jquery.colorbox.js"></script>
		
		
		<script>
			$(document).ready(function(){
				//Examples of how to assign the Colorbox event to elements
				$(".iframe_Changepwd").colorbox({iframe:true, width:"500px",scrolling: false, height:"300px", onClosed:function(){ location.reload(true); }});
				$(".iframe").colorbox({iframe:true, width:"600px",scrolling: false, height:"730px", onClosed:function(){ location.reload(true); }});
				$(".iframe_meduim").colorbox({iframe:true, width:"550px",scrolling: false, height:"900px", onClosed:function(){ location.reload(true); }});
				$(".aboutus").colorbox({iframe:true, width:"85%", height:"80%", onClosed:function(){ location.reload(true); }});
				$(".iframelong").colorbox({iframe:true, width:"550px",scrolling: false, height:"1800px", onClosed:function(){ location.reload(true); }});
				//$(".iframe").colorbox({iframe:true, width:"70%", height:"80%", onClosed:function(){ location.reload(true); }});
				<!-- Form Change Password of User -->
				
				$(".changepwd").colorbox({iframe:true, width:"85%", height:"60%"});
				//Example of preserving a JavaScript event for inline calls.
				$("#click").click(function(){ 
					$('#click').css({"background-color":"#f00", "color":"#fff", "cursor":"inherit"}).text("Open this window again and this message will still be here.");
					return false;
				});
			});
		</script>
		<script type="text/javascript">
			// Make ColorBox responsive
			jQuery.colorbox.settings.maxWidth  = '95%';
			jQuery.colorbox.settings.maxHeight = '2000px';

			// ColorBox resize function
			var resizeTimer;
			function resizeColorBox()
			{
				if (resizeTimer) clearTimeout(resizeTimer);
				resizeTimer = setTimeout(function() {
						if (jQuery('#cboxOverlay').is(':visible')) {
								jQuery.colorbox.load(true);
						}
				}, 300);
			}

			// Resize ColorBox when resizing window or changing mobile device orientation
			jQuery(window).resize(resizeColorBox);
			window.addEventListener("orientationchange", resizeColorBox, false);
		</script>
        
        
      
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
          
        <![endif]-->
    </head>