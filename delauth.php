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


//auth del
if(isset($_POST['did']))
{
      $did=$_POST['did'];
      $s= "DELETE FROM req_signup WHERE r_id = $did";
       if(mysql_query($s))
       {
        echo("1");
       }
       else echo("0");}
       
       
//perm auth del
if(isset($_POST['perauthdel']))
{
      $perauthdel=$_POST['perauthdel'];
      $spdel= "DELETE FROM authors WHERE r_id = $perauthdel";
       if(mysql_query($spdel))
       {
        echo("1");
       }
       else echo("0");}       
       
       
//auth add   
if(isset($_POST['aid']))
{
      $aid=$_POST['aid'];
      $s2= "INSERT INTO authors SELECT r.* FROM req_signup r WHERE r_id = $aid";
      $s21= "DELETE FROM req_signup WHERE req_signup.r_id = $aid";
       if(mysql_query($s2))
       {
        if(mysql_query($s21))
        {
        echo("1");
        }
       }
       else echo("0");}
       
//pub del
if(isset($_POST['pdid']))
{
      $pdid=$_POST['pdid'];
      $s1= "DELETE FROM req_pub WHERE rp_id = $pdid";
       if(mysql_query($s1))
       {
        echo("1");
       }
       else echo("0");}
       

//perm pub del
if(isset($_POST['permpdel']))
{
      $permpdel=$_POST['permpdel'];
      $spdel= "DELETE FROM publisher WHERE pid = $permpdel";
       if(mysql_query($spdel))
       {
        echo("1");
       }
       else echo("0");}
              
       
//pub add     
if(isset($_POST['paid']))
{
      $paid=$_POST['paid'];
      $s3= "INSERT INTO publisher SELECT p.* FROM req_pub p WHERE rp_id = $paid";
      $s31= "DELETE FROM req_pub WHERE req_pub.rp_id = $paid";
       if(mysql_query($s3))
       {
        if(mysql_query($s31))
        {
        echo("1");
        }
       }
       else echo("0");}

?>