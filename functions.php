<?php
if (!isset($_SESSION)) {
    session_start();
}

$key = md5("publisher");
$salt = md5("publisher");

function con()
{
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
    mysql_select_db($db_database, $con); //select database

    return $con;
}


function encrypt($string, $key)
{
    $string = rtrim(base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $key, $string,
        MCRYPT_MODE_ECB)));
    return $string;
}

function decrypt($string, $key)
{
    $string = mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $key, base64_decode($string),
        MCRYPT_MODE_ECB);
    return $string;
}

function hashword($string, $salt)
{
    $string = crypt($string, '$1$' . $salt . '$');
    return $string;
}

function validate()
{
    if (isset($_SESSION['auth']))
    {
        return true;
    }

    return false;
}

?>