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
$sql = "SELECT * FROM req_pub ORDER BY rp_id ASC LIMIT 0, 100";
$query = $pdo->prepare($sql);
$query->execute();
$list = $query->fetchAll();
?>


    <div class="container background-white">
        <div class="row margin-vert-30">
        <h1 class="text-center"><u>Pending Publisher Requests</u></h1>
        
        <div class="content">
            <ul id="items">
                <?php
                $last_id = 0;
                foreach ($list as $rs) {
                    $last_id = $rs['rp_id']; // keep the last id for the paging
                    ?>
                    
                    <h1><i class="fa fa-users" aria-hidden="true"></i>
                    <?php echo $rs['pub']; ?></h1>
                    <div class="col-md-13"> 
                        <blockquote class="primary">
                        <div class="row">
                       
                        <div class="col-md-5">
                        <?php echo "<img src='uploads/allpubs/".$rs['logo']."' style='height: 222px; width: 520px;'>"  ;  ?>
                        </div>
                        
                        <div class="col-md-7">
                            <dl class="dl-horizontal">
                                    <dt>Manager:</dt>
                                    <dd><?php echo $rs['mname']; ?></dd>
                                    <dt>Phone no.:</dt>
                                    <dd><?php echo $rs['phone']; ?></dd>
                                    <dt>Email:</dt>
                                    <dd><?php echo $rs['email']; ?></dd>
                                    <dt>Worked Previously?:</dt>
                                    <dd><?php echo $rs['pubbefore']; ?></dd>
                                    <dt>Previous Work:</dt>
                                    <dd><?php echo $rs['ab']; ?></dd>
                                    <dt >About Publisher:</dt>
                                    <dd><?php echo $rs['abtpub']; ?></dd>
                                    <dt>Address:</dt>
                                    <dd><?php echo $rs['addr']; ?></dd>
                                    <dt>Field of Publishing:</dt>
                                    <dd><?php echo $rs['fld']; ?></dd>
                                    <dt>Submission Date:</dt>
                                    <dd><?php echo $rs['reg_date']; ?></dd>
                            </dl>
                            </div>                            
                            <button type="button" style="float: right; background-color: green;"  ama="<?php echo $rs['rp_id']; ?>" class="btn btn-successs">
                            <i class="fa fa-check"></i></button>
                            <button type="button" style="background-color: red;;" class="btn btn-dangerr"  ama="<?php echo $rs['rp_id']; ?>">
                            <i class="fa fa-times"></i></button>
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