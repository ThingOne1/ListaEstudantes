<?php
namespace App\model;

class editar
{
  
function Editar($id_escola,$id_ano,$id_turma,$id_edit,$conn) {
    
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
    
    return $result;
    }
  }


 ?>
