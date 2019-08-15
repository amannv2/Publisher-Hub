<?php

  $id = $_GET['id'];
  
  $link = mysql_connect("localhost", "root", "");
  mysql_select_db("publisherhub");
  $sql = "SELECT logo FROM req_pub WHERE rp_id=$id";
  $result = mysql_query("$sql");
  $row = mysql_fetch_assoc($result);
  mysql_close($link);

  header("Content-type: image/jpeg");
  echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['logo'] ).'"/>';

?>