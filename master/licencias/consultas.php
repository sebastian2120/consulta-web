<?php session_start(); ?>
<!DOCTYPE HTML>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../assets/bootstrap.css">
    <link rel="icon" type="image/png"href="../images/icon.png">
    <style media="screen">
    *{
      margin: 0;
      border: 0;
    }
    body {
            background: url("../images/palacioBG.jpg") no-repeat center center fixed;
            background-size: cover;
            -moz-background-size: cover;
            -webkit-background-size: cover;
            -o-background-size: cover;
    }
    </style>
  </head>
  <body>
  <?php
  if(isset($_SESSION["usuario"])){
    $servername = "localhost";
    $username = "root";
    $password = "12345678";
    $dbname = "consultas";
    $conn = new mysqli($servername, $username, $password, $dbname) or die("Sin conexion");
  ?>
    <nav class="navbar navbar-expand-lg navbar-light" style="">
      <a class="navbar-brand" href=""><img src="../images/icon.png" width="80px"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto"></ul>
      </div>
    </nav><br>
  <?php
    $folio = htmlspecialchars($_GET["clave"]);
    $sql = "SELECT * FROM datos WHERE Folio = $folio";
    $result = $conn->query($sql);
    if ($result->num_rows > 0):
      while($row = $result->fetch_assoc()):
  ?>
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12">
        <table class="table table-striped table-dark" style="opacity:0.9;">
          <tr>
            <th style="text-align:center;">A Favor: <?php echo $row["A_favor"]; ?></th>
          </tr>
        </table>
      </div>
      <div class="col-md-4">
        <table class="table table-hover table-striped table-dark" style="opacity:0.9;">
          <tr>
            <th>Folio</th>
            <td><?php echo $row["Folio"]; ?></td>
          </tr>
          <tr>
            <th>Autorizacion</th>
            <td><?php echo $row["Autorizacion"]; ?></td>
          </tr>
          <tr>
            <th>Horario</th>
            <td><?php echo $row["Horario_De_Funcionamiento"]; ?></td>
          </tr>
          <tr>
            <th>Horario</th>
            <td><?php echo $row["Horario_De_Funcionamiento"]; ?></td>
          </tr>
          <tr>
            <th>Clave Catastral</th>
            <td><?php echo $row["Clave_Catastral"]; ?></td>
          </tr>
          <tr>
            <th>RFC</th>
            <td><?php echo $row["RFC"]; ?></td>
          </tr>
          <tr>
            <th>Giro</th>
            <td><?php echo $row["Tipo_De_Giro"]; ?></td>
          </tr>
          <tr>
            <th>Licencia</th>
            <td><?php echo $row["Licencia"]; ?></td>
          </tr>
        </table>
      </div>
      <div class="col-md-4">
        <table class="table table-hover table-striped table-dark" style="opacity:0.9;">
          <tr>
            <th>Calle</th>
            <td><?php echo $row["Calle"]; ?></td>
          </tr>
          <tr>
            <th>Nª Exterior</th>
            <td><?php echo $row["Numero_Exterior"]; ?></td>
          </tr>
          <tr>
            <th>Local Despacho</th>
            <td><?php echo $row["Local_Despacho"]; ?></td>
          </tr>
          <tr>
            <th>Colonia</th>
            <td><?php echo $row["Colonia"]; ?></td>
          </tr>
          <tr>
            <th>CP</th>
            <td><?php echo $row["C_P"]; ?></td>
          </tr>
          <tr>
            <th>Zona</th>
            <td><?php echo $row["Zona"]; ?></td>
          </tr>
          <tr>
            <th>Registro Municipal</th>
            <td><?php echo $row["Registro_Municipal"]; ?></td>
          </tr>
          <tr>
            <th>Aforo</th>
            <td><?php echo $row["Aforo"]; ?></td>
          </tr>
          <tr>
            <th>Superficie Construida</th>
            <td><?php echo $row["Superficie_Construida"]; ?></td>
          </tr>
          <tr>
            <th>Superficie sin Construir</th>
            <td><?php echo $row["Superficie_Sin_Construir"]; ?></td>
          </tr>
          <tr>
            <th>Cajones Incluidos</th>
            <td><?php echo $row["Cajones_Incluidos"]; ?></td>
          </tr>
          <tr>
            <th>Cajones_Anexos</th>
            <td><?php echo $row["Cajones_Anexos"]; ?></td>
          </tr>
          <tr>
            <th>Superficie_Total</th>
            <td><?php echo $row["Superficie_Total"]; ?></td>
          </tr>
        </table>
      </div>
      <div class="col-md-4">
        <table class="table table-hover table-striped table-dark" style="opacity:0.9;">
          <tr>
            <th>D. Solicitado</th>
            <td><?php echo $row["D_Solicitado"]; ?></td>
          </tr>
          <tr>
            <th>M. Solicitado</th>
            <td><?php echo $row["M_Solicitado"]; ?></td>
          </tr>
          <tr>
            <th>A. Solicitado</th>
            <td><?php echo $row["A_Solicitado"]; ?></td>
          </tr>
          <tr>
            <th>D. Expedido</th>
            <td><?php echo $row["D_Expedido"]; ?></td>
          </tr>
          <tr>
            <th>M. Expedido</th>
            <td><?php echo $row["M_Expedido"]; ?></td>
          </tr>
          <tr>
            <th>A. Expedido</th>
            <td><?php echo $row["A_Expedido"]; ?></td>
          </tr>
        </table>
      </div>
    </div>
  </div><br><br>
  <?php
  		endwhile;
  	else:
  		echo "<div class='bg-light' style='opacity:0.8'><h2 align='center'> Sin Resultados. <br> El Registro no se a podido localizar.</h2></div>";
  	endif;
  }else{
       header("location:../");
  }
  $conn->close(); ?>

  <script src="../assets/jquery.js" charset="utf-8"></script>
  <script src="../assets/boot.js" charset="utf-8"></script>
</body>
</html>
