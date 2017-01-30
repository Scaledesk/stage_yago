<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Home Design Ideas</title>

<meta name="viewport" content="width=device-width">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="icon" href="images/favicon.ico" type="image/x-icon" />
<link rel="stylesheet" href="css/style.css" type='text/css' media='all' />
<link rel="stylesheet" href="css/bootstrap.css" type='text/css' media='all' />
<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
<link rel="stylesheet" href="http://fontawesome.io/assets/font-awesome/css/font-awesome.css">
<script src="https://code.jquery.com/jquery-1.8.2.min.js"></script>
 <script src="js/jquery.popupoverlay.js"></script>
</head>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-78475111-1', 'auto');
  ga('send', 'pageview');

</script>
<body>
<?php
   
if(isset($_POST['submit'])){ 

  

$name = $_POST['name1'];
$email = $_POST['email2'];
$phone = $_POST['phone3'];
$city = $_POST['city4'];
$message = $_POST['message5'];
$formcontent=" From: $name \n Phone: $phone \n Email : $email \n City: $city \n Message: $message";
$recipient = "yagotimber@gmail.com";
$subject = "Request Free Design Consultation ";
$mailheader = 'From: info@yagotimber.com' . "\r\n" .
    'Reply-To: '.$email."\r\n" .
    'X-Mailer: PHP/' . phpversion();
mail($recipient, $subject, $formcontent, $mailheader) or die("Error!");
echo "<script>alert('Thank You!.We will get to you asap.')</script>";
}
?>


<div class="calltoaction">
	<a class="fadeandscale_open" href="#fadeandscale"><button>Request Free Design Consultation</button></a>
</div>
<div class="header">
	<div class="container"><div class="logo"><a href="#"><img src="images/Logo.png" /></a></div></div>
</div>

<div class="main_layout">
	<div class="container">
    	<div class="slider"><img src="images/slider01.jpg" /></div>
        <!--<div class="slider_btn"><a href="Tel:8010255255"><i class="fa fa-phone" aria-hidden="true"></i> Click To Call</a></div>-->
        
        <div class="how_it_works">
        	<h2>How it Works</h2>
            <ul>
            	<li><img src="images/icon010.png"/> Book Free Consutation</li>
                <li><img src="images/icon09.png" /> Meet Designer</li>
                <li><img src="images/icon012.png" /> Get 2D/3D Design</li>
                <li><img src="images/icon07.png" /> Get Boq/Place Order</li>
                <li><img src="images/icon08.png" /> Execution</li>
                <li><img src="images/icon011.png" /> Hand Over</li>
            </ul>
        </div>
        
        <div class="product">
        	<h2>Design Ideas</h2>
            <ul>
            	<li class="col-md-6 col-sm-6 col-xs-12"><a href="http://www.yagotimber.com/bedroom-interior-design-ideas"><img src="images/image01.jpg" /></a></li>
                <li class="col-md-6 col-sm-6 col-xs-12"><a href="http://www.yagotimber.com/living-room-interior-design-ideas"><img src="images/image02.jpg" /></a></li>
                <li class="col-md-6 col-sm-6 col-xs-12"><a href="http://www.yagotimber.com/dining-room-interior-design-ideas"><img src="images/image03.jpg" /></a></li>
                <li class="col-md-6 col-sm-6 col-xs-12"><a href="http://www.yagotimber.com/kitchen-interior-design-ideas"><img src="images/image04.jpg"/></a></li>
            </ul>
        </div>
        
        
        <div class="how_it_works">
        	<h2>Why Yago</h2>
            <ul>
            	<li><img src="images/icon06.png" /> Free Consultation</li>
                <li><img src="images/icon05.png"/> One Stop Solution</li>
                <li><img src="images/icon02.png" /> Online Furniture</li>
                <li><img src="images/icon04.png" /> Personalized Service</li>
                <li><img src="images/icon01.png" /> Affordable Price</li>
                <li><img src="images/icon03.png" /> Sitback & Relax</li>
            </ul>
        </div>
        
        <div class="product">
        	<h2>Delivered Projects </h2>
            <div class="col-md-4 col-sm-4 col-xs-12">
            	<div class="testi1">
<div class="testi1_img"><img alt="" src="http://www.yagotimber.com/skin/frontend/rwd/yagotimber/images/desig003.jpg"></div>
<div class="testi1_text">
<h2><span>Vikas Arora</span></h2>
<p>I never thought getting home interiors done can be so easy. Yagotimber made it so hassale free for us. Undoubtedly best online interior designing company.</p>
</div>
</div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12">
<div class="testi1">
<div class="testi1_img"><img alt="" src="http://www.yagotimber.com/skin/frontend/rwd/yagotimber/images/desig002.jpg"></div>
<div class="testi1_text">
<h2><span>Priya Rai</span></h2>
<p>Yagotimber completed my 2 bhk apartment in just 30 days. Amazing team coordination. Keep it up guys!</p>
</div>
</div>
</div>
<div class="col-md-4 col-sm-4 col-xs-12">
<div class="testi1">
<div class="testi1_img"><img alt="" src="images/inter01.jpg"></div>
<div class="testi1_text">
<h2><span>Rahul Singh</span></h2>
<p>I got my villa designed and executed by Yagotimber. The designing team of this company is simply out of this world. The quality delivered by these guys is Unparallel. </p>
</div>
</div>
</div>
        </div>
        
        <div class="footer">
        	<ul>
            	<li><a href="http://www.yagotimber.com/company-profile/">Company Profile</a></li>
            </ul>
            <p>@ 2016 Yagotimber.com All rights reserved</p>
        </div>
        
        
    </div>
</div>


<!-- Fade & scale -->

<div id="fadeandscale" class="well">
<form action="" method="POST">
 	<div class="fadeandscale_close"><img src="images/close.png" /></div>
    <input required="required" type="text" placeholder="Name" class="name01"  name="name1" />
    <input required="required" type="text" placeholder="Email" class="email01"  name="email2"/>
    <input required="required" type="text" placeholder="Mobile" class="mobile01" name="phone3" />
    <input required="required" type="text" placeholder="City" class="city01" name="city4"/>
    <textarea placeholder="Tell us Your Requirment" class="text01" name="message5" ></textarea>
    <input type="submit" name="submit" value="Send" />
    <div class="action-call">You can also call us on <br /><img alt="Phone" src="images/phone036.png"> <b><a href="tel:8010255255">8010 255 255</a></b></div>
   </form> 
</div>



<script>
$(document).ready(function () {

    $('#fadeandscale').popup({
        pagecontainer: '.container',
        transition: 'all 0.3s'
    });

});
</script>

<style>
#fadeandscale {
    -webkit-transform: scale(0.8);
       -moz-transform: scale(0.8);
        -ms-transform: scale(0.8);
            transform: scale(0.8);
}
.popup_visible #fadeandscale {
    -webkit-transform: scale(1);
       -moz-transform: scale(1);
        -ms-transform: scale(1);
            transform: scale(1);
}
</style>

</body>
</html>
