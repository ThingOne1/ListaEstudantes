<?php
$id_nomeEscola=$_REQUEST['id'];
Etapas($id_nomeEscola);
function Etapas($obj2) {
    include 'connection.php';
    $response = "";
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
              and ed18_i_codigo= "."$obj2";
              $result = pg_query($conn, $query);
              if (pg_num_rows($result) > 0) {
                $response = "";
                $response.= "<option value='Selecione'>--Select--</option>";
                while ($rows = pg_fetch_assoc($result)) {
                  $response .= "<option value=" . $rows['ed11_i_codigo'] . ">" . iconv("ISO-8859-1", "UTF-8", $rows["ed11_c_descr"]) . "</option> \n";
                }
              }
              echo $response;
            }

 ?>
