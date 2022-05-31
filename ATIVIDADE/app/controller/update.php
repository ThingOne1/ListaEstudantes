<?php
namespace App\controller;
include_once('../../vendor/autoload.php');

use App\model\update;
use App\model\connection;

$conn = new connection();
$conn=$conn->conn();
$update = new update();

session_start();
$id_turma = $_SESSION['id_turma'];
$id_ano = $_SESSION['id_ano'];
$id_escola = $_SESSION['id_escola'];
$id_edit = $_SESSION['id_edit'];

$result = $update->Editar($id_escola,$id_ano,$id_turma,$id_edit,$conn);

Editar($result);
function Editar($result) {
    
    if (pg_num_rows($result)>0) {
      $response="";
      while($rows=pg_fetch_assoc($result)){
          $response.="
          <label for='name'><h6 class='text-white'>Nome do Aluno</h6></label>
          <input id='name_update' type='text' class='form-control mb-2 mx-auto' placeholder='Nome aluno' name='name' value='".iconv('ISO-8859-1','UTF-8', $rows['ed47_v_nome'])."'>
          <label for='name'><h6 class='text-white' >Turma</h6></label>
          <input id='turma_update' type='text'class='form-control mb-2 mx-auto' placeholder='Turma' name='turma' value='".$rows['ed57_c_descr']."'>
          <label for='name'><h6 class='text-white' >Nome da escola</h6></label>
          <input id='escola_update' type='text' class='form-control mb-2 mx-auto' placeholder='Nome da escola' name='idade' value='".$rows['ed18_c_nome']."'>
          <label for='name'><h6 class='text-white' >Data da matricula</h6></label>
          <input id='data_update' type='text' class='form-control mb-2 mx-auto' placeholder=' Data da matricula ' name='data' value='".$rows['ed52_c_descr']."'>
          <button onclick='Trocardados()' class='btn btn-secondary' name='update'> Update </button>";
      }
      return $response;
    }
  }
 ?>
