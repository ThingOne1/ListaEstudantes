<?php
namespace App\controller;
include_once('../../vendor/autoload.php');

use App\model\Etapas;

$Etapas = new Etapas();

session_start();
$id_escola = $_SESSION['id_escola'];

$result = $Etapas->BuscarEtapas($id_escola);

Etapas($result);
function Etapas($result)
  {
    $response = "";

            if (pg_num_rows($result) > 0)
              {
                $response = "";
                $response.= "<option value='Selecione'>--Select--</option>";
                while ($rows = pg_fetch_assoc($result))
                {
                  $response .= "<option value=" . $rows['ed11_i_codigo'] . ">" . iconv("ISO-8859-1", "UTF-8", $rows["ed11_c_descr"]) . "</option> \n";
                }
              }
                echo $response;
    }

 ?>
