<?php
namespace App\model;
use FFI\Exception;

class connection
{

  protected $conexao='';
  // Classe que inicia a conexao com a database
  //__construct ->> Start automatico da funcao assim que chamar a Classe.
  //__destruct ->> Start automatico de uma funcao, sua funcao e de limpar todas as atividades ex:fechar Database Connection ou salvar um arquivo e limpar atividades.
  function __construct()
  {
    $servidor = "192.168.150.240";
    $bancoDeDados = "sge2020";
    $porta = 5432;
    $usuario = "ecidade";
    $senha = "3c1d@d3@2020$09"; 
    try {

        //Ambiente de dev
        //$this-> keyword allow us to access properties and methods of the same class that this is in.
        //$this indicates instance of this class
        $this->conexao = @$conexao = pg_connect("host=$servidor port=$porta dbname=$bancoDeDados user=$usuario password=$senha' options='--client_encoding=ISO88591'");

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
