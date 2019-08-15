<?php
ob_start();
include_once 'functions.php';

if(validate()==true)
        {   
          include_once'header-log.php';
        }
        else
        {
include_once'header.php';}

   include_once'db.php';


if (!empty($_REQUEST['authors'])) 
{
    $authors = mysql_real_escape_string($_REQUEST['authors']);
   
    $sql = "SELECT * FROM authors WHERE email LIKE '%".$authors."%'"; 
	$r_query = mysql_query($sql); 
	$row = mysql_fetch_array($r_query);  
    $us=$row['fname']." ".$row['lname'];
    setcookie("usr",$us,time()+365*24*60*60);
    setcookie("SLC",$row['email'],time()+365*24*60*60);    
 }
   ob_end_flush(); ?>

        <!-- === BEGIN CONTENT === -->
        <div id="content">
            <div class="container background-white">
                <div class="row margin-vert-30">
                    <div class="col-md-12">
                       <h2 class="margin-bottom-20"><strong>Author's Profile</strong></h2>
                        <div class="row">
                            <div class="col-md-4 animate fadeIn">
                                <div class="portfolio-item">
                                  
                                        <figure class="animate fadeInLeft">
                                            <div class="grid-image">
                                                <div class="featured-info">
                                                    <div class="info-wrapper">
                                                        <h3>Author <?php echo " ".$row['fname'] ?></h3>
                                                        
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
                        
                         <figure class="animate fadeInUp">
                        <div id="accordion2" class="panel-group alternative">
                            
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a class="accordion-toggle" href="#collapse2-Two" data-parent="#accordion2" data-toggle="collapse">
                                            All of my works
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapse2-Two" class="accordion-body collapse">
                                    <div class="panel-body">
                                     
                                 <?php  include_once 'myworks.php'; ?>
                                        
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        </figure>             
                        
                        
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