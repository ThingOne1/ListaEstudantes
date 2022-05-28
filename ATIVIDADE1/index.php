<?php
require_once('connection.php');
require_once('Nome_Escola.php');
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="utf-8">
  <!-- JS -->
  <script type="text/javascript" src="index.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <!-- CSS only -->
  <link rel="stylesheet" href="css/styles.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <title>Atividade Ricardo</title>
</head>
<!-- Image and text -->

<body class="container-flex text-center bg-dark">
  <div class="pt-5">
    <div class=" center pt-5">
      <h1 class="text-white pt-5">Lista de Alunos<a class="navbar-brand" href="index.php">
        <img src="img\JCL.png" width="30" height="30" class="position-absolute pl-5" alt="">
      </a></h1>
      <br>
      <br>
    </div>
  </div>
  <div class="container-flex">

    <label class="pb-2 text-white " for='nome_escola'> <h5>Nome do curso</h5> </label>

    <br>
    <select class="text-center" style="border-radius: 10px" id="nome_escola" onchange="Calendario(this.value)">
      <option value='selecione'>--Select--</option>
      <?php pegar_nomeescola() ?>
    </select>
    <br>
    <br>

    <label class="pb-2 text-white " for="calendario"><h5>Data do curso</h5></label>

    <br>
    <select class="text-center" style="border-radius: 10px" id="calendario" name="calendario" onchange="Etapas(this.value)">
      <option value="00">---------------</option>
    </select>
    <br>
    <br>

    <label class="pb-2 text-white " for="Etapas"><h5>Etapa do curso</h5></label>

    <br>
    <select  class="text-center" id='Etapas' name="Etapas"  style="border-radius: 10px" onchange=Turmas(this.value)>
      <option value="00">---------------</option>
    </select>
    </select>

    <br>
    <br>

    <label class="pb-2 text-white " for="Turmas"><h5>Turmas do curso</h5></label>

    <br>
    <select  class="text-center" id='Turmas' style="border-radius: 10px" name="Turmas" onchange=Alunos(this.value)>
      <option value="00">---------------</option>
    </select>
    </div>
    <br>
    <br>
    <br>
    <!-- Lista de alunos -->

      <div id="Alunos"  class="pb-5 container">
        
      </div>
    <!-- termido de lista de alunos -->

    <!-- lISTA DE UPDADE -->
    <br>
    <div id="Update" class="container pb-5">

    </div>
    <!-- termino lISTA DE UPDADE -->
  </body>
</html>
