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
$c = $_COOKIE['usr'];
$sql = "SELECT * FROM books WHERE bauthor = '".$c."' ORDER BY isbn ASC LIMIT 0, 100";
$query = $pdo->prepare($sql);
$query->execute();
$list = $query->fetchAll();
?>
        <div class="content">
            <ul id="items">
                <?php
                $last_id = 0;
                foreach ($list as $rs) {
                    $last_id = $rs['isbn']; // keep the last id for the paging
                    ?>             
                    
                    
                    <div class="panel panel-blue">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                            <i class="fa fa-book" aria-hidden="true"></i>
                            <?php echo $rs['bname']; ?></h3>
                        </div>
                        
                    <div class="panel-body">
                    
                    <div class="row">
                        <div class="col-md-5">
                        <?php echo "<img src='uploads/allbooks/".$rs['bpic']."' style='height: 230px; width: 370px;'>"; ?>
                        </div>
                        <div class="col-md-7">
                        <p style="font-size: 20px;"><?php echo $rs['bdesc']; ?></p>
                        <p style="font-size: 20px;">ISBN: <?php echo $rs['isbn']; ?></p>
                        <p style="font-size: 20px;">Price: <?php echo $rs['bprice']; ?></p>
                        <p style="font-size: 20px;">Publisher: <?php echo $rs['bpublisher']; ?></p><br />
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