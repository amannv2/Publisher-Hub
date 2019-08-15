<?php 

include_once 'functions.php';

if(validate()==true)
        {   
          include_once'header-log.php';
          
        }
        else
        {
include_once'header.php';}

?>

        <!-- === BEGIN CONTENT === -->
        <div id="content">
            <div class="container background-white">
                <div class="row margin-vert-30">
                 <br />  <h2 class="text-center article-title">Author Registration</h2> 
                    <!-- Register Box -->
                    <div class="col-md-12">
                        <form class="signup-page margin-top-20" action="sign-up-req.php" method="post" enctype="multipart/form-data">
                            <div class="signup-header">
                                <h1 class="margin-bottom-20">Register a new account</h1>
                                <p>Already a member? Click
                                    <a href="login.php">HERE</a> to login to your account.</p>
                            
                            
                           <div class="row">
                                <div class="col-sm-3">
                                    <label>First Name<span class="color-red">*</span></label>
                                    <input class="form-control margin-bottom-20" type="text" name="fname" id='fname'placeholder="First Name"  pattern="[A-Za-z ]{2,}" title="Alphabets only" required>     
                                </div>
                                
                                <div class="col-sm-3">     
                                    <label>Last Name<span class="color-red">*</span></label>
                                    <input class="form-control margin-bottom-20" type="text" name="lname" placeholder="Last Name"  id='lname' pattern="[A-Za-z ]{2,}" title="Alphabets only" required>
                                </div>
                                
                                <div class="col-sm-3">
                                    <label>Phone No.<span class="color-red">*</span></label>
                                    <input class="form-control margin-bottom-20" type="text" name="phone" placeholder="7309218266" id="ph" pattern="[0-9]{10}"  title="Input 10 digit phone number" required>
                                </div>
                                
                                <div class="col-sm-3">
                                    <label>Email Address<span class="color-red">*</span></label>
                                    <input class="form-control margin-bottom-20" type="text" placeholder="abc@example.com"  name="email" id='emailid' pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" title="Input Email" required>
                                </div>
                                
                                <div class="col-sm-3">
                                    <label>Password<span class="color-red">*</span></label>
                                    <input class="form-control margin-bottom-20" type="password" placeholder="*********"  name="pass" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                                </div>
                                
                                <div class="col-sm-4">
                                    <label>Have you wrote book before? <span class="color-red">*</span></label>
                                    <input class="form-control margin-bottom-20" type="text" placeholder="Yes/No"  name="bookbefore" required>
                                </div>
                                
                                <div class="col-sm-5">
                                    <label>Publisher and book's name <span class="color-red">*</span></label>
                                    <input class="form-control margin-bottom-20" type="text" placeholder="Publisher name : Book name/NA" name="bnp" required>
                                </div>
                                
                                <div class="col-sm-5">
                                    <label>About Yourself<span class="color-red">*</span></label>
                                    <textarea rows="8" cols="12" style="resize: none;" placeholder="Describe Yourself" class="form-control" name="abtauth" required></textarea>
                                </div>
                                
                                <div class="col-sm-5">
                                    <label>Your Postal Address<span class="color-red">*</span></label>
                                    <textarea rows="8" cols="12" style="resize: none;" placeholder="Your Address" class="form-control" name="postaddr" required></textarea>
                                </div>               
                                
                                <div class="col-sm-4">
                                    <label>Field of writing<span class="color-red">*</span></label>
                                    <input class="form-control margin-bottom-20" type="text" placeholder="Novel, Documentary, etc." name="fld" required>
                                </div>
                                
                                 <div class="col-sm-5"><br />
                                    <label>Your Logo:<span class="color-red">*</span></label>
                                    <input type="file" name="logo" accept="image/*" class="form-control" id="logo">
                                </div>   
                          </div>   
                    
                            <div class="row">
                                <div class="col-lg-8">
                                    <label class="checkbox">
                                        <input type="checkbox" required>
                                        I accept the
                                        <a href="#">Terms and Conditions</a>*
                                  </label>
                                </div>
                                
                                <div class="col-lg-4 text-right">
                                    <button class="btn btn-primary" type="submit" name="submit">Register</button>
                                </div>
                            </div></div>
                        </form>
                    </div>
                    <!-- End Register Box -->
                </div>
            </div>
        </div>
        <!-- Return to Top -->
<a href="javascript:" id="return-to-top"><i class="icon-chevron-up"></i></a>


<!-- ICON NEEDS FONT AWESOME FOR CHEVRON UP ICON -->
<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
 
        <!-- === END CONTENT === -->
        <?php include_once'footer.php';?>