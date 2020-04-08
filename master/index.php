<?php
 session_start();
 include("./utils/conexion.php");
 if(isset($_POST["login"])):
  if(empty($_POST["usuario"]) || empty($_POST["password"])):
   $message = '<label>Todos los campos son requeridos</label>';
 else:
   $query = "SELECT * FROM usuarios WHERE usuario = :usuario AND password = :password";
   $statement = $connect->prepare($query);
   $statement->execute(array( 'usuario'  => $_POST["usuario"], 'password' => $_POST["password"]));
   $count = $statement->rowCount();
   if($count > 0):
     $_SESSION["usuario"] = $_POST["usuario"];
     header("location:./licencias/panel.php");
   else:
     $message = '<label>Datos incorrectos</label>';
   endif;
  endif;
 endif;
 ?>

 <!doctype html>
 <html lang="es">
   <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <link rel="icon" href="favicon.ico">
     <link href="./assets/bootstrap.css" rel="stylesheet">
   </head>
   <body >
   <?php if(!isset($_SESSION["usuario"])): ?>
   <div class="container" >
     <div class="row">
       <div id="layer"class="col-12 col-md-8">
         <br/>
         <div class="card mb-3 bg-light  border-danger" style="padding-right: 12em;">
         <div class="card" style="width: 8em;">
           <img class="card-img-top" src="images/icon.png">
         </div>
           <div class="card-body">
         <?php if(isset($message)):
           echo '<label id="layer" class="text-danger">'.$message.'</label>';
         endif;?>
         <form method="post">
           <div id="layer" class="form-group text-white">
            <label for="Usuario">Usuario</label>
            <input type="text" name="usuario" class="form-control" placeholder="Ingrese usuario" />
   			  </div>
           <div id="layer" class="form-group text-white">
             <label for="Contraseña">Contraseña</label>
             <input type="password" name="password" class="form-control" placeholder="Ingrese Contraseña" />
   				</div>
           <br />
           <input id="layout"type="submit" name="login" class="btn btn-info btn-lg btn-block" value="Iniciar Sesion" />
         </form>
         </div>
        </div>
       </div>
     </div>
   </div>
 <?php else:
     header("location:./licencias/panel.php");
   endif; ?>

<style>
  #layer{
    margin-left:10em;
    padding-top: 1em;
  }
  #layout{
    margin-left:6em;
    width: 90%;
    }

      body{
      background: transparent url("images/iglesia.jpg");
      background-size: cover;
      -moz-background-size: cover;
      -webkit-background-size: cover;
      -o-background-size: cover;
    }
    .card-img-top{
    image-size:2px;

    }
</style>

<!--<script>
var myIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1}
  x[myIndex-1].style.display = "block";
  setTimeout(carousel, 2500); // Change image every 2 seconds
}
</script>-->

   </body>
 </html>
