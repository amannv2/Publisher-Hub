<?php 

include_once 'functions.php';

if(validate()==true)
        {   
          include_once'header-log.php';
          
        }
        else
        {
include_once'header.php';}

include_once 'db.php';

    $sqlb1 = "SELECT * FROM publisher ORDER BY avgrate desc";
    $q1 = mysql_query($sqlb1);
    $r1 = mysql_fetch_array($q1);

    $sqlb2 = "SELECT * FROM publisher ORDER BY avgrate desc LIMIT 2,1";
    $q2 = mysql_query($sqlb2);
    $r2 = mysql_fetch_array($q2);

    $sqlb3 = "SELECT * FROM publisher ORDER BY avgrate desc LIMIT 3,1";
    $q3 = mysql_query($sqlb3);
    $r3 = mysql_fetch_array($q3);

?>






        <!-- === BEGIN CONTENT === -->
        <div id="welcome" class="background-white">
            <div class="container">
                <div class="row margin-vert-40">
                    <!-- Main Text -->
                    <div class="col-md-12">
                        <h2 class="text-center article-title">Welcome to Publisher Hub</h2>
                        <p class="text-center">Our primary objective is to provide you best Publishers from where you 
                        can pick your desired publisher and let that publisher to publish your content.
                        Publisher Hub is one of the leading website that provides you with plenty of Publishers under single roof. Publisher Hub is a venture which was 
                        established by a group of students of BCA. </p>
                        <img class="fadeInUp animate" alt="" src="assets/img/responsive_homepage.jpg" style="display: block; margin-left: auto; margin-right: auto; margin-top: 40px;">
                    </div>
                    <!-- End Main Text -->
                </div>
            </div>
        </div>
        <!-- Icons -->
        <div id="icons" class="parallax-bg1 text-light background-primary" style="background-position: 50% 0%;" data-stellar-background-ratio="0.5">
            <div class="container">
                <div class="row margin-vert-40">
                    <!-- Icons -->
                    <div class="col-md-4 text-center animate fadeInLeft">
                        <i class="fa-support fa-3x color-primary-lighter"></i>
                        <h2 class="padding-top-10">Support</h2>
                        <p>We provide 24x7 support to our users. Drop an email to us and we'll respond as fast as we can.</p>
                    </div>
                    <div class="col-md-4 text-center animate fadeInUp">
                        <i class="fa-laptop fa-3x color-primary-lighter"></i>
                        <h2 class="padding-top-10">Responsive</h2>
                        <p>Our website is responsive and can be accessed through any device without any trouble and with best user experience.</p>
                    </div>
                    <div class="col-md-4 text-center animate fadeInRight">
                        <i class="fa-check-circle-o fa-3x color-primary-lighter"></i>
                    <h2 class="padding-top-10">Verified Publishers</h2>
                                            <p>The publishers we provide are genuine and verified publishers hand-picked by our team for best quality product.</p>
                    </div>
                    <!-- End Icons -->
                </div>
            </div>
        </div>
        <!-- End Icons -->
        <!-- Content -->
        <div id="content" class="background-white">
            <div class="container">
                <div class="row margin-vert-40">
                    <div class="col-md-12">
                        <h2 class="text-center article-title">Our Top Publishers</h2>
                        <p>Publisher Hub is an upcoming leading publishing house of India and enjoys the repute of being one of the fastest growing publishing house. It is known for its selfless work in giving new authors a platform to represent their worth and realize their dreams. In the competitive world, Publisher Hub is giving it's every bits and piece to establish new authors with all the support they want. All this is provided with a dedicated support team.</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Content -->
        <!-- Portfolio -->
        <div id="porfolio" class="parallax-bg2" style="background-position: 50% 0%;" data-stellar-background-ratio="0.5">
            <div class="container">
                <div class="row margin-top-40">
                    <!-- Portfolio Item -->
                    <div class="portfolio-item col-sm-4 col-xs-6 margin-bottom-40">
                       <a href="about-me.php?publishers=<?php echo $r1['pname']; ?>"> 
                            <figure class="animate fadeInLeft">
                                <div class="grid-image">
                                    <div class="featured-info">
                                        <div class="info-wrapper"><?php echo $r1['pname']; ?></div>
                                    </div>
                                    <img alt="<?php echo $r1['pname']; ?>" src="assets/img/portfolio/<?php echo $r1['logoo']; ?>">
                                </div>
                            </figure>
                        </a>
                    </div>
                    <!-- End Portfolio Item -->
                    <!-- Portfolio Item -->
                    <div class="portfolio-item col-sm-4 col-xs-6 margin-bottom-40">
                        <a href="about-me.php?publishers=<?php echo $r2['pname']; ?>"> 
                            <figure class="animate fadeInUp">
                                <div class="grid-image">
                                    <div class="featured-info">
                                        <div class="info-wrapper"></div>
                                    </div>
                                    <img alt="<?php echo $r2['pname']; ?>" src="assets/img/portfolio/<?php echo $r2['logoo']; ?>">
                                </div>
                            </figure>
                        </a>
                    </div>
                    <!-- End Portfolio Item -->
                    
                    <!-- Portfolio Item -->
                    <div class="portfolio-item col-sm-4 col-xs-6 margin-bottom-40">
                        <a href="about-me.php?publishers=<?php echo $r3['pname']; ?>"> 
                            <figure class="animate fadeInRight">
                                <div class="grid-image">
                                    <div class="featured-info">
                                        <div class="info-wrapper"><?php echo $r3['pname']; ?></div>
                                    </div>
                                    <img alt="<?php echo $r3['pname']; ?>" src="assets/img/portfolio/<?php echo $r3['logoo']; ?>">
                                </div>
                            </figure>
                        </a>
                        <button class="btn btn-primary" style="float: right;" type="button" onClick="parent.open('allpublisher.php?sort=n')">
                    See All <i class="fa fa-chevron-right"></i> 
                    </button>                      
                    <!-- End 
                    </div>
                   Portfolio Item -->
                </div>
            </div>
        </div>
        </div>
        <!-- Return to Top -->
<a href="javascript:" id="return-to-top"><i class="icon-chevron-up"></i></a>


<!-- ICON NEEDS FONT AWESOME FOR CHEVRON UP ICON -->
<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
 
        <!-- End Portfolio -->
        <!-- === END CONTENT === -->
        <?php include_once'footer.php';?>