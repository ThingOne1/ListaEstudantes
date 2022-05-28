<?php
  //Variaveis para trocar caso precise
  $HostName = "192.168.150.240";
  $port = "5432";
  $NomeBancodeDados = "sge2020";
  $senha = "3c1d@d3@2020$09";
  //Connection to DataBase:
  $appName = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
  $connStr = "host=".$HostName." port=".$port." dbname=".$NomeBancodeDados." user=ecidade password=".$senha."'--application_name=$appName'";
  $conn = pg_connect($connStr);
 ?>
