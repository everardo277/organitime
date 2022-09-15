<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content=" Everardo Contreras">
    <link rel="shortcut icon" href="./img/telefono-inteligente.png" type="image/x-icon">
    <link rel="icon" href="../../../../favicon.ico">

    <title>llamadas Telefónicas</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap/css/custom.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
<!--
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
-->
    <link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/>


    <!-- Custom styles for this template -->

  </head>

  <body>

    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
      <a class="navbar-brand" href="../index.php">Organitime</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
         <!--    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a> -->
          </li>
         
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="https://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Opciones</a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
              <a class="dropdown-item" href="../directorio/">Directorio</a>
              <a class="dropdown-item" href="#">Llamadas Telefónicas </a>
              <a class="dropdown-item" href="../reuniones/">Reuniones </a>
              <a class="dropdown-item" href="../actividades/">Actividades pendientes</a>
            </div>
          </li>
        </ul>
<!--
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="text" placeholder="buscar" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
        </form>
    -->    
      </div>
    </nav>

    <div  class="container">
      <h1 class="page-header text-center">Llamadas Telefónicas</h1>
      <center>
      <img src="./img/telefono-inteligente.png" alt="imagen" style="width: 10%;">
      </center>
      <div class="row">
        <div class="col-sm-12">

          <a href="#addNew" class="btn btn-primary" data-toggle="modal" style="margin-bottom: 8px;" ><span class="fa fa-plus"></span> Nuevo</a>
        
           <?php 
              session_start();
              if (isset($_SESSION['message'])) {
                ?>
                <div class="alert alert-dismissible alert-success" style="margin-top: 20px;">
                  <button type="button" class="close" data-dismiss="alert" >
                    &times;
                  </button>
                  <?php echo $_SESSION['message']; ?>
                </div>

                <?php 
                unset( $_SESSION['message']);              
              }
           ?>
        <table class="table table-bordered table-striped"  id="MiAgenda" style="margin-top:20px;" >
            <thead>
              <th>ID</th>
              <th>LlAMAR A </th>
              <th>TELEFONO</th>
              <th>FECHA</th>
              <th>MOTIVO</th>
              <th>ACCIONES</th>
            </thead>
            <tbody>
              <?php 
                include_once('conexion.php');
                $database = new ConectarDB();
                $db = $database->open();
                try {
                  $sql = 'SELECT * FROM llamadas';
                  foreach ($db->query($sql) as $row) {
                  ?>
                  <tr>
                      <td><?php echo $row['idllamadas']; ?></td>
                      <td><?php echo $row['llamar']; ?></td>
                      <td><?php echo $row['telefono']; ?></td>
                      <td><?php echo $row['fecha']; ?></td>
                      <td><?php echo $row['motivo']; ?></td>
                      <td><a href="#edit_<?php echo $row['idllamadas']; ?>" class="btn btn-primary btn-sm" data-toggle="modal"><span class="fa fa-edit"></span></a> 
                      <a href="#delete_<?php echo $row['idllamadas']; ?>" class="btn btn-danger btn-sm" data-toggle="modal"><span class="fa fa-trash"></span></a>  </td>
                      <?php include('EditarEliminarModal.php'); ?>
                  </tr>

                  <?php

                  }
                } catch (PDOException $e) {
                  echo 'Hay probleas con la conexion : '.$e->getmessage();
                }
                $database->close();

             ?>
             
            </tbody>
        </table>
     </div>

      </div>

    </div><!-- /.container -->
    <?php include('addModal.php'); ?>
    
    <!-- Bootstrap core JavaScript
    ================================================== -->

    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../assets/js/vendor/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
<!-- 
    <script src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
-->
    <script type="text/javascript" src="DataTables/datatables.min.js"></script>


    <script>
      
      $(document).ready( function () {
          $('#MiAgenda').DataTable();
      } );

    </script>

    <script>
      var table = $('#MiAgenda').DataTable({
        language:{
          "decimal": "",
          "emptyTable": "No hay información",
          "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
          "infoEmpty": "Mostrando 0 a 0 de 0 Entradas",
          "infoFiltered": "(Filtrado de _MAX_ total entradas)",
          "infoPostFix": "",
          "thousands": ",",
          "lengthMenu": "Mostrar _MENU_ Entradas",
          "loadingRecords": "Cargando...",
          "processing": "Procesando...",
          "search": "Buscar:",
          "zeroRecords": "Sin resultados encontrados",
          "paginate": {
              "first": "Primero",
              "last": "Ultimo",
              "next": "Siguiente",
              "previous": "Anterior"
          }
        },


      });

    </script>
  </body>
</html>
