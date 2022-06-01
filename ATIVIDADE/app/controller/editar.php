<?php
namespace App\controller;
include_once('../../vendor/autoload.php');

use App\model\editar;

$editar = new editar();

session_start();
$id_escola = $_REQUEST['id_escola'];
$id_ano = $_REQUEST['id_calendario'];
$id_turma = $_REQUEST['id_turma'];
$id_edit = $_REQUEST['id_edit'];
$_SESSION['id_turma'] = $id_turma;
$_SESSION['id_ano'] = $id_ano;
$_SESSION['id_escola'] = $id_escola;
$_SESSION['$id_edit'] = $id_edit;

$result = $editar->Editar($id_escola,$id_ano,$id_turma,$id_edit);

Editar($result);

function Editar($result) 
{  
    if (pg_num_rows($result)>0) {
      $response="";
      $response="
       <div class='pb-5 container'>
       <div class='row'>
       <div class='col m-auto'>
       <div class='card mt-5'>
       <div id='Alunos' class='card-title'>
       <tr><h6 class='pt-2'>Tabela de estudantes</h6></tr>
       <table class='pb-2 table table-hover'>
       <tr class'table-info'>
       <td><h6>Nome Estudante</h6></td>
       <td><h6>Situaçao de matricula</h6></td>
       <td><h6>Turma</h6></td>
       <td><h6>Nome da escola</h6></td>
       <td><h6>Data da matricula</h6></td>
       <td></td>
       <td></td>
       </tr>";
      while($rows=pg_fetch_assoc($result)){
          $response.="
            <tr id=".$rows['ed47_i_codigo'].">
            <td>".iconv('ISO-8859-1','UTF-8', $rows['ed47_v_nome'])."</td>
            <td>".$rows['ed60_c_situacao']."</td>
            <td>".$rows['ed57_c_descr']."</td>
            <td>".$rows['ed18_c_nome']."</td>
            <td>".$rows['ed52_c_descr']."</td>
            <td><a href='index.php'><button class='btn btn-secondary' type='button' name='button'>Voltar</button></a></td>
            <td><button class='btn btn-secondary'  onclick=Update() type='button' name='button'>Confirmar</button></td>
            </tr>";
      }
      $response.="
      </table>
      </div>
      </div>
      </div>
      </div>
      </div>";

      echo $response;
    }
  }


 ?>
