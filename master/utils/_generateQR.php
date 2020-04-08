<?php

	require '../phpqrcode/qrlib.php';

	$dir = '../codes/';

  $claveCatastral = $_POST['claveCatastral'];
  echo $claveCatastral;

	$filename = $dir . $claveCatastral . '.png';

	$tamanio = 15;
	$level = 'H';
	$frameSize = 1;
	$contenido = 'https://licencias.coacalco.gob.mx/consultas?clave=' . $claveCatastral;

	QRcode::png($contenido, $filename, $level, $tamanio, $frameSize);

  header("location:../codes/$claveCatastral.png")

?>
