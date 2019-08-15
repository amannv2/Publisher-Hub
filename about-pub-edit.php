<?php 

include_once 'functions.php';

if(validate()==true)
        {   
         include_once'header-log.php';
          
        }
        
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
    
    $p=$_COOKIE['SLZ'];
    $sqlb1="SELECT * FROM publisher where pemail='$p'";
    $q1=mysql_query($sqlb1);
    $r1=mysql_fetch_array($q1);
    
    
    
?>
        <!-- === BEGIN CONTENT === -->
        
        <div id="content">
            <div class="container background-white">
                <div class="container">
              <br />  <h2 class="text-center article-title">Edit Your Profile</h2> 
                    <div class="row margin-vert-30">
                        <!-- Login Box -->
                        <div class="col-md-12">
                            <form class="login-page" method="post" action="">
                            
                            <div class="input-group margin-bottom-20">
                                    <span class="input-group-addon">
                                        <i class="">Field</i>
                                    </span>
                                    <input placeholder="Field of publishing" class="form-control" value="<?php echo $r1['fld'];?>" type="text" name="fld"/>
                            </div>
                                
                                <div class="input-group margin-bottom-20">
                                    <span class="input-group-addon">
                                        <i class="">E-mail</i>
                                    </span>
                                    <input placeholder="Email" class="form-control" name="user" type="email" value="<?php echo $r1['pemail'];?>"/>
                                </div>
                                
                                <div class="input-group margin-bottom-20">
                                    <span class="input-group-addon">
                                        <i class="">Password</i>
                                    </span>
                                    <input class="form-control margin-bottom-20" type="password" name="pass" placeholder="Password" id="ps"  title="Input Password"/>
                                </div> 
                                
                                <div class="input-group margin-bottom-20">
                                    <span class="input-group-addon">
                                        <i class="">Manager</i>
                                    </span>
                                    <input class="form-control margin-bottom-20" type="text" name="man" placeholder="Manager's Name" id="man" value="<?php echo $r1['pmanager'];?>" required>
                                </div>
                                
                                <div class="input-group margin-bottom-20">
                                    <span class="input-group-addon">
                                        <i class="">Phone no.</i>
                                    </span>
                                    <input class="form-control margin-bottom-20" type="text" name="phone" placeholder="Phone no." id="ph" pattern="[0-9]{10}" value="<?php echo $r1['pphone'];?>" title="Input 10 digit phone number" required>
                                </div>
                                 
                                 <div class="input-group margin-bottom-20">
                                    <span class="input-group-addon">
                                        <i class="">Address</i>
                                    </span>
                                    <textarea rows="5" cols="12" style="resize: none;" placeholder="Your Address" class="form-control" name="addr" required><?php echo $r1['paddr'];?></textarea>
                                </div>
                                
                                <div class="input-group margin-bottom-20">
                                    <span class="input-group-addon">
                                        <i class="">Description</i>
                                    </span>
                                    <textarea rows="5" cols="12" style="resize: none;" placeholder="Your Description" class="form-control" name="desc" required><?php echo $r1['pdesc'];?></textarea>
                                </div>                      
                                <div class="row">
                                  <div class="col-md-6">
                                   <br /> <button class="btn btn-primary " type="submit" name="submit">Save</button>  </br><br>
                                  </div>
                                
                                <div class="col-md-6">
                                   <br /> <button class="btn btn-primary pull-right"  type="button" name="cancel" onClick="window.location.href='about-pub.php'">Cancel</button>  </br><br>
                                  </div>
                                </div>
                            </form>
                        </div>
                        <!-- End Login Box -->
                    </div>
                </div>
            </div>
        </div>
        <!-- === END CONTENT === -->
        <?php include_once'footer.php';
        
        
        
        
     if(isset($_POST['submit']))
     {
    $pma=$_POST['man'];
    $pho=$_POST['phone'];
    $pem=$_POST['user'];
    $pfld=$_POST['fld'];
    $pdes=$_POST['desc'];
    $paddr=$_POST['addr'];
    $pass=$_POST['pass'];
    
    if($pass==""){
	$query = "UPDATE `publisher` SET `pmanager`='$pma',`pphone`='$pho',`pemail`='$pem',`pdesc`='$pdes',`paddr`='$paddr',`fld`='$pfld' WHERE pemail='$p'";
	$data = mysql_query ($query,$con)or die(mysql_error());   
      echo "<script>window.location.href='about-pub.php'</script>";
      }
    else {
	$query = "UPDATE `publisher` SET `pmanager`='$pma',`pphone`='$pho',`pemail`='$pem',`pass`='$pass',`pdesc`='$pdes',`paddr`='$paddr',`fld`='$pfld' WHERE pemail='$p'";
	$data = mysql_query ($query,$con)or die(mysql_error());   
      echo "<script>window.location.href='about-pub.php'</script>";
      }
       
    }
      
      
      ?>