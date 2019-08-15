<?php
    include_once'header.php';

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

    /*
    $ID = $_POST['user'];
    $Password = $_POST['pass'];
    */  
    function SignIn()
    {
     //session_start();   //starting the session for user profile page
     if(!empty($_POST['user']))   //checking the 'user' name which is from Sign-In.html, is it empty or have some text
     {
	   $query = mysql_query("SELECT *  FROM signup where name = '$_POST[user]' AND pass = '$_POST[pass]'") or die(mysql_error());
	   $row = mysql_fetch_array($query) or die(mysql_error());
	   if(!empty($row['name']) AND !empty($row['pass']))
	   {
		//$_SESSION['name'] = $row['pass'];
		//header("Location: about-user.php");
        echo('Login Done');

	   }
       else
   	   {
		echo "SORRY... YOU ENTERED WRONG ID AND PASSWORD... PLEASE RETRY...";
	   }
     }
    }
    if(isset($_POST['submit']))
    {
	   SignIn();
    }


?>