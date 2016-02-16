<?php 
/**
* 
*/
class Paridad
{
	
	function __construct()
	{
		# code...
	}

	public function getParidad($mensaje)
	{
		
		$numero_max = strlen($g)-1;
		$num=strlen($mensaje);
		$array_mensaje=array();
		for($a=0; $a< $num; $a++){

			$array_mensaje[]= 0 . decbin(ord($mensaje[$a]));
			$mensaje_bin .=  decbin(ord($mensaje[$a]));
			$suma_ascii +=  ord($mensaje[$a]);
			$array_final['suma_bin'] .= 0;
			//echo $mensaje[$a]." - ".decbin(ord($mensaje[$a]))." <br>";
		}
		$suma_bin = decbin($suma_ascii);
		$conteo_hor=0;
		for ($j=0; $j < $num; $j++) { 
			$valor_par=0;
			for ($i=0; $i < 7; $i++) { 
				$array_final[$j][$i] = $array_mensaje[$j][$i];
				$valor_par = ($array_mensaje[$j][$i]==1)?$valor_par+1:$valor_par+0;
			}
				$array_final[$j]['paridad'] = $this->validaParidad($valor_par, $mensaje);
				$conteo_hor += $array_final[$j]['paridad'] ;
		}
		$array_final['conteo_hor'] = $conteo_hor;
		$array_final['mensaje_bin'] = $mensaje_bin;
		$array_final['suma_bin'] .= $suma_bin;

		return $array_final;
	}

	public function validaParidad($value, $mensaje)
	{
		$vocal = array('a','A','e','E','i','I','o','O','u','U');
		if (in_array($mensaje[0],$vocal)) {
			$tipo_paridad = "impar";
		}else{
			$tipo_paridad = "par";			
		}
		switch ($tipo_paridad) {
			case 'impar':
				$valor = $value % 2 ."<br>";
				if ($valor == 1) {
					return 0;
				}else{
					return 1;
				}
				
				break;
			
			case 'par':
				$valor = $value % 2 ."<br>";
				if ($valor == 0) {
					return 0;
				}else{
					return 1;
				}
				break;

			default:
				# code...
				break;
		}
	}

	public function getInverse($suma)
	{
		for ($i=0; $i < strlen($suma); $i++) { 
			if($suma[$i]==1)
			{
				$resultado .= 0;
			}else{
				$resultado .= 1;
			}
		}
		return $resultado;
	}
}


 ?>