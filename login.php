<?php 

include_once 'functions.php';

if(validate()==true)
        {   
          header("location:about-user.php");
          
        }
include_once'header.php';

?>
        <!-- === BEGIN CONTENT === -->
        
        <div id="content">
            <div class="container background-white">
                <div class="container">
              <br />  <h2 class="text-center article-title"> Welcome Back, Author </h2> 
                    <div class="row margin-vert-30">
                        <!-- Login Box -->
                        <div class="col-md-6 col-md-offset-3 col-sm-offset-3">
                            <form class="login-page" method="POST" action="logincheck.php">
                                <div class="login-header margin-bottom-30">
                                    <h2>Login to your account</h2>
                                </div>
                                <div class="input-group margin-bottom-20">
                                    <span class="input-group-addon">
                                        <i class="fa fa-user"></i>
                                    </span>
                                    <input placeholder="Email" class="form-control" name="user" type="email">
                                </div>
                                <div class="input-group margin-bottom-20">
                                    <span class="input-group-addon">
                                        <i class="fa fa-lock"></i>
                                    </span>
                                    <input placeholder="Password" class="form-control" type="password" name="pass">
                                </div>
                                <!-- <div class="row">
                                <div class="col-lg-8">
                                    <label class="checkbox">
                                        <input type="checkbox" name="rememberme" value="1">
                                       Remember Me
                                  </label>
                                </div> -->
                                <div class="row">
                                  <div class="col-md-6">
                                    <button class="btn btn-primary pull-right" type="submit" name="submit">Login</button>  </br><br>
                                    <p><b> <a href="sign-up.php">Click Here</a> to Sign Up<b></p>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- End Login Box -->
                    </div>
                </div>
            </div>
        </div>
        <!-- === END CONTENT === -->
        <?php include_once'footer.php';?>