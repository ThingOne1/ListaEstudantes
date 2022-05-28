<?php
  //Connection to DataBase:
  $appName = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
  $connStr = "host= 192.168.150.240 port=5432 dbname=sge2020 user=ecidade password=3c1d@d3@2020$09'--application_name=$appName'";
  $conn = pg_connect($connStr);
 ?>
