<?php

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

            $file = $_FILES['logo']['name'];
    $file_loc = $_FILES['logo']['tmp_name'];
 $file_size = $_FILES['logo']['size'];
 $file_type = $_FILES['logo']['type'];
 $folder="uploads/allpubs/";
 
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
	$query = "UPDATE `publisher` SET `logoo`='$final_file' WHERE pemail='$p'";
    
	}$data = mysql_query ($query)or die(mysql_error());
    header("location: about-pub.php");
?>
