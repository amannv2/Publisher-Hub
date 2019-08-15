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
    $sql="select * from authors where email ='".$_COOKIE['SLZ']."'";
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
                        <form action="" method="post" enctype="multipart/form-data">
                              <div class="row">
                                <div class="col-sm-5"><br />
                                    <label>Your New Logo:<span class="color-red"></span></label>
                                    <input type="file" name="logo" accept="image/*" class="form-control" id="logo">
                                </div>
                              </div>
                              <br />
                                
                            <div class="col md-4">
                            <input type="submit" name="submit" />
                            &nbsp;
                            <input type="button" name="can" value="Cancel" onClick="window.location.href='about-user.php'" />
                            </div>          
                              
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- === END CONTENT === -->
        <?php include_once'footer.php';
        
        if(isset($_POST['submit']))
        {
            
            $file = $_FILES['logo']['name'];
    $file_loc = $_FILES['logo']['tmp_name'];
 $file_size = $_FILES['logo']['size'];
 $file_type = $_FILES['logo']['type'];
 $folder="uploads/allauths/";
 
 // new file size in KB
 $new_size = $file_size/1024;
 // new file size in KB
 
 // make file name in lower case
 $new_file_name = strtolower($file);
 // make file name in lower case
 
 $final_file=str_replace(' ','-',$new_file_name);
 $p=$_COOKIE['SLZ'];
 if(move_uploaded_file($file_loc,$folder.$final_file))
 {
	$query = "UPDATE `authors` SET `dp`='$final_file' WHERE email='$p'";
    
	}$data = mysql_query ($query)or die(mysql_error());
        
        echo "<script>window.location.href='about-user.php'</script>";
        }
        ?>