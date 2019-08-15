<?php include_once 'header.php';

include_once 'db.php';


function NewUser()
{
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $pho = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['pass'];
    $prebuk = $_POST['bookbefore'];
    $bp = $_POST['bnp'];
    $authdesc = $_POST['abtauth'];
    $addr = $_POST['postaddr'];
    $fld = $_POST['fld'];
    $file = $_FILES['logo']['name'];
    $file_loc = $_FILES['logo']['tmp_name'];
    $file_size = $_FILES['logo']['size'];
    $file_type = $_FILES['logo']['type'];
    $folder = "uploads/allauths/";

    // new file size in KB
    $new_size = $file_size / 1024;
    // new file size in KB

    // make file name in lower case
    $new_file_name = strtolower($file);
    // make file name in lower case

    $final_file = str_replace(' ', '-', $new_file_name);

    if (move_uploaded_file($file_loc, $folder . $final_file)) {
        $ch = 1;
        $query = "INSERT INTO req_signup (fname,lname,phone,email,pass,bookbefore,bp,adesc,addr,fld,dp,chk) VALUES ('$fname','$lname','$pho','$email','$password','$prebuk','$bp','$authdesc','$addr','$fld','$final_file','$ch')";
        $data = mysql_query($query) or die(mysql_error());
    }
    if ($data) {
?> 
       
       <div class="container background-white">
        <div class="row margin-vert-30">
        <br />
        <div class="content">
                    <div class="panel panel-blue">
                        <div class="panel-heading">
                           <h3 class="panel-title">Notice</h3>
                        </div>
                        
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-10">
                                    <p>Your registration form is submitted. After our team approves it, you'll be registered.</p>
                                </div>
                            </div>
                        </div>
                    </div>    
                </div>    
            </div>
        </div>        
       <?php
    }
}

function SignUp()
{
    if (!empty($_POST['fname']))
        //checking the 'user' name which is from Sign-Up.html, is it empty or have some text
        {
        $query = mysql_query("SELECT * FROM signup WHERE email = '$_POST[email]' AND pass = '$_POST[pass]'") or
            die(mysql_error());

        if (!$row = mysql_fetch_array($query) or die(mysql_error())) {
            newuser();
        } else {
            echo "SORRY, YOU ARE ALREADY REGISTERED USER";
        }
    }
}
if (isset($_POST['submit'])) {
    SignUp();
}

?>