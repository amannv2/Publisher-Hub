 <!-- Primary Panel -->
                        <figure class="animate fadeInUp">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Some of Our Works</h3>
                                    </div>
                                    <div class="panel-body">
                                        
                                    
                                      
                                        <!-- Our works -->
                        <div class="tabs alternative">
                        
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a href="#sample-2a" data-toggle="tab"><?php echo $r1['bname'] ?></a>
                                </li>
                                <li>
                                    <a href="#sample-2b" data-toggle="tab"><?php echo $r2['bname'] ?></a>
                                </li>
                                <li>
                                    <a href="#sample-2c" data-toggle="tab"><?php echo $r3['bname'] ?></a>
                                </li>
                                <li>
                                    <a href="#sample-2d" data-toggle="tab"><?php echo $r4['bname'] ?></a>
                                </li>
                            </ul>
                            

        <div class="tab-content">
                               

      <div class="tab-pane fade in active" id="sample-2a">
      <div class="row">
                                        

       <!-- Wrapper for slides -->
      
      <div class="col-md-5">
          <?php echo "<img src='uploads/allbooks/" . $r1['bpic'] ."' style='height: 230px; width: 370px;'>"; ?>
      </div>

      <div class="col-md-7">
          <h3 class="no-margin no-padding"><u>Description</u></h3>
               <p><?php echo $r1['bdesc']; ?>
                <br />
               <ul> 
               <li> Author: <?php echo $r1['bauthor']; ?>
               <li> Market Price: <?php echo $r1['bprice']; ?>
               <li> ISBN: <?php echo $r1['isbn']; ?>
               </ul>
               </p>
      </div>
      </div>
      </div>
                                
                                
                                
                                
        <div class="tab-pane fade in" id="sample-2b">
          <div class="row">
  <!-- Wrapper for slides -->
        <div class="col-md-5">
          <?php echo "<img src='uploads/allbooks/" . $r2['bpic'] ."' style='height: 230px; width: 370px;'>"; ?>
      </div>
                                        <div class="col-md-7">
                                            <h3 class="no-margin no-padding"><u>Description</u></h3>
                                            <p><?php echo $r2['bdesc']; ?>
                                            <br />
                                            <ul> 
                                              <li> Author: <?php echo $r2['bauthor']; ?>
                                              <li> Market Price: <?php echo $r2['bprice']; ?>
                                              <li> ISBN: <?php echo $r2['isbn']; ?>
                                            </ul>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade in" id="sample-2c">
                                    <div class="row">
                                        

  <!-- Wrapper for slides -->
    <div class="col-md-5">
          <?php echo "<img src='uploads/allbooks/" . $r3['bpic'] ."' style='height: 230px; width: 370px;'>"; ?>
      </div>


                                        <div class="col-md-7">
                                            <h3 class="no-margin no-padding"><u>Description</u></h3>
                                            <p><?php echo $r3['bdesc']; ?>
                                            <br />
                                            <ul> 
                                              <li> Author: <?php echo $r3['bauthor']; ?>
                                              <li> Market Price: <?php echo $r3['bprice']; ?>
                                              <li> ISBN: <?php echo $r3['isbn']; ?>
                                            </ul></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade in" id="sample-2d">
                                    <div class="row">
                                        

  <!-- Wrapper for slides -->
  
      <div class="col-md-5">
          <?php echo "<img src='uploads/allbooks/" . $r4['bpic'] ."' style='height: 230px; width: 370px;'>"; ?>
      </div>

                                        <div class="col-md-7">
                                            <h3 class="no-margin no-padding"><u>Description</u></h3>
                                            <p><?php echo $r4['bdesc']; ?>
                                            <br />
                                            <ul> 
                                              <li> Author: <?php echo $r4['bauthor']; ?>
                                              <li> Market Price: <?php echo $r4['bprice']; ?>
                                              <li> ISBN: <?php echo $r4['isbn']; ?>
                                            </ul></p>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <br />
                            <button class="btn btn-primary" type="button" onClick="parent.open('iscroll.php')">
	                                          See More <i class="fa fa-chevron-right"></i> 
                                            </button>
                                            
                        </div>
                        <!-- End of our works -->
                                        
                                    </div>
                                </div>
                                </figure>
                                <!-- End Primary Panel -->