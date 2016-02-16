<?php  
/** 
 * Convierte un numero expresado en base n a otra base. 
 * Utiliza los digitos 0-9 , A-Z, a-z 
 * Osea podemos convertir de Base 2 a 62.- 
 * @author      Marcelo Castro 
 * @link        w.marcelo.castro@gmail.com 
 * @license     Publica....  
 * @version     0.1 (09/08/2008) No funciona con numeros Grandes hasta base 36. 
 * @version     0.2 (10/08/2008) hasta Base 62 y soporte para numeros grandes. 
 * @version     0.3 (20/08/2008) Correccion error cuando el ultimo numeo es cero. 
 * @since       Si le haces alguna mejora agradeceria me enviaras una copia de la misma 
 *              Gracias 
 */  
final class ConvertidorBasesNumericas  
{   /** 
    * CARACTERES. 
    * Contiene los caracteres utilizados para las bases. 
    * @access   private 
    * @var      string 
    */  
    const       CARACTERES      = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";  
    /** 
     * Base de Origen. 
     * @access  private 
     * @var     string 
     */  
    private     $baseOrigen     = 10;  
      
    /** 
     * Base de Destino. 
     * @access  private 
     * @var     String 
     */  
    private     $baseDestino    = 10;  
      
    /** 
     * Almacena el ultimo mensaje de error. 
     * @access  private 
     * @var     string 
     */  
    private     $msjError       = "";  
      
    /** 
     * Contiene el numero a convertir a la base destino. 
     * @access  private 
     * @var     string 
     */  
    private     $numero;  
      
    /** 
     * Variable intermedia que contiene el numero a convertir en base 10. 
     * @access  private 
     * @var     string 
     */  
    private     $numeroBase10;  
      
    /** 
     * Metodo Constructor. 
     * Inicializa las variables y hace verificaciones para las bases. 
     * @access  public 
     * @param   string  $numero     Numero a convertir en base destino.  
     * @param   string  $baseOrigen base en el cual esta el numero a convertir. 
     * @param   string  $baseDestinoBase a la cual se desea convertir el numero. 
     */  
    function __construct($numero="0",$baseOrigen="10",$baseDestino="10")  
    {   $this->setbaseOrigen($baseOrigen);  
        $this->setbaseDestino($baseDestino);  
        $this->setNumero($numero);  
        $this->verificarNumero($this->numero,$this->baseOrigen);  
    }  
    #########################################################################  
    # METODOS PUBLICOS BASE                                                 #   
    #########################################################################     
      
    /** 
     * Metodo convertir. 
     * Convierte el numero desde la base origen a la destino. 
     * @access  public 
     * @return  string      Con el numero ya convertido a base destino. 
     */  
    public function convertir()  
    {   $this->convertirA10($this->numero);  
        $conversion = $this->convertirAn($this->numeroBase10);  
        return $conversion;  
    }  
    /** 
     * Metodo convertir a base 10. 
     * Convierte el numero ingresado a base 10. Si bien es interna se dejo como  
     * publica para una conversion rapida a base 10. 
     * @access  public 
     * @param   string      $numero     numero a conbertir. 
     * @return  string      El numero convertido a base 10. 
     */  
    public function convertirA10($numero)  
    {   $this->setNumero($numero);  
        //echo $this->numero;  
        $cadenaInversa  = strrev($this->numero);  
        $matriz         = str_split($cadenaInversa, 1);  
        $cantNumeros    = count($matriz);  
        $numeroBase10   = "";  
        for($f=0;$f<$cantNumeros;$f++)  
        {   $numeroBaseOrigen   = strpos(self::CARACTERES,$matriz[$f]);  
            $potencia           = bcpow($this->baseOrigen,strval($f));  
            $sumando            = bcmul($numeroBaseOrigen,$potencia);  
            $numeroBase10       = bcadd($numeroBase10,$sumando);  
        }  
      
        $this->numeroBase10  = $numeroBase10;  
        return $this->numeroBase10;  
    }  
      
    /** 
     * Convertir a base n. 
     * @access  public 
     * @param   string  $numero     un numero expresado en base 10. 
     * @return  string  El numero convertido a la base destino. 
     */  
    public function convertirAn($numero)  
    {   $bucle  = bcdiv(strval(log10($numero)),strval(log10($this->baseDestino)));  
        $bucle  = intval($bucle);  
        $resto  = $this->numeroBase10;  
        $salida = "";  
        for($f=$bucle;$f>-1;$f--)  
        {   $divisor    = bcpow($this->baseDestino,strval($f));  
            $entero     = bcdiv($resto ,$divisor,0);  
            if($entero!="0")  
            {   //$salida       = $salida.substr(self::CARACTERES,$entero,1);  
            }  
            $salida     = $salida.substr(self::CARACTERES,$entero,1);  
            $resto      = bcmod($resto,$divisor);  
        }  
        return $salida;  
    }  
      
      
    #########################################################################  
    # METODOS PRIVADOS BASE                                                 #   
    #########################################################################     
      
    /** 
     * Examina si un numero esta correctamente escrito en una base o no. 
     * @method  chequearNumero 
     * @access  private 
     * @param   integer     $numero     numero a examinar escrito en base desde. 
     * @param   integer     $baseOrigen base destino numero entre 2 y 36.- 
     * @return  boolean     true por correcto, false por incorrecto. 
     */  
    private function verificarNumero($numero,$baseOrigen)  
    {   $baseCaracteres     = substr(self::CARACTERES,0,$baseOrigen);  
        $expresionRegular   = "/^[".$baseCaracteres."]+$/";  
          
        if(preg_match($expresionRegular,$numero))  
        {   }  
        else  
        {   $this->msjError  = "El numero no pertenece a la base elegida.";  
            $this->__destruct();  
            exit;  
        }  
        return true;  
    }  
      
    #########################################################################  
    # GET Y SET                                                             #   
    #########################################################################  
      
    public function getbaseOrigen()  
    {   return $this->baseOrigen;    }   
      
    public function getbaseDestino()  
    {   return $this->baseDestino;   }  
      
    public function setbaseOrigen($baseOrigen=10)  
    {   if($baseOrigen>strlen(self::CARACTERES) || $baseOrigen<2)  
        {   $this->msjError  = "Base Desde: Fuera del rango Permitido [2-".strlen(self::CARACTERES)."].";  
            return false;  
        }  
      
        $this->baseOrigen    =   $baseOrigen;  
        return true;  
    }  
      
    public function setbaseDestino($baseDestino=10)  
    {   if($baseDestino>strlen(self::CARACTERES) || $baseDestino<2)  
        {   $this->msjError  = "Base Hacia: Fuera del rango Permitido [2-".strlen(self::CARACTERES)."].";  
            return false;  
        }  
              
        $this->baseDestino   = $baseDestino;  
        return false;  
    }  
      
    public function getNumero()  
    {   return $this->numero;    }  
      
    public function setNumero($numero)  
    {   $numero         = strval($numero);  
        $this->verificarNumero($numero,$this->baseOrigen);  
        $this->numero    = $numero;  
    }  
      
    #########################################################################  
    # FUNCIONES FINALES                                                     #   
    #########################################################################     
      
      
    /** 
     *  
     */  
    function __destruct()  
    {   echo $this->msjError;    }  
}  
?>