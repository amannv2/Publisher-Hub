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
$db_hostname = 'localhost';
    $db_username = 'root';
    $db_password = '';
    $db_database = 'publisherhub';
    
    // Database Connection String
    $con = mysql_connect($db_hostname,$db_username,$db_password);
    if (!$con)
      {
      die('Could not connect: ' . mysql_error());
    }
    mysql_select_db($db_database, $con); 
// select 4 items ordered by id
$c = $_COOKIE['SLZ'];
$sql = "SELECT * FROM sampleorder WHERE publisher = '".$c."' ORDER BY oid ASC LIMIT 0, 100";
$query = $pdo->prepare($sql);
$query->execute();
$list = $query->fetchAll();
?>

    <div class="container background-white">
        <div class="row margin-vert-30">
        <br />
        <h2 class="text-center article-title">Sample Requests</h2>
        <div class="content">
            <ul id="items">
                <?php
                $last_id = 0;
                foreach ($list as $rs) {
                    $last_id = $rs['oid']; // keep the last id for the paging
                    ?>             
                    
                    
                    <div class="panel panel-blue">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                            <i class="fa fa-book" aria-hidden="true"></i>
                            <?php echo $rs['bname']; ?></h3>
                        </div>
                        
                    <div class="panel-body text-center">
                    
                    <div class="row">                        
                        <div class="col-md-12">           
                        <?php 
                        $s="SELECT * FROM authors WHERE email = '".$rs['author']."'";
                        $que = mysql_query($s);
                        $row= mysql_fetch_array($que);

                        
                        ?>          
                        <p style="font-size: 20px;">Author: <?php echo $row['fname']." ".$row['lname']; ?></p>
                        <p style="font-size: 20px;">Page Size: <?php echo $rs['pagesize']; ?></p>
                        <p style="font-size: 20px;">Page Quality: <?php echo $rs['pagequality']; ?></p>
                        <p style="font-size: 20px;">Book Cover: <?php echo $rs['bookcover']; ?></p>
                        <p style="font-size: 20px;">Printing Type: <?php echo $rs['ptype']; ?></p>
                        <p style="font-size: 20px;">Address: <?php echo $rs['addr']; ?></p>
                        <p style="font-size: 20px;">Date: <?php echo $rs['ordertime']; ?></p>
                        </div>
                    </div>
                    
                    </div>
                </div>    
                    <?php
                }
                ?>
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