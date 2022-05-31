<?php
namespace App\controller;
include_once('../../vendor/autoload.php');

use App\model\Escolas;
use App\model\connection;

$conn = new connection();
$conn=$conn->conn();
$Escolas = new Escolas();

$result = $Escolas->BuscarEscolas($conn);

pegar_nomeescola($result);
function pegar_nomeescola($result)
      {
       $response="<option value='selecione'>--Select--</option>";
       if (pg_num_rows($result) > 0) {
           while ($rows = pg_fetch_assoc($result)) {
               $response.="<option value=$rows[ed18_i_codigo]>" . iconv("ISO-8859-1", "UTF-8", $rows["ed18_c_nome"]) . "</option>";
           }
           echo $response;
       }
   }
?>
