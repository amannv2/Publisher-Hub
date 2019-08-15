<?php 
session_start();
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
    
    
    $ua=$u;
    $sql="select * from publisher where pemail ='".$_COOKIE['SLZ']."'";
	$query = mysql_query($sql);
	$row= mysql_fetch_array($query);
    $count= mysql_num_rows($query);
  //  echo $row['id'].$count;
    
?>
        <!-- === BEGIN CONTENT === -->
        <div id="content">
            <div class="container background-white">
                <div class="row margin-vert-30">
                    <div class="col-md-12">
                       <h2 class="margin-bottom-20"><strong><?php echo $row['pname'] ?></strong></h2>
                        <div class="row">
                            <div class="col-md-4 animate fadeIn">
                                <div class="portfolio-item">                        
                                        <figure class="animate fadeInLeft">
                                            <div class="grid-image">
                                                <div class="featured-info">
                                                    <div class="info-wrapper">
                                                        <h3>Hello,<?php echo " ".$row['pmanager'] ?></h3>  
                                                        <a href="changelogo.php">Change your Logo</a>                                                      
                                                    </div>
                                                </div>
                                                <?php echo "<img src='uploads/allpubs/".$row['logoo']."' style='height: 289px; width: 520px;'>"  ; ?>
                                            </div> 
                                        </figure>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-8 margin-bottom-10 animate fadeInRight">
                                <h3 class="padding-top-10 pull-left"><b><?php echo $row['pmanager'] ?></b>
                                    <small>- Manager</small>
                                </h3>
                                <div class="clearfix"></div>
                                <h4>
                                    <em><?php echo $row['pdesc'] ?></em>
                                </h4>
                                <p>Contact Info:</p>
                                <p>Phone no. :  <?php echo $row['pphone'] ?></p>
                                <p>E-mail    :  <?php echo $row['pemail']; ?></p>
                                <p>Address   :  <?php echo $row['paddr'] ?></p>
                                <p>Field     :  <?php echo $row['fld'] ?></p>
                                </div>
                        </div>
                        
                        
                        <br/> 
                        <button type="button" style="font-size: large;" onClick="window.location.href='samples.php'" class="btn btn-green">
                            <i class="fa fa-3x fa-fw fa-history"></i>Sample Orders</button> 
                        <button type="submit" name="submit" style=" font-size: large;" onClick="window.location.href='about-pub-edit.php'" class="btn btn-aqua">
                            <i class="fa fa-3x fa-fw fa-edit"></i>Edit Profile</button>
                         
                        <button type="button" style="font-size: large;" onClick="window.location.href='iscroll.php'" class="btn btn-blue">
                            <i class="fa fa-3x fa-fw fa-history"></i>History</button>
                            <br /> <br />
                        </div>
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