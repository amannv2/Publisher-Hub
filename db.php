<?php
$db_hostname = 'localhost';
$db_username = 'root';
$db_password = '';
$db_database = 'publisherhub';


// Database Connection String
$con = mysql_connect($db_hostname, $db_username, $db_password);
if (!$con)
{
    die('Could not connect: ' . mysql_error());
}
mysql_select_db($db_database, $con);
?>