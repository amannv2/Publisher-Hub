<?php 
if($_COOKIE['chk']==1)
{
    $addr="about-user.php";
}
else
{
    $addr="about-pub.php";
}
 ?><!-- === BEGIN HEADER === -->
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <head>
        <!-- Title -->
        <title>Publisher Hub</title>
        <!-- Meta -->
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <!-- Favicon -->
        <link rel="shortcut icon" href="favicon.png" type="image/png" sizes="32x32">
        
        <!-- Bootstrap Core CSS -->
        <link rel="stylesheet" href="assets/css/bootstrap.css" rel="stylesheet">
        <!-- Template CSS -->
        <link rel="stylesheet" href="assets/css/animate.css" rel="stylesheet">
        <link rel="stylesheet" href="assets/css/tb.css" rel="stylesheet">                
        <link rel="stylesheet" href="assets/css/font-awesome.css" rel="stylesheet">
        <link rel="stylesheet" href="assets/css/up.css" rel="stylesheet">
        <link rel="stylesheet" href="assets/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="assets/css/nexus.css" rel="stylesheet">
        <link rel="stylesheet" href="assets/css/responsive.css" rel="stylesheet">
        <link rel="stylesheet" href="assets/css/custom.css" rel="stylesheet">        
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.2/css/bootstrap-select.min.css" />
        <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.2/js/bootstrap-select.min.js"></script>

        
        <!-- Google Fonts-->
        <link href="http://fonts.googleapis.com/css?family=Raleway:100,300,400" type="text/css" rel="stylesheet">
        <link href="http://fonts.googleapis.com/css?family=Roboto:400,300" type="text/css" rel="stylesheet">
    </head>
    <body>
        
        <!-- Header -->
        <div id="header" style="background-position: 50% 0%; <br />
<b>Notice</b>:  Undefined variable: full_page in <b>C:\xampp\htdocs\bootstrap\html\php\header.php</b> on line <b>46</b><br />
" data-stellar-background-ratio="0.5">
<div class="container">
                <div class="row">
                    <!-- Logo -->
                    <div class="logo">
                        <a href="index.php" title="">
                            <img src="assets/img/logo.png" alt="Logo" />
                        </a>
                    </div>
                    <!-- End Logo -->
                </div>
                <!-- Top Menu -->
                <div id="hornav" class="row text-light">
                    <div class="col-md-12">
                        <div class="text-center visible-lg">
                            <ul id="hornavmenu" class="nav navbar-nav">
                                <li>
                                <a href="index.php" class="fa-home active">Home</a>                                </li>
                                <li><a href="allpublisher.php?sort=n" class="fa-group active">Publishers</a>                                </li>
                                <li><a href="<?php echo "$addr"; ?>" class="fa-user active">My Profile</a>                                </li>
                                <li><a href="allauthors.php" class="fa-group active">Authors</a>
                                <li>
                                    <a href="logout.php" class="fa-key">Logout</a>
                                <li>
                                    <span class="fa-comment ">Contact</span>
                                    <ul>
                                        <li>
                                            <a href="contact.php">Contact Us</a>
                                        </li>
                                        <li>
                                            <a href="about-us.php">About Us</a>
                                        </li>
                                    </ul>
                                </li>
                          </ul>
                      </div>  
                    </div>
                </div>
                <!-- End Top Menu -->
            </div>
        </div>
        <!-- End Header -->
        <!-- === END HEADER === -->