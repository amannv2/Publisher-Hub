<?php
include_once'header.php';
require ('PHPMailer/PHPMailerAutoload.php');

require "class.phpmailer.php";

$email = $_POST['email'] ;
$message = $_POST['message'] ;
$name = $_POST['name'];


/*
        $email = new PHPMailer();
        $email->From      = $email;
        $email->FromName  = $name;
        $email->Subject   = 'Publisher Hub: Sample Order Received';
        $email->Body      = $message;
        $email->AddAddress('amannverma63@gmail.com');
        //$file_to_attach = $file_loc;
        //$email->AddAttachment( $file_to_attach , $new_file_name.'.pdf' );
        $chk = $email->Send(); 
*/



$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPAuth = true;     // turn on SMTP authentication
$mail->SMTPSecure = "tls"; 
$mail->Port       = 587;   
$mail->Host = "smtp.gmail.com";  
$mail->Username = "amannverma63@gmail.com";  // SMTP username
$mail->Password = "amanvermaa"; // SMTP password
$mail->AddAddress("amannverma63@gmail.com");
$mail->IsHTML(true);
$mail->Subject = "Publisher Hub User";
$mail->From = $email;
$mail->FromName = $name;
$mail->addReplyTo($email, "Reply");
$mail->Body    = $message;
$mail->AltBody = $message;

if(!$mail->Send())
{
   echo "Message could not be sent. <p>";
   echo "Mailer Error: " . $mail->ErrorInfo;
   //exit;
}
else{
echo "Thank You for contact us. We'll respond soon.";

}

include_once'footer.php'
?>