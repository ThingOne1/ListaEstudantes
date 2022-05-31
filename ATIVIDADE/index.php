<?php include('vendor/autoload.php');  ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="utf-8">
  <!-- JS -->
  <script type="text/javascript" src="index.js"></script>
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
  <!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script> -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
  <!-- CSS only -->
  <link rel="stylesheet" href="css\stylecss.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <!-- Title -->
  <title>Atividade Ricardo</title>
</head>

<!-- Image and title -->
<body class="container-flex text-center bg-dark">
  <div class="pt-5">
    <div class=" pt-5">
      <h1 class="text-white pt-4">Lista de Alunos<a class="navbar-brand" href="index.php">
        <img src="img\JCL.png" width="30" height="30" class="position-absolute pl-5" alt="">
      </a></h1>
      <br>
      <br>
    </div>
  </div>
  <!-- fim de Image and title -->
  
  <div class="container-flex">

    <label class="pb-2 text-white " for='nome_escola'> <h5>Nome do curso</h5> </label>

    <br>
    <select class="text-center" style="border-radius: 10px" id="nome_escola" onchange="Calendario(this.value)">

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
    <script type="text/javascript">
      Escolas();
    </script>
    <!-- Lista de alunos -->
      <div id="Alunos"  class="pb-4 container">

      </div>
    <!-- termido de lista de alunos -->

    <!-- lISTA DE UPDADE -->
    <br>
    <div  class="container pb-5 w-25">

      <form id="Update" class="text-center">

      </form>

    </div>
    <!-- termino lISTA DE UPDADE -->
  </body>
</html>
