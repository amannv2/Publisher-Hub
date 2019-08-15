<?php
    include_once'header.php';
    mysql_connect("localhost", "root", "") or die("Error connecting to database: ".mysql_error());
    /*
        localhost - it's location of the mysql server, usually localhost
        root - your username
        third is your password
         
        if connection fails it will stop loading the page and display an error
    */
     
    mysql_select_db("publisherhub") or die(mysql_error());

    
/*
        localhost - it's location of the mysql server, usually localhost
        root - your username
        third is your password
         
        if connection fails it will stop loading the page and display an error
    */
     
    /* tutorial_search is the name of database we've created */
    $query = $_GET['query']; 
    // gets value sent over search form
     
    $min_length = 2;
    // you can set minimum length of the query if you want
     
    if(strlen($query) >= $min_length){ // if query length is more or equal minimum length then
         
        $query = htmlspecialchars($query); 
        // changes characters used in html to their equivalents, for example: < to &gt;
         
        $query = mysql_real_escape_string($query);
        // makes sure nobody uses SQL injection
         
        $raw_results = mysql_query("SELECT * FROM publisher
            WHERE (`pname` LIKE '%".$query."%')") or die(mysql_error());
             
        // * means that it selects all fields, you can also write: `id`, `title`, `text`
        // articles is the name of our table
         
        // '%$query%' is what we're looking for, % means anything, for example if $query is Hello
        // it will match "hello", "Hello man", "gogohello", if you want exact match use `title`='$query'
        // or if you want to match just full word so "gogohello" is out use '% $query %' ...OR ... '$query %' ... OR ... '% $query'
include('config.php');
$pdo = connect();
$sql="SELECT * FROM publisher WHERE (`pname` LIKE '%".$query."%')";
$quer = $pdo->prepare($sql);
$quer->execute();
$list = $quer->fetchAll();
        if(mysql_num_rows($raw_results) > 0){ // if one or more rows are returned do following
             
            // $results = mysql_fetch_array($raw_results) puts data from database into array, while it's valid it does the loop
                ?>
                
                <div class="container background-white">
                
                <div class="row margin-vert-30">
                <h2 class="text-center article-title">Search Results</h2>
                <div class="content">
                
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
                                    <?php echo "<img src='uploads/allpubs/".$rs['logoo']."' style='height: 289px; width: 520px;'>"  ; ?>
                                </div>
                            </figure>
                        </a>
                    </div>

                        <div class="text-center">
                        <span type="span" class="label label-primary">
                        <?php echo $rs['pname']; ?> </span>
                        <span type="span" class="label label-default">
                        <em><br/>Manager -</em>&nbsp;&nbsp;
                        <?php echo $rs['pmanager']; ?>
                        </span>
                          </div>
                   </div>  
                   
                    <?php } ?>
                <script type="text/javascript">var last_id = <?php echo $last_id; ?>;</script>
            </ul>
                
                </div>
                </div>
                
                
                
                <?php
                // posts results gotten from database(title and text) you can also show id ($results['id'])
            
             
        }
        else{ // if there is no matching rows do following
                  ?>
                <br />  <div class="panel panel-red ">
                  <div class="panel-heading text-center">
                    <h3 class="panel-title">Oops..</h3>
                  </div>
                    <div class="panel-body text-center">
                      No Results Found. We don't have any publisher with this name.<br /> 
                      <a href="allpublisher.php" style="color: red;">Go Back</a> 
                  </div>
                </div> 
                <?php 
        }
         
    }
    else{ // if query length is less than minimum
        echo "Minimum length is ".$min_length;
    } ?> </div> <!-- Return to Top -->
<a href="javascript:" id="return-to-top"><i class="icon-chevron-up"></i></a>


<!-- ICON NEEDS FONT AWESOME FOR CHEVRON UP ICON -->
<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
  <?php
    include_once'footer.php'; ?>