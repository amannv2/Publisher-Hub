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
                    <h2 class="text-center article-title">Publisher Registration</h2> 
                   <!-- Register Box -->
                    <div class="col-md-12">
                        <form class="signup-page margin-top-20" action="sign-up-pub-req.php" method="post" enctype="multipart/form-data">
                            <div class="signup-header">
                                <h1 class="margin-bottom-20">Register a new account</h1>
                                <p>Already a member? Click
                                    <a href="publog.php">HERE</a> to login to your account.</p>
                            
                            
                           <div class="row">
                                <div class="col-sm-3">
                                    <label>Publication's Name<span class="color-red">*</span></label>
                                    <input class="form-control margin-bottom-20" type="text" name="pname" placeholder="Publication's Name" title="Publication" required>     
                                </div>
                                
                                <div class="col-sm-3">     
                                    <label>Manager's Name<span class="color-red">*</span></label>
                                    <input class="form-control margin-bottom-20" type="text" name="mname" placeholder="Manager's Name"  id='mname' pattern="[A-Za-z ]{2,}" title="Alphabets only" required>
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
                                    <label>Have you published book before? <span class="color-red">*</span></label>
                                    <input class="form-control margin-bottom-20" type="text" placeholder="Yes/No"  name="pubbefore" required>
                                </div>
                                
                                <div class="col-sm-5">
                                    <label>Author and book's name <span class="color-red">*</span></label>
                                    <input class="form-control margin-bottom-20" type="text" placeholder="Book name by Author name/NA" name="ab" required>
                                </div>
                               
                                <div class="col-sm-5">
                                    <label>About Yourself<span class="color-red">*</span></label>
                                    <textarea rows="8" cols="12" style="resize: none;" placeholder="Describe Your Publication" class="form-control" name="abtpub" required></textarea>
                                </div>
                                
                                <div class="col-sm-5">
                                    <label>Your Postal Address<span class="color-red">*</span></label>
                                    <textarea rows="8" cols="12" style="resize: none;" placeholder="Your Address" class="form-control" name="pubaddr" required></textarea>
                                </div>  
                                
                                <div class="col-sm-5"><br />
                                    <label>Field of Publishing<span class="color-red">*</span></label>
                                    <input class="form-control margin-bottom-20" type="text" placeholder="Novel SciFi Documentary etc." name="fld" required>
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
        <!-- === END CONTENT === -->
        <?php include_once'footer.php';?>