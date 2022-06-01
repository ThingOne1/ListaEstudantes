<?php
namespace App\controller;
include_once('../../vendor/autoload.php');

use App\model\Calendario;

$Calendario = new Calendario();

session_start();
$id_escola=$_REQUEST['id'];
$_SESSION['id_escola'] = $id_escola;

$result = $Calendario->Buscardata($id_escola);

Calendario($result);

function Calendario($result) {
    $response="";
    if (pg_num_rows($result)>0) {
      $response.= "<option value='Selecione'>--Select--</option>";
      while($rows=pg_fetch_assoc($result)){
          $response.= "<option value=$rows[ed52_i_ano]>".iconv("ISO-8859-1","UTF-8", $rows["ed52_c_descr"])."</option> \n";
      }
    }
    echo $response;
  }
?>