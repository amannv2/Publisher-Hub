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
                    <!-- Main Column -->
                    <div class="col-md-9">
                        <!-- Main Content -->
                        <div class="headline">
                            <h2 class="margin-bottom-20"><strong>Contact Form</strong></h2>
                        </div>
                        <p>In case you want to submit any suggestion or if you have any problem regarding our service
                        you can email us by filling the form below. Our team will try to respond you as soon as they'll
                        receive mail. We will certainly resolve your issue, if any.</p>
                        <br>
                        <!-- Contact Form -->
                        <form action="sendmail.php" method="POST">
                            <label>Name</label>
                            <div class="row margin-bottom-20">
                                <div class="col-md-6 col-md-offset-0">
                                    <input class="form-control" name="name"type="text">
                                </div>
                            </div>
                            <label>Email
                                <span class="color-red">*</span>
                            </label>
                            <div class="row margin-bottom-20">
                                <div class="col-md-6 col-md-offset-0">
                                    <input class="form-control " type="email" name="email" id='emailid' title="Wrong format" required>
                                </div>
                            </div>
                            <label>Message
                            <span class="color-red">*</span>
                            </label>
                            <div class="row margin-bottom-20">
                                <div class="col-md-8 col-md-offset-0">
                                    <textarea rows="8" class="form-control" name="message" required></textarea>
                                </div>
                            </div>
                            <p>
                                <button type="submit" class="btn btn-primary">Send Message</button>
                            </p>
                        </form>
                        <!-- End Contact Form -->
                        <!-- End Main Content -->
                    </div>
                    <!-- End Main Column -->
                    <!-- Side Column -->
                    <div class="col-md-3">
                        <!-- Recent Posts -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><b>Contact Info</b></h3>
                            </div>
                            <div class="panel-body">
                                <p>If you've any queries or suggestions feel free to contact us, we'll be in touch as soon as possible.Contacting details are listed below: </p>
                                <ul class="list-unstyled">
                                    <li>
                                        <i class="fa-phone color-primary"></i>+91 9876543210</li>
                                    <li>
                                        <i class="fa-envelope color-primary"></i>pubhub@gmail.com</li>
                                    <li>
                                        <i class="fa-home color-primary"></i>http://www.pubhub.com</li>
                                </ul>
                            </div>
                        </div>
                        <!-- End recent Posts -->
                        <!-- About -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><strong>About</strong></h3>
                            </div>
                            <div class="panel-body">
                             Publisher Hub provides you some of the best Publishers available out there.  We ease your task of getting your book published. We are still growing and will continue to improve our services. Thank You for choosing us!
                              </div>
                        </div>
                        <!-- End About -->
                    </div>
                    <!-- End Side Column -->
                </div>
            </div>
        </div>
        <!-- === END CONTENT === -->
        <?php include_once'footer.php';?>