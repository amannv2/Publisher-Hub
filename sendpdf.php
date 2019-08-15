<?php

include_once 'functions.php';

if (validate() == true) {
    include_once 'header-log.php';

    $u = decrypt($_COOKIE['SLA'], $key);
    $p = decrypt($_COOKIE['SLB'], $key);

    $db_hostname = 'localhost';
    $db_username = 'root';
    $db_password = '';
    $db_database = 'publisherhub';

    // Database Connection String
    $con = mysql_connect($db_hostname, $db_username, $db_password);
    if (!$con) {
        die('Could not connect: ' . mysql_error());
    }
    mysql_select_db($db_database, $con);

    $tmp = $u;
    $sql = "SELECT * FROM authors WHERE email='" . $_COOKIE['SLZ'] . "'";
    $query = mysql_query($sql);
    $row = mysql_fetch_array($query);
    $authname = $_COOKIE['usr'];
    $aem=$_COOKIE['SLZ'];
    //echo $u, $authname;

    $buk = $_POST['btitle'];
    
    
    $bc = $_POST['bcover'];
    list($bcc,$coverprice) = explode(":", $bc);
    
    
    $pqual = $_POST['pq'];
    list($pquall, $pqualprice) = explode(":", $pqual);
    
    
    $psize = $_POST['size'];
    list($psizee, $psizeprice) = explode(":", $psize);    
    
    
    $ptype = $_POST['ptype'];
    list($ptypee, $ptypeprice) = explode(":", $ptype);       
    
    
    $pag = $_POST['page'];
    $qty = $_POST['quantity'];
    $desc = $_POST['bdesc'];
    
    $bp = $_COOKIE['SLD'];
    $mrp = $_POST['prc'];



    //store pdf

    $file = rand(1000, 100000) . "-" . $_FILES['bookpdf']['name'];
    $file_loc = $_FILES['bookpdf']['tmp_name'];
    $file_size = $_FILES['bookpdf']['size'];
    $file_type = $_FILES['bookpdf']['type'];
    $folder = "uploads/books/";

    // new file size in KB
    $new_size = $file_size / 1024;
    // new file size in KB

    // make file name in lower case
    $new_file_name = strtolower($file);
    // make file name in lower case

    $final_file = str_replace(' ', '-', $new_file_name);

    
        //pdf
        require ('PHPMailer/PHPMailerAutoload.php');
        require "class.phpmailer.php";
        $message = nl2br(" Book Title: ". $buk ." \n Author" . $authname . "\n Quantity: ". $qty . "\n Page Quality: ". $pquall . "\n Page Size: " . $psizee ."\n Total Pages: " . $pag . "\n Book Cover: " . $bcc ."\n Print Type: " . $ptypee ."\n Total Price: " . $mrp ."\n Description:  ". $desc );
        $message2 = nl2br("\n Page Quality: ". $pquall . "\n Page Size: " . $psizee ."");


        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->SMTPAuth = true; // turn on SMTP authentication
        $mail->SMTPSecure = "tls";
        $mail->Port = 587;
        $mail->Host = "smtp.gmail.com";
        $mail->Username = "amannverma63@gmail.com"; // SMTP username
        $mail->Password = "amanvermaa"; // SMTP password
        $mail->AddAddress("amannverma63@gmail.com");
        $mail->IsHTML(true);
        $mail->Subject = "Publisher Hub User";
        $mail->From = "amannverma63@gmail.com";
        $mail->FromName = "$authname";
        $mail->addReplyTo("$aem", "Reply");
        $mail->AddAttachment($file_loc,$final_file);
        $mail->Body = $message;
        $mail->AltBody = $message;

        if (!$mail->Send()) { ?>
        <br /><div class="panel panel-red ">
                  <div class="panel-heading text-center">
                    <h3 class="panel-title">Oops..</h3>
                  </div>
                    <div class="panel-body text-center">
                      Something went wrong. Please check your internet connection<br />  
                  </div>
                </div>  
                <?php
            //exit;
        } else {
            if (move_uploaded_file($file_loc, $folder . $final_file)) {
        $sql = "INSERT INTO books(bname, bprice, bpublisher, bauthor, bdesc, qty, pdf, bcover, pagequality, pagesize, ptype) VALUES('$buk','$mrp','$bp','$authname','$desc','$qty','$final_file','$bc','$pqual','$psize','$ptype')";
        $data=mysql_query($sql);
    } if($data){ 
        
        
     $file = $_FILES['bpic']['name'];
     $file_loc = $_FILES['bpic']['tmp_name'];
     $file_size = $_FILES['bpic']['size'];
     $file_type = $_FILES['bpic']['type'];
     $folder="uploads/allbooks/";
 
     // new file size in KB
     $new_size = $file_size/1024;
     // new file size in KB
     
     // make file name in lower case
     $new_file_name = strtolower($file);
     // make file name in lower case
     
     $final_file=str_replace(' ','-',$new_file_name);
     if (move_uploaded_file($file_loc, $folder . $final_file)) {
        $sql1 ="UPDATE `books` SET `bpic`='$final_file' WHERE isbn=(SELECT * FROM (SELECT max(isbn) FROM books) as t)"; 
        $dataa=mysql_query($sql1);
    }    
        
        ?>
        
            <br />   <div class="panel panel-primary ">
                  <div class="panel-heading text-center">
                    <h3 class="panel-title">Order Received</h3>
                  </div>
                    <div class="panel-body text-center">
                      We have received your request. You'll receive your order within a month. Thank You.
                  </div>
                </div>  
         
  <?php include_once 'rcpt.php';}
        }
} else {
    echo ('<script> alert("Please Login to continue.")</script>');
}


 include_once 'footer.php'; ?>