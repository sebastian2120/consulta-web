<?php
 $hostBD = "localhost";
 $userBD = "root";
 $passBD = "12345678";
 $dataBD = "consultas";
 $message = "";

 try{
   $connect = new PDO("mysql:host=$hostBD; dbname=$dataBD", $userBD, $passBD);
   $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }
 catch(PDOException $error){
   $message = $error->getMessage();
 }

 ?>
