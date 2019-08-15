<?php

include_once 'functions.php';

if (validate() == true) {
    include_once 'header-log.php';

    $u = $_COOKIE['SLZ'];
    $s = decrypt($_COOKIE['SLB'], $key);

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
    $au=$_COOKIE['usr'];
    $p=$_COOKIE['SLC'];
    $aa=$_COOKIE['SLZ'];


    $title = $_POST['fbtitle'];
    
    
    $cover = $_POST['fbcover'];
    list($coverr, $coverprice) = explode(":", $cover);
    
    
    $pq = $_POST['fpq'];
    list($pqq, $pqprice) = explode(":", $pq);
    
    
    $size = $_POST['fsize'];
    list($sizee, $sizeprice) = explode(":", $size);
    
    $type = $_POST['ftype'];
    list($typee, $typeprice) = explode(":", $type);
    
    
    $fqty = $_POST['fquantity'];
    
    $faddr = $_POST['freeaddr'];

    //store pdf

    $file = rand(1000, 100000) . "-" . $_FILES['freepdf']['name'];
    $file_loc = $_FILES['freepdf']['tmp_name'];
    $file_size = $_FILES['freepdf']['size'];
    $file_type = $_FILES['freepdf']['type'];
    $folder = "uploads/sample/";

    // new file size in KB
    $new_size = $file_size / 1024;
    // new file size in KB

    // make file name in lower case
    $new_file_name = strtolower($file);
    // make file name in lower case

    $final_file = str_replace(' ', '-', $new_file_name);

    
        

    //mail pdf
    require ('PHPMailer/PHPMailerAutoload.php');
    require "class.phpmailer.php";
    
    
    
    $message = nl2br("Book Title: ". $title . "\n Quantity: ". $fqty . "\n Page Quality: ". $pqq . "\n Page Size: " . $sizee . "\n Book Cover: " . $coverr ."\n Print Type: " . $typee ."\n Delivery Address:  ". $faddr );
    
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
    $mail->Subject = "Publisher Hub|Sample Order Received.";
    $mail->From = "amannverma63@gmail.com";
    $mail->FromName = "$au";
    $mail->addReplyTo("$aa", "Reply");
    $mail->AddAttachment($file_loc,$final_file);
    $mail->Body = $message;
    $mail->AltBody = $message;

    if (!$mail->Send()) {        
        
        ?><br /><div class="panel panel-red ">
                  <div class="panel-heading text-center">
                    <h3 class="panel-title">Oops..</h3>
                  </div>
                    <div class="panel-body text-center">
                      Something went wrong. Please check your internet connection<br />  
                  </div>
                </div>  <?php
        //echo "Mailer Error: " . $mail->ErrorInfo;
        //exit;
    } else { if (move_uploaded_file($file_loc, $folder . $final_file)) {
        $sql = "INSERT INTO sampleorder(bname, author, publisher, qty, sampdf, addr, bookcover, pagequality, pagesize, ptype) VALUES('$title','$u','$p','$fqty','$final_file','$faddr','$cover','$pq','$size','$type')";
        $data=mysql_query($sql);
    }
    if($data) {
        
     $file1 = $_FILES['fbpic']['name'];
     $file_loc1 = $_FILES['fbpic']['tmp_name'];
     $file_size1 = $_FILES['fbpic']['size'];
     $file_type1 = $_FILES['fbpic']['type'];
     $folder1="uploads/samplebooks/";
 
     // new file size in KB
     $new_size1 = $file_size1/1024;
     // new file size in KB
     
     // make file name in lower case
     $new_file_name1 = strtolower($file1);
     // make file name in lower case
     
     $final_file1=str_replace(' ','-',$new_file_name1);
     if (move_uploaded_file($file_loc1, $folder1 . $final_file1)) {
        $sql1 ="UPDATE `sampleorder` SET `cover`='$final_file1' WHERE isbn=(SELECT * FROM (SELECT max(oid) FROM sampleorder) as t)"; 
        $dataa=mysql_query($sql1);
    }    
        
        ?>
    
              <br />   <div class="panel panel-primary ">
                  <div class="panel-heading text-center">
                    <h3 class="panel-title">Sample Request Received</h3>
                  </div>
                    <div class="panel-body text-center">
                      We have received your request. You'll receive your sample book within 10 days. Thank You.
                  </div>
                </div>  
    <?php } 
                 
    }


} else { 
    echo ('<script> alert("Please Login to continue.")</script>');
}


//if($chk==true){echo 'success';}else{'failed';}

include_once 'footer.php'; ?>