<?php
namespace App\controller;
include_once('../../vendor/autoload.php');

use App\model\alunomodel;
use App\model\connection;

session_start();

$conn = new connection();
$conn=$conn->conn();
$alunomodel = new alunomodel();

$id_escola = $_REQUEST['id_escola'];
$id_ano = $_REQUEST['id_calendario'];
$id_turma = $_REQUEST['id_turma'];

$_SESSION['id_turma'] = $id_turma;
$_SESSION['id_ano'] = $id_ano;
$_SESSION['id_escola'] = $id_escola;

$result = $alunomodel->buscarAluno($id_ano, $id_escola, $id_turma, $conn);

Alunos($result);

function Alunos($result)
{
   if (pg_num_rows($result) > 0) {
      $response = "";

      $response .= "
                  <div class='pb-5 container'>
                  <div class='row'>
                  <div class='col m-auto'>
                  <div class='card mt-5'>
                  <div id='Alunos' class='card-title'>
                  <tr><h5 class='pt-2'>Tabela de estudantes</h5></tr>
                  <table class='pb-2 table table-hover'>
                  <tr class'table-info'>
                  <td><h6>Nome Estudante</h6></td>
                  <td><h6>Situaçao de matricula</h6></td>
                  <td><h6>Turma</h6></td>
                  <td><h6>Nome da escola</h6></td>
                  <td><h6>Data da matricula</h6></td>
                  <td></td>
                  </tr>";

      while ($rows = pg_fetch_assoc($result)) {
         $response .= "
                         <tr id=" . $rows['ed47_i_codigo'] . ">
                         <td>" . iconv('ISO-8859-1', 'UTF-8', $rows['ed47_v_nome']) . "</td>
                         <td>" . $rows['ed60_c_situacao'] . "</td>
                         <td>" . $rows['ed57_c_descr'] . "</td>
                         <td>" . $rows['ed18_c_nome'] . "</td>
                         <td>" . $rows['ed52_c_descr'] . "</td>
                         <td><button class='btn btn-primary' onclick=Edit(this) type='button' name='button'>Edit</button></td>
                         </tr>";
      }
      $response .= "</table>
                 <a href='app\controller\downloadExcel.php'><button class='btn btn-primary' type='button' id='geraExcel' name='button'>Download Excel</button></a>
                 <a href='downloadPDF.php'><button class='btn btn-primary' type='button' id='geraExcel' name='button'>Download PDF</button></a>
                 </div>
                 </div>
                 </div>
                 </div>
                 </div>";
   }
   echo $response;
}
