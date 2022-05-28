<?php
// Coleta a data do curso
$id_escola=$_REQUEST['id'];
Calendario($id_escola);

function Calendario($obj) {
    include 'connection.php';
    $response="";
    $query = "select
          c2.ed52_i_ano,
          c2.ed52_c_descr
        from
          escola.calendarioescola c
          inner join escola.escola e on
          e.ed18_i_codigo = c.ed38_i_escola
          inner join escola.calendario c2 on
          c2.ed52_i_codigo = c.ed38_i_calendario
        where
          c.ed38_i_escola="."$obj"."
        order by
          c2.ed52_i_ano";
    $result = pg_query($conn,$query);
    if (pg_num_rows($result)>0) {
      $response.= "<option value='Selecione'>--Select--</option>";
      while($rows=pg_fetch_assoc($result)){
          $response.= "<option value=$rows[ed52_i_ano]>".iconv("ISO-8859-1","UTF-8", $rows["ed52_c_descr"])."</option> \n";
      }
    }
    echo $response;
  }
