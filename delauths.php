<?php
// including the config file
include_once 'functions.php';

if(validate()==true)
        {   
          include_once'header-admin.php';
        }
        else
        {
include_once'header.php';}


include('config.php');
$pdo = connect();
// select 4 items ordered by id
$sql = "SELECT * FROM authors ORDER BY r_id ASC LIMIT 0, 100";
$query = $pdo->prepare($sql);
$query->execute();
$list = $query->fetchAll();
?>


    <div class="container background-white">
        <div class="row margin-vert-30">
        <h1 class="text-center"><u>Authors</u></h1>
        
        <div class="content">
            <ul id="items">
                <?php
                $last_id = 0;
                foreach ($list as $rs) {
                    $last_id = $rs['r_id']; // keep the last id for the paging
                    ?>
                    
                    <h1><i class="fa fa-user-circle" aria-hidden="true"></i>
                    <?php echo $rs['fname']." ".$rs['lname']; ?></h1>
                    <div class="col-md-13"> 
                        <blockquote class="primary">
                           <div class="row">
                           <div class="col-md-7">
                            <dl class="dl-horizontal">
                                    <dt>Phone no.:</dt>
                                    <dd><?php echo $rs['phone']; ?></dd>
                                    <dt>Email:</dt>
                                    <dd><?php echo $rs['email']; ?></dd>
                                    <dt>Worked Previously?:</dt>
                                    <dd><?php echo $rs['bookbefore']; ?></dd>
                                    <dt>Previous Work(if any):</dt>
                                    <dd><?php echo $rs['bp']; ?></dd>
                                    <dt >About Author:</dt>
                                    <dd><?php echo $rs['adesc']; ?></dd>
                                    <dt>Address:</dt>
                                    <dd><?php echo $rs['addr']; ?></dd>
                                    <dt>Field of Writing:</dt>
                                    <dd><?php echo $rs['fld']; ?></dd>
                                    <dt>Submission Date:</dt>
                                    <dd><?php echo $rs['submission_date']; ?></dd>                                    
                            </dl>  
                            </div> 
                            <div class="col md-4">
                            <button type="button" style="float: right; background-color: red;" class="btn btn-dangerrr" ama="<?php echo $rs['r_id']; ?>" id="cross">
                            <i class="fa fa-times"></i></button>
                            </div>                         
                            
                            </div>
                        </blockquote>
                    </div>
                        <br />
                    
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
</body>
</html>
<?php include_once'footer.php'; ?>