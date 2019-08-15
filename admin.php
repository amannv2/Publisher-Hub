<?php

include_once 'functions.php';

if(validate()==true)
        {   
          include_once'header-admin.php';
        }
        else
        {
include_once'header.php';}

    include_once'db.php';

?>
<br />
<div id="welcome" class="background-white">
            <div class="container">
                <div class="row margin-vert-40">
                    <!-- Main Text -->
                    <div class="col-md-12">
                        <h2 class="text-center article-title">Admin Panel</h2>
                        <button type="button" style=" font-size: large;" onClick="window.location.href='chkreqs.php'" class="btn btn-aqua">
                            <i class="fa fa-5x fa-fw fa-user"></i>Pending Author Requests</button>
                        
                        <button type="button" style="float: right; font-size: large;" onClick="window.location.href='chkpubreq.php'" class="btn btn-blue">
                            <i class="fa fa-5x fa-fw fa-users"></i>Pending Publisher Requests</button>
                            <br /> <br />
                        
                        <button type="button" style="float: left; font-size: large;" onClick="window.location.href='delauths.php'" class="btn btn-red">
                            <i class="fa fa-5x fa-fw fa-trash-o"></i>Delete Registered Author</button>
                            
                        <button type="button" style="float: right; font-size: large;" onClick="window.location.href='delpubs.php'" class="btn btn-red">
                            <i class="fa fa-5x fa-fw fa-trash-o"></i>Delete Registered Publisher</button>       
                    </div>
                    <!-- End Main Text -->
                </div>
            </div>
        </div>

<?php include_once'footer.php'; ?>