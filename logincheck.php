<?php
if(!isset($_SESSION)) 
    { 
        session_start(); 
    }

include_once'db.php';
include_once 'functions.php';

  $user =  mysql_real_escape_string($_POST["user"]);
  $pass =  mysql_real_escape_string($_POST["pass"]);
  $s = "SELECT * FROM authors WHERE email='".$user."' and pass='".$pass."'";
  $result = mysql_query($s); 
  $row=mysql_fetch_array($result);
  $count= mysql_num_rows($result);
  
  
  if($user=="iamadmin@gmail.com" and $pass=="avAJ*890")
  {
      setcookie("SLA",encrypt($user,$key),time()+365*24*60*60);
      setcookie("SLZ",$user,time()+365*24*60*60);
      setcookie("SLB",encrypt($pass,$key),time()+365*24*60*60);
      $_SESSION['auth'] = "OKAY";
      $_SESSION['name'] =  $row['fname']; 
      $_SESSION['email'] =  $row['email'];
      header("location:admin.php");
  }
  
  else
  {
  if($count!=0)
  { 
	  setcookie("SLA",encrypt($user,$key),time()+365*24*60*60);
      setcookie("SLB",encrypt($pass,$key),time()+365*24*60*60);
      setcookie("SLZ",$user,time()+365*24*60*60);
      $_SESSION['auth'] = "OKAY";
      $_SESSION['name'] =  $row['fname']; 
      $_SESSION['em'] =  $row['email'];
      $chk=$row['chk'];
      setcookie("chk",$chk, time() + 365 * 24 * 60 * 60);
	  header("location:about-user.php");
  }
  else
  {
    echo '<script language="javascript">'; echo 'alert("Wrong Email or Password")'; echo '</script>';
  }
 }

?><script> window.location="login.php" </script>