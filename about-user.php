<?php 
session_start();ob_start();
include_once 'functions.php';

if(validate()==true)
        {   
          include_once'header-log.php';
          $u = decrypt($_COOKIE['SLA'],$key);
          $p = decrypt($_COOKIE['SLB'],$key);
          
        }
        else
        {
header("location:login.php");}

    $db_hostname = 'localhost';
    $db_username = 'root';
    $db_password = '';
    $db_database = 'publisherhub';
    
    // Database Connection String
    $con = mysql_connect($db_hostname,$db_username,$db_password);
    if (!$con)
      {
      die('Could not connect: ' . mysql_error());
    }
    mysql_select_db($db_database, $con); 
    
    
    
    $sql="select * from authors where email ='".$_COOKIE['SLZ']."'";
	$query = mysql_query($sql);
	$row= mysql_fetch_array($query);
    $count= mysql_num_rows($query);
  //  echo $row['id'].$count;
    $us=$row['fname']." ".$row['lname'];
    setcookie("usr",$us,time()+365*24*60*60);
ob_end_flush();
?>
        <!-- === BEGIN CONTENT === -->
        <div id="content">
            <div class="container background-white">
                <div class="row margin-vert-30">
                    <div class="col-md-12">
                        <h2 class="margin-bottom-20">My Profile</h2>
                        <br /><div class="row">
                            <div class="col-md-4 animate fadeIn">
                                <div class="portfolio-item">
                                        <figure class="animate fadeInLeft">
                                            <div class="grid-image">
                                                <div class="featured-info">
                                                    <div class="info-wrapper">
                                                        <h3><?php echo 'Hello '.$row['fname'] ?></h3>
                                                       <a href="changeauthlogo.php">Change your Logo</a>
                                                    </div>
                                                </div>
                                              <?php echo "<img src='uploads/allauths/".$row['dp']."' style='height: 289px; width: 520px;'>"  ; ?>
                                             </div>
                                        </figure>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-8 margin-bottom-10 animate fadeInRight">
                                <h3 class="padding-top-10 pull-left"><b><?php echo $row['fname']." ".$row['lname'] ?></b>
                                    <small>- Author</small>
                                </h3>
                                <div class="clearfix"></div>
                                <h4>
                                    <em><?php echo $row['adesc'] ?></em>
                                </h4>
                                <p>Contact Info:</p>
                                <p>Phone no. :  <?php echo $row['phone'] ?></p>
                                <p>E-mail    :  <?php echo $row['email']; ?></p>
                                <p>Address   :  <?php echo $row['addr'] ?></p>
                                <p>Field     :  <?php echo $row['fld'] ?></p>
                                </div>
                        </div>
                        <br/> 
                        <button type="submit" name="submit" style=" font-size: large;" onClick="window.location.href='about-user-edit.php'" class="btn btn-aqua">
                            <i class="fa fa-3x fa-fw fa-edit"></i>Edit Profile</button>
                        
                        <button type="button" style="float: right; font-size: large;" onClick="window.location.href='history.php'" class="btn btn-blue">
                            <i class="fa fa-3x fa-fw fa-history"></i>History</button>
                            <br /> <br /> 
                    </div>
                </div>
            </div>
        </div>
        <!-- Return to Top -->
<a href="javascript:" id="return-to-top"><i class="icon-chevron-up"></i></a>


<!-- ICON NEEDS FONT AWESOME FOR CHEVRON UP ICON -->
<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
 
        <!-- === END CONTENT === -->
        <?php include_once'footer.php';?>