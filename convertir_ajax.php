<?php 
header("Content-Type:application/json");
header("'Access-Control-Allow-Methods:GET, POST, PUT, DELETE");
header("Access-Control-Max-Age:3628800");
header("Access-Control-Allow-Origin:*");
header("Content-Type:text/javascript; charset=utf8");

if ($_POST['base']==2) {
	$numero ='';
	$numero = $_POST['num']; 
	$res_dec = bindec((string)$numero);
	$res_oct = decoct($res_dec);
	$res_hex = dechex($res_dec);
	$resultado['dec'] = $res_dec;
	$resultado['oct'] = $res_oct;
	$resultado['hex'] = strtolower($res_hex);
	$result = json_encode($resultado);
	echo $result;
	return $result;
}elseif ($_POST['base']==10) {
	$numero ='';
	$numero = $_POST['num']; 
	$res_bin = decbin((string)$numero);
	$res_oct = decoct($numero);
	$res_hex = dechex($numero);
	$resultado['bin'] = $res_bin;
	$resultado['oct'] = $res_oct;
	$resultado['hex'] = strtolower($res_hex);
	$result = json_encode($resultado);
	echo $result;
	return $result;
}elseif ($_POST['base']==8) {
	$numero ='';
	$numero = $_POST['num']; 
	$res_dec = octdec((string)$numero);
	$res_bin = decbin($res_dec);
	$res_hex = dechex($res_dec);
	$resultado['dec'] = $res_dec;
	$resultado['bin'] = $res_bin;
	$resultado['hex'] = strtolower($res_hex);
	$result = json_encode($resultado);
	echo $result;
	return $result;
}elseif ($_POST['base']==16) {
	$numero ='';
	$numero = $_POST['num']; 
	$res_dec = hexdec((string)$numero);
	$res_oct = decoct($res_dec);
	$res_bin = decbin($res_dec);
	$resultado['dec'] = $res_dec;
	$resultado['oct'] = $res_oct;
	$resultado['bin'] = $res_bin;
	$result = json_encode($resultado);
	echo $result;
	return $result;
}

 ?>