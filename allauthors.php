<?php
// including the config file
include_once 'functions.php';

if(validate()==true)
        {   
          include_once'header-log.php';
          
        }
        else
        {
include_once'header.php';}
include('config.php');
$pdo = connect();
// select 4 items ordered by id
//$c = $_COOKIE['SLD'];
$sql = "SELECT * FROM authors ORDER BY r_id ASC LIMIT 0, 100";
$query = $pdo->prepare($sql);
$query->execute();
$list = $query->fetchAll();
?>

    <div class="container background-white">
        <div class="row margin-vert-30">
        <br />
        <h2 class="text-center article-title">Our Authors</h2>
        <div class="content">
            <ul id="items">
                <?php
                $last_id = 0;
                foreach ($list as $rs) {
                    $last_id = $rs['r_id']; // keep the last id for the paging
                    ?>             
                    <div class="col-md-4">
                        
                        <div class="portfolio-item audio">
                        <a href="visitauthor.php?authors=<?php echo $rs['email']; ?>">
                            <figure class="animate <br />
<b>Notice</b>:  Undefined variable: animate in <b>C:\xampp\htdocs\bootstrap\html\php\portfolio-item-3col.php</b> on line <b>26</b><br />
">
                                <div class="grid-image">
                                    <div class="featured-info">
                                        <div class="info-wrapper"><?php echo $rs['fname']." ".$rs['lname']; ?></div>
                                    </div>
                                    <?php echo "<img src='uploads/allauths/".$rs['dp']."' style='height: 289px; width: 520px;'>"  ; ?>
                                </div>
                            </figure>
                        </a>
                    </div>

                        <div class="text-center">
                        <span type="span" class="label label-primary">
                        <?php echo $rs['fname']." ".$rs['lname']; ?> </span>
                        <span type="span" class="label label-default">
                        <em><br/>Author</em>
                        </span>
                          </div>
                   </div>  
                   
                    <?php } ?>
                <script type="text/javascript">var last_id = <?php echo $last_id; ?>;</script>
            </ul>
            <!-- this is the paging loader, now is hidden, it wiil be shown when we scroll to bottom  
            <p id="loader"><img src="assets/img/ajax-loader.gif"></p>-->
        </div><!-- content -->    
        <!-- footer -->
        </div>
    </div><!-- container -->
    <!-- Return to Top -->
<a href="javascript:" id="return-to-top"><i class="icon-chevron-up"></i></a>


<!-- ICON NEEDS FONT AWESOME FOR CHEVRON UP ICON -->
<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
 
</body>
</html>
<?php include_once'footer.php'; ?>