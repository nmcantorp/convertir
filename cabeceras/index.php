<?php 

	require_once('class/crc.php');

	
/*	echo '<table border="1">';
    foreach($_SERVER as $k => $v) {
        echo '<tr><td>'.$k.'</td><td>'.$v.'</td></tr>';
    }
    echo '</table>';*/

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="version" content="ipv4">
	<title>Bit de Paridad</title>
	<link rel="stylesheet" href="">
	<script src="../js/jquery-1.8.0.min.js" type="text/javascript" ></script>

	<link rel="stylesheet" type="text/css" media="screen" href="../css/normalize.css">

	        <!-- Bootstrap -->
    <link rel="stylesheet" href="../css/bootstrap-3.3.4/css/bootstrap.css" type="text/css" >
    <link href="../css/bootstrap-3.3.4/js/bootstrap.js" type="text/javascript" >
	<script src="../js/funcion_convertir.js" type="text/javascript"></script>
</head>
<body>
	<style type="text/css" media="screen">
		#contenido{
			margin: 0px 60px;
		}

		#g_resultado{
			padding: 0px 0px 0px 30px;
		}

		#submit{
		  	margin-left: 5%;
		}
		form{
			margin: 70px 30%;
		}


		table{
			font-size: 1.5em;
		}

	</style>
	<div id="contenido">
		<div class="jumbotron">
			  <h1>Bit de Paridad</h1>
	<form action="?prueba=1" method="post" accept-charset="utf-8">
		<input type="text" name="mensaje" value="" placeholder="">
				
		<input type="submit" name="" value="enviar">
	</form>

	<?php 

	if ($_REQUEST['prueba']) {
	$mensaje = $_REQUEST['mensaje'];

	$objParidad = new Paridad;
	$mensaje_bin = 0;
	$result = $objParidad->getParidad($mensaje);
	$mensaje_bin .= $result['mensaje_bin'];
	$conteo_hor = $result['conteo_hor'];
	$suma_bin = $result['suma_bin'];

	$inversa = $objParidad->getInverse($suma_bin);


	$suma_final = decbin(bindec($mensaje_bin)+bindec($inversa));

	$suma_validacion =  decbin(bindec($suma_bin) + bindec($inversa));

	//echo $suma_validacion;

	unset($result['conteo_hor']);
	unset($result['mensaje_bin']);
	unset($result['suma_bin']);

	echo '<table border="0" class="table table-striped table-bordered">';

	for ($i=0; $i < count($result); $i++) { 
		echo '<tr><td style="text-align:center;">'.$mensaje[$i].'</td>';
		echo '<td>'.$result[$i][0].'</td>';
		echo '<td>'.$result[$i][1].'</td>';
		echo '<td>'.$result[$i][2].'</td>';
		echo '<td>'.$result[$i][3].'</td>';
		echo '<td>'.$result[$i][4].'</td>';
		echo '<td>'.$result[$i][5].'</td>';
		echo '<td>'.$result[$i][6].'</td>';
		echo '<td style="color:red;">'.$result[$i]['paridad'].'</td>';
		echo '</tr>';	
	}

	echo '<tr>';
	echo '<td></td>';
	for ($i=0; $i <= 6; $i++) { 
		$valor_par=0;
		for ($j=0; $j < count($result); $j++) { 
			$valor_par = ($result[$j][$i]==1)?$valor_par+1:$valor_par+0;
		}

		$paridad_ver = $objParidad->validaParidad($valor_par, $mensaje);
		$conteo_ver = ($paridad_ver==1)? $conteo_ver+1:$conteo_ver+0;
		echo '<td style="color:Blue;">';
		echo $paridad_ver;
		echo '</td>';
	}
	$conteo_total = $conteo_hor + $conteo_ver;
	echo '<td style="color:green;">';
	echo $objParidad->validaParidad($conteo_total, $mensaje);
	echo '</td>';
	echo '</tr>';
	echo "<tr><td colspan='9' style='text-align:left'><h3>Suma:</h3> <strong style='color:red;'>$suma_bin</strong></td></tr>";
	echo "<tr><td colspan='9' style='text-align:left'><h3>Complemento a 1: </h3><strong style='color:red;'>$inversa</strong></td></tr>";
	echo "<tr><td colspan='9' style='text-align:left'><h3>Mensaje a Enviar: </h3>$mensaje_bin + <strong style='color:red;'>$inversa</strong></td></tr>";
	echo "<tr><td colspan='9' style='text-align:left'><h3>Validacion: </h3>$suma_bin + $inversa = $suma_validacion</strong></td></tr>";
	echo '</table>';

	}

	?>
</div>
</div>
</body>
</html>