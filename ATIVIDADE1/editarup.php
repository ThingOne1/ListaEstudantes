<?php
session_start();
$id_turma = $_SESSION['id_turma'];
$id_ano = $_SESSION['id_ano'];
$id_escola = $_SESSION['id_escola'];
$id_edit = $_SESSION['id_edit'];

Editar($id_escola,$id_ano,$id_turma,$id_edit);
function Editar($id_escola,$id_ano,$id_turma,$id_edit) {
    include 'connection.php';
    $query = "select a.ed47_i_codigo,
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
      function Trocardados(){
        $rows['ed47_v_nome'] = $_POST['name_update'];
        $rows['ed57_c_descr'] = $_POST['turma_update'];
        $rows['ed18_c_nome'] = $_POST['escola_update'];
        $rows['ed52_c_descr'] = $_POST['data_update'];

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
      }
      echo $response;
    }
  }
 ?>
