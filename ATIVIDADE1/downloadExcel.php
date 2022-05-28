<?php
 session_start();
 $id_turma = $_SESSION['id_turma'];
 $id_ano = $_SESSION['id_ano'];
 $id_escola = $_SESSION['id_escola'];

 Download($id_escola,$id_ano,$id_turma);

 function Download($id_escola,$id_ano,$id_turma) {

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
           order by
           to_ascii(ed47_v_nome)";

           $result = pg_query($conn,$query);

           if (pg_num_rows($result)>0) {
                 $response="";
                 $response="<table border='1'>
                  <tr class'table-info'>
                  <td><h6>Nome Estudante</h6></td>
                  <td><h6>Situaçao de matricula</h6></td>
                  <td><h6>Turma</h6></td>
                  <td><h6>Nome da escola</h6></td>
                  <td><h6>Data da matricula</h6></td>
                  </tr>";

                 while($rows=pg_fetch_assoc($result)){
                     $response.="
                       <tr>
                       <td>".iconv('ISO-8859-1','UTF-8', $rows['ed47_v_nome'])."</td>
                       <td>".$rows['ed60_c_situacao']."</td>
                       <td>".$rows['ed57_c_descr']."</td>
                       <td>".$rows['ed18_c_nome']."</td>
                       <td>".$rows['ed52_c_descr']."</td>
                       </tr>";
                 }


            }

            // Definimos o nome do arquivo que será exportado
            $arquivo = "ListaOficial.xls";
            // Configurações header para forçar o download
            // Determina que o arquivo é uma planilha do Excel
           header("Content-type: application/vnd.ms-excel");

           // Força o download do arquivo
           header("Content-type: application/force-download");

           // Seta o nome do arquivo
           header("Content-Disposition: attachment; filename='".$arquivo."'");

           header("Pragma: no-cache");

           // Imprime o conteúdo da nossa tabela no arquivo que será gerado
           echo $response;

        }


  ?>
