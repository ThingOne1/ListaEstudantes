<?php
namespace App\model;
use FFI\Exception;
class connection
{
  public function conn()
  {
    $servidor = "192.168.150.240";
    $bancoDeDados = "sge2020";
    $porta = 5432;
    $usuario = "ecidade";
    $senha = "3c1d@d3@2020$09"; 
    try {

        //Ambiente de dev
        @$conexao = pg_connect("host=$servidor port=$porta dbname=$bancoDeDados user=$usuario password=$senha' options='--client_encoding=ISO88591'");

      if (!$conexao) {
        throw new Exception("Erro ao realizar a conexão com o banco de dados");
      }
    } catch (Exception $ex) {
      echo $ex->getMessage();
      exit;
    }

    return $conexao;
  }
}
?>
