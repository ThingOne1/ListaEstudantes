<?php
namespace App\controller;
include_once('../../vendor/autoload.php');

use App\model\Turmas;


$Turmas = new Turmas();

$id_escola = $_REQUEST['id_escola'];
$id_etapa = $_REQUEST['id_etapa'];
$id_ano = $_REQUEST['id_calendario'];

$result = $Turmas->buscarTurmas($id_escola, $id_etapa,$id_ano);

Turmas($result);

function Turmas($result)
    {
        if (pg_num_rows($result)>0)
            {
              $response="";
              $response.= "<option value='Selecione'>--Select--</option>";
              while($rows=pg_fetch_assoc($result))
                  {
                    $response.= "<option value=".$rows['ed57_i_codigo'].">".iconv("ISO-8859-1","UTF-8", $rows["ed57_c_descr"])."</option> \n";
                  }
            }
            echo $response;
    }
 ?>
