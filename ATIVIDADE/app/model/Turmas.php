<?php
namespace App\model;


class Turmas{


public function BuscarTurmas($id_escola, $id_etapa,$id_ano,$conn){
      $query =  $query = "select
      distinct ed18_c_nome,
      ed57_i_codigo,
      ed57_c_descr
    from
      turma
    inner join matricula on
      ed60_i_turma = ed57_i_codigo
    inner join turmaserieregimemat on
      ed220_i_turma = ed57_i_codigo
    inner join serieregimemat on
      ed223_i_codigo = ed220_i_serieregimemat
    inner join serie on
      ed11_i_codigo = ed223_i_serie
    inner join matriculaserie on
      ed221_i_matricula = ed60_i_codigo
      and ed221_i_serie = ed223_i_serie
    inner join base on
      ed31_i_codigo = ed57_i_base
    inner join calendario on
      ed52_i_codigo = ed57_i_calendario
    inner join escola e on
      ed18_i_codigo = ed57_i_escola
    where
      ed221_c_origem = 'S'
      and ed52_i_ano = "."$id_ano"."
      and ed223_i_serie = "."$id_etapa"."
      and ed18_i_codigo= "."$id_escola";;

      $result = pg_query($conn,$query);
      
      return $result;
}

}
?>
