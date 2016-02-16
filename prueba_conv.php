<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">  
<html xmlns="http://www.w3.org/1999/xhtml">  
<head>  
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  
<title>Convertidor de Bases</title>  
<mce:style type="text/css"><!--  
.Estilo7 {font-family: Georgia, "Times New Roman", Times, serif; font-size: 12px; font-weight: bold; color: #330099; }  
.Estilo8 {  
    font-family: Geneva, Arial, Helvetica, sans-serif;  
    font-weight: bold;  
    color: #CCCCCC;  
}  
.Estilo9 {  
    font-family: Arial, Helvetica, sans-serif;  
    font-size: 14px;  
}  
.Estilo11 {  
    font-family: Geneva, Arial, Helvetica, sans-serif;  
    font-size: 12px;  
}  
--></mce:style><style type="text/css" mce_bogus="1">.Estilo7 {font-family: Georgia, "Times New Roman", Times, serif; font-size: 12px; font-weight: bold; color: #330099; }  
.Estilo8 {  
    font-family: Geneva, Arial, Helvetica, sans-serif;  
    font-weight: bold;  
    color: #CCCCCC;  
}  
.Estilo9 {  
    font-family: Arial, Helvetica, sans-serif;  
    font-size: 14px;  
}  
.Estilo11 {  
    font-family: Geneva, Arial, Helvetica, sans-serif;  
    font-size: 12px;  
}</style>  
</head>  
<body>  
<form name="convertitForm" method="post" action="?cnvtr=1">  
<table width="400" border="0" align="center" cellspacing="2">  
  <tr bgcolor="#000000">  
    <td colspan="5"><div align="center" class="Estilo8">Convertidor de Bases numericas</div></td>  
  </tr>  
  <tr>  
    <td width="25"> </td>  
    <td colspan="3" rowspan="3">  
    <!-- INICIO CODIGO PHP -->  
    <span class="Estilo9">  
    <?php  
    if($_REQUEST['cnvtr'])  
    {   include_once("funciones.php");  
        $numero         = $_REQUEST["numero"];  
        $baseOrigen     = $_REQUEST["baseOrigen"];  
        $baseDestino    = $_REQUEST["baseDestino"];  
          
        $objConvertir   = new ConvertidorBasesNumericas("$numero","$baseOrigen","$baseDestino");  
        echo "El numero: ".$objConvertir->getNumero()."<span class='Estilo10'> (base ".$objConvertir->getbaseOrigen().")</span><br />";  
        $num    = $objConvertir->convertir();  
        echo "Equivale a: ".$num."<span class='Estilo10'> (base ".$objConvertir->getbaseDestino().")</span><br /><br />";  
    }  
    ?>  
        </span>  
        <!-- FIN CODIGO PHP --></td>  
    <td width="23"> </td>  
  </tr>  
  <tr>  
    <td> </td>  
    <td> </td>  
  </tr>  
  <tr>  
    <td> </td>  
    <td> </td>  
  </tr>  
  <tr>  
    <td> </td>  
    <td><span class="Estilo7">Base Origen :</span></td>  
    <td> </td>  
    <td><label>  
      <input name="baseOrigen" type="text" id="baseOrigen" value="<?php echo $_REQUEST["baseOrigen"]; ?>" />  
    </label></td>  
    <td> </td>  
  </tr>  
  <tr>  
    <td> </td>  
    <td><span class="Estilo7">Base Destino :</span></td>  
    <td> </td>  
    <td><label>  
      <input name="baseDestino" type="text" id="baseDestino" value="<?php echo $_REQUEST["baseDestino"]; ?>" />  
    </label></td>  
    <td> </td>  
  </tr>  
  <tr>  
    <td> </td>  
    <td><span class="Estilo7">Numero a Convertir :</span></td>  
    <td> </td>  
    <td><input name="numero" type="text" id="numero" value="<?php echo $_REQUEST["numero"]; ?>" /></td>  
    <td> </td>  
  </tr>  
  <tr>  
    <td> </td>  
    <td> </td>  
    <td> </td>  
    <td> </td>  
    <td> </td>  
  </tr>  
  <tr>  
    <td> </td>  
    <td> </td>  
    <td> </td>  
    <td><div align="right">  
      <input type="submit" name="enviar" id="enviar" value="Convertir" />  
    </div></td>  
    <td> </td>  
  </tr>  
  <tr>  
    <td colspan="5" bgcolor="#000000"> </td>  
    </tr>  
</table>  
</form>  
<div align="justify"><span class="Estilo11">Debe digitar en Base Origen Y en Base Destino el numero equibalente 
  a la base a la que hace referencia, por ejemplo 16= Hexadecimal.</span>  
</div>  
<h3>Presentado por: Javier Macana y Nicolas Garcia.</h3>  
</body>  
</html>  