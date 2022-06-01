<?php
namespace App\model;

class Calendario extends connection {

public function Buscardata($id_escola){
  
      $conexao=$this->conexao;
      $query = "select
          c2.ed52_i_ano,
          c2.ed52_c_descr
        from
          escola.calendarioescola c
          inner join escola.escola e on
          e.ed18_i_codigo = c.ed38_i_escola
          inner join escola.calendario c2 on
          c2.ed52_i_codigo = c.ed38_i_calendario
        where
          c.ed38_i_escola="."$id_escola"."
        order by
          c2.ed52_i_ano";

      $result = pg_query($conexao,$query);
      
      return $result;
}

}
?>
