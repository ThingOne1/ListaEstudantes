<?php
namespace App\model;

class Etapas extends connection{

public function BuscarEtapas($id_escola){
      $conexao=$this->conexao;
      $query = "select
      distinct ed11_i_codigo,
      ed11_c_descr
    from
      serie s,
      serieregimemat sr,
      turmaserieregimemat tr,
      turma t,
      escola e
    where
      s.ed11_i_codigo = sr.ed223_i_serie
      and sr.ed223_i_codigo = tr.ed220_i_serieregimemat
      and tr.ed220_i_turma = ed57_i_codigo
      and t.ed57_i_escola = e.ed18_i_codigo
      and ed18_i_codigo= "."$id_escola";;

      $result = pg_query($conexao,$query);
      
      return $result;
}

}
?>
