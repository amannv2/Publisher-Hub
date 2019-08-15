<?php
// including the config file
include_once 'functions.php';

if (validate() == true) {
    include_once 'header-log.php';

} else {
    include_once 'header.php';
}
include ('config.php');
$pdo = connect();

// select 4 items ordered by id
//$c = $_COOKIE['SLD'];
if($_GET['sort']=="n"){
$sql = "SELECT * FROM publisher ORDER BY pid ASC LIMIT 0, 100";}
else if($_GET['sort']=="y"){
$sql = "SELECT * FROM publisher ORDER BY avgrate DESC";}
$query = $pdo->prepare($sql);
$query->execute();
$list = $query->fetchAll();
?>


    <div class="container background-white">
        <div class="row margin-vert-30">
        <br />
        <h2 class="text-center article-title">Our Publishers</h2>
        <div class="content">
           <div class="text-center article-title">                      
             <form action="search.php" method="GET">                    
	           <input type="search" id="qry" name="query" placeholder="Search">
             </form>                      
           
	Sort By&nbsp;<i class="fa fa-arrows-v"></i>&nbsp;:&nbsp;<a href="allpublisher.php?sort=y">Highest Rating&nbsp;</a>&nbsp;|&nbsp;<a href="allpublisher.php?sort=n">None</a>
           </div>
           
           <br />           
         <ul id="items">
                <?php
$last_id = 0;
foreach ($list as $rs) {
    $last_id = $rs['pid']; // keep the last id for the paging

?>             
                    <div class="col-md-4">
                        
                        <div class="portfolio-item audio">
                        <a href="about-me.php?publishers=<?php echo $rs['pname']; ?>">
                            <figure class="animate <br />
<b>Notice</b>:  Undefined variable: animate in <b>C:\xampp\htdocs\bootstrap\html\php\portfolio-item-3col.php</b> on line <b>26</b><br />
">
                                <div class="grid-image">
                                    <div class="featured-info">
                                        <div class="info-wrapper"><?php echo $rs['pname']; ?></div>
                                    </div>
                                    <?php echo "<img src='uploads/allpubs/" . $rs['logoo'] .
"' style='height: 289px; width: 520px;'>"; ?>
                                </div>
                            </figure>
                        </a>
                    </div>

                        <div class="text-center">
                        
                        <span type="span" class="label label-info">
                    <?php     echo "Rating: ".$rs['avgrate']; ?>&nbsp;<i class="fa fa-star-o"></i>
                         </span>
                        
                        
                        <br />
                        <span type="span" class="label label-default">
                        <?php echo $rs['pname']; ?> </span>
                        
                        <span type="span" class="label label-primary">
                        <em><br/>Manager -</em>&nbsp;&nbsp;
                        <?php echo $rs['pmanager']; ?>
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
<?php include_once 'footer.php'; ?>