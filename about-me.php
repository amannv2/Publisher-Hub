<?php
ob_start();
include_once 'functions.php';

if (validate() == true) {
    include_once 'header-log.php';
} else {
    include_once 'header.php';
}

include_once 'db.php';


if (!empty($_REQUEST['publishers'])) {
    $publishers = mysql_real_escape_string($_REQUEST['publishers']);

    $sql = "SELECT * FROM publisher WHERE pname LIKE '%" . $publishers . "%'";
    $r_query = mysql_query($sql);
    $row = mysql_fetch_array($r_query);

    setcookie("SLC", $row['pemail'], time() + 365 * 24 * 60 * 60);
    setcookie("SLD", $row['pname'], time() + 365 * 24 * 60 * 60);

    //$sqlb1="SELECT * FROM books where bpublisher LIKE '%".$publishers."%'";
    $sqlb1 = "SELECT * FROM books where bpublisher LIKE '%" . $publishers .
        "%' ORDER BY isbn";
    $q1 = mysql_query($sqlb1);
    $r1 = mysql_fetch_array($q1);

    $sqlb2 = "SELECT * FROM books where bpublisher LIKE '%" . $publishers .
        "%' ORDER BY isbn LIMIT 2,1";
    $q2 = mysql_query($sqlb2);
    $r2 = mysql_fetch_array($q2);

    $sqlb3 = "SELECT * FROM books where bpublisher LIKE '%" . $publishers .
        "%' ORDER BY isbn LIMIT 3,1";
    $q3 = mysql_query($sqlb3);
    $r3 = mysql_fetch_array($q3);

    $sqlb4 = "SELECT * FROM books where bpublisher LIKE '%" . $publishers .
        "%' ORDER BY isbn LIMIT 1,1";
    $q4 = mysql_query($sqlb4);
    $r4 = mysql_fetch_array($q4);

    $sqlb5 = "SELECT COUNT(*),AVG(rate) FROM tbl_rating as avg where pname LIKE '%" .
        $publishers . "%'";
    $q5 = mysql_query($sqlb5);
    $r5 = mysql_fetch_array($q5);
}
ob_end_flush(); ?>

        <!-- === BEGIN CONTENT === -->
        <style>
.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown:hover .dropdown-content {
    display: block;
}

.desc {
    padding: 15px;
    text-align: center;
}
</style>
        
        <div id="content">
            <div class="container background-white">
                <div class="row margin-vert-30">
                    <div class="col-md-12">
                       <h2 class="margin-bottom-20"><strong><?php echo $row['pname'] ?></strong></h2>
                        <div class="row">
                            <div class="col-md-4 animate fadeIn">
                                <div class="portfolio-item">
                                  
                                        <figure class="animate fadeInLeft">
                                            <div class="grid-image">
                                                <div class="featured-info">
                                                    <div class="info-wrapper">
                                                        <h3><?php echo $row['pmanager'] ?></h3>
                                                        
                                                    </div>
                                                </div>
                                                <?php echo "<img src='uploads/allpubs/" . $row['logoo'] ."' style='height: 289px; width: 520px;'>"; ?>
                                            </div>
                                        </figure>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-8 margin-bottom-10 animate fadeInRight">
                                <h3 class="padding-top-10 pull-left"><b><?php echo
$row['pmanager'] ?></b>
                                    <small>- Manager</small>
                                </h3>
                                <div class="clearfix"></div>
                                <h4>
                                    <em><?php echo $row['pdesc'] ?></em>
                                </h4>
                                <p>Contact Info:</p>
                                <p>Phone no. :  <?php echo $row['pphone'] ?></p>
                                <p>E-mail    :  <?php echo $row['pemail']; ?></p>
                                <p>Address   :  <?php echo $row['paddr'] ?></p>
                                <p>Field     :  <?php echo $row['fld'] ?></p>
                                
                                <?php include_once 'rate.php' ?>
                                </div>
                        </div>
                        
                        </br>
                       
                        <?php include_once 'ourworks.php' ?>
                        
                         <!-- Accordion - Alternative -->
                         <figure class="animate fadeInUp">
                        <div id="accordion2" class="panel-group alternative">
                            
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a class="accordion-toggle" href="#collapse2-Two" data-parent="#accordion2" data-toggle="collapse">
                                            Want to get your book printed?
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapse2-Two" class="accordion-body collapse">
                                    <div class="panel-body">
                                     
                                     <!-- Tab v3 -->
                        <div class="row tabs">
                            <div class="col-sm-3">
                                <ul class="nav nav-pills nav-stacked">
                                    <li class="active">
                                        <a href="#sample-3a" data-toggle="tab">
                                            <i class="fa fa-gift"></i> Sample First?</a>
                                    </li>
                                    <li>
                                        <a href="#sample-3b" data-toggle="tab">
                                            <i class="fa fa-money"></i> Place Your Order</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-sm-9">
                                <div class="tab-content">
                                    <div class="tab-pane fade in active" id="sample-3a">
                                        <div class="row">
                                            <div class="col-md-12">
                                               
                                            <h3 class="no-margin no-padding">Send us your book in pdf format</h3>
                                                <p>
                                                <form action="samplepdf.php" method="POST" enctype="multipart/form-data">
                                                     <table class="table">
                                                          <tbody>                                                            
                                                            <tr>
                                                              <td>Book Title:</td>
                                                              <td><input type="text" name="fbtitle" required ></td><br /><br />
                                                            </tr>
                                                                                                                                                                                    
                                                            <tr>
                                                              <td>Book Cover:</td>
                                                              <td><select name="fbcover" class="form-control" style="width: 200px;" title="Select Book Cover">
                                                              <option value="Soft Cover:50">Soft Cover</option>
                                                              <option value="Hard Cover:100">Hard Cover</option>
                                                              <option value="Hard Cover with Jacket:150">Hard Cover with Jacket</option>
                                                              </select> <a href="assets/img/bookcover.jpg" target="_blank">more info</a> </td>
                                                            </tr>
                                                            
                                                            <tr>
                                                              <td>Page Quality:</td>
                                                              <td><select name="fpq" class="form-control" style="width: 200px;" title="Select Page Quality">
                                                              <option value="Low Quality:1">Low Quality</option>
                                                              <option value="Medium Quality:3">Medium Quality</option>
                                                              <option value="High Quality:5">High Quality</option>
                                                              </select>      
                                                            </tr>
                                                            
                                                            <tr>
                                                              <td>Page Size(in inches):</td>
                                                              <td><select name="fsize" class="form-control" style="width: 200px;" title="Select Page Size">
                                                              <option value="Square 8.5 x 8.5:1">Square 8.5 x 8.5</option>
                                                              <option value="Large Square 10 x 10:2">Large Square 10 x 10</option>
                                                              <option value="Landscape 9 x 7:3">Landscape 9 x 7</option>
                                                              <option value="Landscape 11 x 8.5:4">Landscape 11 x 8.5</option>
                                                              <option value="Landscape 12 x 9:5">Landscape 12 x 9</option>
                                                              <option value="Comic Book 6.625 x 10.25:6">Comic Book 6.625 x 10.25</option>
                                                              <option value="US Letter 8.5 x 11:7">US Letter 8.5 x 11</option>
                                                              <option value="Portrait 8 x 10:8">Portrait 8 x 10</option>
                                                              <option value="Pocket Book 4.25 x 6.87:9">Pocket Book 4.25 x 6.87</option>
                                                              <option value="Digest 5.5 x 8.5:6">Digest 5.5 x 8.5</option>
                                                              <option value="US Trade 6 x 9:5">US Trade 6 x 9</option>
                                                              <option value="Small Square 7.5 x 7.5:2">Small Square 7.5 x 7.5</option>
                                                              <option value="Large Portrait 9 x 12:10">Large Portrait 9 x 12</option>
                                                              </select><a href="assets/img/pagesizes.jpg" target="_blank">more info</a></td>
                                                            </tr>
                                                            
                                                            <tr>
                                                              <td>Printing Type:</td>
                                                              <td><select name="ftype"  class="form-control" style="width: 200px;" title="Select Print Type">
                                                              <option value="Colored:2">Colored</option>
                                                              <option value="Black n White:1">Black n White</option>
                                                              </select><a href="assets/img/prtype.jpg" target="_blank">more info</a></td>
                                                            </tr>    
                                                            
                                                            <tr>
                                                              <td>Quantity:</td>
                                                              <td><input type="number" id="fqt" name="fquantity" min="1" max="5" required> <br /><br /></td>
                                                            </tr>
                                                            
                                                            <tr>
                                                              <td>Delivery Address:</td>
                                                              <td><textarea rows="4" cols="6" style="resize: none;" class="form-control" name="freeaddr" maxlength="100" required></textarea><br /></td>
                                                            </tr>
                                                            
                                                            <tr>
                                                              <td>Select PDF:</td>
                                                              <td><input type="file" name="freepdf" accept=".pdf" class="form-control" required ><br />
                                                              </td>
                                                            </tr>                                                          
                                                            
                                                            <tr>
                                                              <td>Book Cover Picture:</td>
                                                              <td><input type="file" name="fbpic" accept="image/*" class="form-control" id="fbpic" required />                    </td>
                                                            </tr>
                                                            
                                                          </tbody>
                                                        </table>
                                                    <input type="submit" name="submit" />
                                                </form>
                                                </p>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    
                                        <!--    //final order -->
                                    
                                    <div class="tab-pane fade in" id="sample-3b">
                                        <h3 class="no-margin no-padding">Send us your book in pdf format</h3>
                                                <p>
                                                <form action="sendpdf.php" method="POST" id="pdfform" enctype="multipart/form-data">
                                                     <table class="table" >
                                                      <tbody>                                                                                                                
                                                        <tr>
                                                          <td>Book Title:</td>
                                                          <td><input type="text" name="btitle" required ></td><br /><br />
                                                        </tr>                                                     
                                                        
                                                        <tr>
                                                          <td>Book Cover:</td>
                                                          <td><select name="bcover" id="bc" class="form-control" onchange="showprice()" style="width: 200px;" title="Select Book Cover">
                                                              <option value="Soft Cover:50">Soft Cover</option>
                                                              <option value="Hard Cover:100">Hard Cover</option>
                                                              <option value="Hard Cover with Jacket:150">Hard Cover with Jacket</option>
                                                          </select> <a href="assets/img/bookcover.jpg" target="_blank">more info</a> </td>
                                                        </tr>
                                                        
                                                        <tr>
                                                          <td>Page Quality:</td>
                                                          <td><select name="pq" id="pagqual" class="form-control" onchange="showprice()" style="width: 200px;" title="Select Page Quality">
                                                              <option value="Low Quality:1">Low Quality</option>
                                                              <option value="Medium Quality:3">Medium Quality</option>
                                                              <option value="High Quality:5">High Quality</option>
                                                          </select>      
                                                        </tr>
                                                        
                                                        <tr>
                                                          <td>Page Size(in inches):</td>
                                                          <td><select name="size" id="psize" class="form-control" onchange="showprice()" style="width: 200px;" title="Select Page Size">
                                                              <option value="Square 8.5 x 8.5:1">Square 8.5 x 8.5</option>
                                                              <option value="Large Square 10 x 10:2">Large Square 10 x 10</option>
                                                              <option value="Landscape 9 x 7:3">Landscape 9 x 7</option>
                                                              <option value="Landscape 11 x 8.5:4">Landscape 11 x 8.5</option>
                                                              <option value="Landscape 12 x 9:5">Landscape 12 x 9</option>
                                                              <option value="Comic Book 6.625 x 10.25:6">Comic Book 6.625 x 10.25</option>
                                                              <option value="US Letter 8.5 x 11:7">US Letter 8.5 x 11</option>
                                                              <option value="Portrait 8 x 10:8">Portrait 8 x 10</option>
                                                              <option value="Pocket Book 4.25 x 6.87:9">Pocket Book 4.25 x 6.87</option>
                                                              <option value="Digest 5.5 x 8.5:6">Digest 5.5 x 8.5</option>
                                                              <option value="US Trade 6 x 9:5">US Trade 6 x 9</option>
                                                              <option value="Small Square 7.5 x 7.5:2">Small Square 7.5 x 7.5</option>
                                                              <option value="Large Portrait 9 x 12:10">Large Portrait 9 x 12</option>
                                                          </select><a href="assets/img/pagesizes.jpg" target="_blank">more info</a></td>
                                                        </tr>
                                                        
                                                        <tr>
                                                          <td>Printing Type:</td>
                                                          <td><select name="ptype" id="ptype"  class="form-control" onchange="showprice()" style="width: 200px;" title="Select Print Type">
                                                                <option value="Colored:2">Colored</option>
                                                                <option value="Black n White:1">Black n White</option>
                                                          </select><a href="assets/img/prtype.jpg" target="_blank">more info</a></td>
                                                        </tr>
                                                        
                                                        <tr>
                                                          <td>Total Pages:</td>
                                                          <td><input type="number" id="pg" name="page" min="10" max="3000" onchange="showprice()" required> <br /><br />
                                                          </td>
                                                        </tr>
                                                        
                                                        <tr>
                                                          <td>Quantity:</td>
                                                          <td><input type="number" id="qt" name="quantity" onchange="showprice()" min="99" max="999" required> <br /><br />
                                                          </td>
                                                        </tr>                                                        
                                                        
                                                        <tr>
                                                          <td>Book Description<br />(in 300 characters):</td>
                                                          <td><textarea rows="4" cols="6" style="resize: none;" class="form-control" name="bdesc" maxlength="300" required></textarea></td>
                                                        </tr>
                                                        
                                                        <tr>
                                                          <td>Select PDF:</td>
                                                          <td><input type="file" name="bookpdf" accept=".pdf" class="form-control" required ><br />
                                                          </td>
                                                        </tr>
                                                        
                                                        <tr>
                                                            <td>Book Cover Picture:</td>
                                                            <td><input type="file" name="bpic" accept="image/*"  class="form-control" id="bpic" required />                    </td>
                                                        </tr>
                                                        
                                                      </tbody>
                                                    </table><p id="prt"></p>
                                                    <div class="pm-button">
                                                        <input type="submit"  id="pdfsend" name="submit">
                                                        <button style="float: right;" onclick="window.open('https://www.payumoney.com/paybypayumoney/#/522CF990CC97AC11180F20276F9474A1','_blank')">Pay Now</button>                                                        
                                                        <input type="hidden" name="prc" id="prc" value="" /> <br />
                                                    </div>
                                                </form>
                                                </p>
                                         </div>
                                </div>
                            </div>
                        </div>
                                    <script>
                                    function showprice()
                                    { 
                                        var s=document.getElementById("bc").value;
                                        var bookcover = s.split(":");
    
                                        var s1=document.getElementById("pagqual").value;
                                        var pagequality = s1.split(":");
                                        
                                        var s2=document.getElementById("psize").value;
                                        var pagesize = s2.split(":");
                                        
                                        var s3=document.getElementById("ptype").value;
                                        var printtype = s3.split(":");
                                        
                                        var qty = document.getElementById("qt").value;
                                        var pag = document.getElementById("pg").value;
                                        
                                        var page1 = Number(pagequality[1]) + Number(pagesize[1]) + Number(printtype[1]);
                                        var allpage = page1 * Number(pag);
                                        var book1 = allpage + Number(bookcover[1]);
                                        
                                        var totalprice = book1 * qty;
                                        
                                        if(qty<201)
                                        {
                                            var meta="(Excluding all taxes).";
                                        }
                                        else if(qty>200 && qty <500)
                                        {
                                            var tmp=(totalprice*15)/100;
                                            totalprice-=tmp;
                                            var meta="@15% off on total price(Excluding all taxes).";
                                        }
                                        else
                                        {
                                            var tmp=(totalprice*20)/100;
                                            totalprice-=tmp;
                                            var meta="@20% off on total price(Excluding all taxes).";
                                        }
                                        document.getElementById("prt").innerHTML="Total Price: "+totalprice+" "+meta;
                                        document.getElementById("prc").value=totalprice;
                                    }
                                    </script>
                        <!-- Tab v3 -->
                                        
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        </figure>
                        <!-- End Accordion - Alternative -->                    
                        
                        
                        </div>
                    </div>
                </div>
            </div>
        <!-- Return to Top -->
<a href="javascript:" id="return-to-top"><i class="icon-chevron-up"></i></a>


<!-- ICON NEEDS FONT AWESOME FOR CHEVRON UP ICON -->
<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
 
        <!-- === END CONTENT === -->
        <?php include_once 'footer.php'; ?>