<?php
$id_escola = $_REQUEST['id_escola'];
$id_ano = $_REQUEST['id_calendario'];
$id_turma = $_REQUEST['id_turma'];
$id_edit = $_REQUEST['id_edit'];
// var_dump($_REQUEST['id_edit']);
// die(); // <<<< ta vindo uma string vazia olhar isso!!
update($id_escola,$id_ano,$id_turma,$id_edit);
function update($id_escola,$id_ano,$id_turma,$id_edit) {
    include 'connection.php';
    $query = "update a.ed47_i_codigo,
    a.ed47_v_nome,
    m.ed60_c_situacao,
    e.ed18_c_nome,
    t.ed57_c_descr,
    c.ed52_c_descr
    from
    escola.matricula m
    inner join escola.turma t on
    m.ed60_i_turma = t.ed57_i_codigo
    inner join escola.escola e on
    t.ed57_i_escola = e.ed18_i_codigo
    inner join escola.base b on
    b.ed31_i_codigo = t.ed57_i_base
    inner join escola.cursoedu c2 on
    c2.ed29_i_codigo = b.ed31_i_curso
    inner join escola.aluno a on
    m.ed60_i_aluno = a.ed47_i_codigo
    inner join escola.calendario c on
    t.ed57_i_calendario = c.ed52_i_codigo
    where
    c.ed52_i_ano = "."$id_ano"."
    and m.ed60_c_situacao = 'MATRICULADO'
    and e.ed18_i_codigo = "."$id_escola"."
    and t.ed57_i_codigo = "."$id_turma"."
    and a.ed47_i_codigo = "."$id_edit"."
    order by
    to_ascii(ed47_v_nome)";
    $result = pg_query($conn,$query);
    if (pg_num_rows($result)>0) {
      $response="";
      $response=" <tr>
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
            <td><button class='voltar' onclick=Alunos() type='button' name='button'>Voltar</button></td>
            <td><button class='editaluno' onclick=update(this) type='button' name='button'>Confirmar</button></td>
            </tr>";
      }
      echo $response;
    }
  }

 ?>
