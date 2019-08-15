<?php
session_start();
include_once 'functions.php';
setcookie("SLA", "", time()-3600);
setcookie("SLB", "", time()-3600);
echo $_SESSION['auth'];

session_unset();

//session_destroy();
if(validate()==true)
    echo "logout unsucessfully !";
else
echo "logout sucessfully !";

header("location:login.php");
?>