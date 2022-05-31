<?php
namespace App\model;

class Escolas{

public function BuscarEscolas($conn){ 
      
      $query = "select
        distinct ed18_i_codigo,
        ed18_c_nome
    from
        alunocurso
      inner join escola on
        escola.ed18_i_codigo = alunocurso.ed56_i_escola
      inner join aluno on
        aluno.ed47_i_codigo = alunocurso.ed56_i_aluno
      inner join calendario on
        calendario.ed52_i_codigo = alunocurso.ed56_i_calendario
      inner join base on
        base.ed31_i_codigo = alunocurso.ed56_i_base
      inner join cursoedu on
        cursoedu.ed29_i_codigo = base.ed31_i_curso
      left join alunopossib on
        alunopossib.ed79_i_alunocurso = alunocurso.ed56_i_codigo
      left join serie on
        serie.ed11_i_codigo = alunopossib.ed79_i_serie
      left join turno on
        turno.ed15_i_codigo = alunopossib.ed79_i_turno
    order by
        ed18_c_nome";

      $result = pg_query($conn,$query);
      
      return $result;
}

}
?>
