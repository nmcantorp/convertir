$(document).ready(function(){
	$('#submit').click(function(){

		var porNombre=document.getElementsByName("bas_orig");

		for(var i=0;i<porNombre.length;i++)
        {
            if(porNombre[i].checked){
                var seleccionado = true;
            }
        }

        if (!seleccionado) 
    	{
    		alert('No a seleccionado ninguna Base de origen');
    		return false;
    	};

    	if($('#num_orig').val()==null || $('#num_orig').val()==''){
    		alert('Ingrese el valor a Convertir');
    		return false;
    	}

		//alert(porNombre.selected);

	});
});

function convertir() {
	
	var porNombre=document.getElementsByName("bas_orig");
	var num 	= document.getElementById("num_orig");

	for(var i=0;i<porNombre.length;i++)
    {
        if(porNombre[i].checked){
        	var base = porNombre[i].value;
        }
    }
    var parametros = {
                "base" : base,
                "num" : num.value
        };

    $.ajax({
    	url: 'convertir_ajax.php',
    	type: 'POST',
    	dataType: 'json',
    	data: parametros,
    })
    .done(function(data) {

	    switch(base){
	    	case '2':
	    		$('#result_Dec').val(data['dec']);
	    		$('#result_Oct').val(data['oct']);
	    		var hex = data['hex'].toUpperCase();
	    		$('#result_Hex').val(hex);
	    		break;
			case '10':
	    		$('#result_Bin').val(data['bin']);
	    		$('#result_Oct').val(data['oct']);
	    		var hex = data['hex'].toUpperCase();
	    		$('#result_Hex').val(hex);
	    		break;
			case '8':
	    		$('#result_Dec').val(data['dec']);
	    		$('#result_Bin').val(data['bin']);
	    		var hex = data['hex'].toUpperCase();
	    		$('#result_Hex').val(hex);
	    		break;
	    	case '16':
	    		$('#result_Dec').val(data['dec']);
	    		$('#result_Oct').val(data['oct']);
	    		$('#result_Bin').val(data['bin']);
	    		break;
	    	default:
	    		
	    		break;
	    }
   	
    });
    
 	return false;
}

function valida_numero (numero) { 
	  $('#num_orig').val(null);
	  $('#result_Dec').val(null);
	  $('#result_Bin').val(null);
	  $('#result_Oct').val(null);
	  $('#result_Hex').val(null);
	switch(numero.value){
		case '2':
			document.getElementById("result_Dec").disabled=false;
			document.getElementById("result_Bin").disabled=true;
			document.getElementById("result_Oct").disabled=false;
			document.getElementById("result_Hex").disabled=false;
			$('#num_orig').attr('onkeypress', "return permite(event, 'num', 2)");
			break;
		case '10':
			document.getElementById("result_Dec").disabled=true;
			document.getElementById("result_Bin").disabled=false;
			document.getElementById("result_Oct").disabled=false;
			document.getElementById("result_Hex").disabled=false;
			$('#num_orig').attr('onkeypress', "return permite(event, 'num', 10)");
			break;
		case '8':
			document.getElementById("result_Dec").disabled=false;
			document.getElementById("result_Bin").disabled=false;
			document.getElementById("result_Oct").disabled=true;
			document.getElementById("result_Hex").disabled=false;
			$('#num_orig').attr('onkeypress', "return permite(event, 'num', 8)");
			break;
		case '16':
			document.getElementById("result_Dec").disabled=false;
			document.getElementById("result_Bin").disabled=false;
			document.getElementById("result_Oct").disabled=false;
			document.getElementById("result_Hex").disabled=true;
			$('#num_orig').attr('onkeypress', "return permite(event, 'num_car', 16)");
			break;
		default:

			break;		
	}
	document.getElementById("num_orig").disabled=false;
}

function permite(elEvento, permitidos, base) {
  // Variables que definen los caracteres permitidos
  // Valida la Base 

  switch(base){
  	case 2:
	    var numeros = "01";
  		break;
  	case 10:
  		var numeros = "0123456789";
  		break;
  	case 8:
  		var numeros = "01234567";
  		break;
  	case 16:
  		var numeros = "0123456789";
  		var caracteres = "abcdefgABCDEFG";
  		break;
  	default:
  		statements_def
  		break;
  }

  var numeros_caracteres = numeros + caracteres;
  var teclas_especiales = [8, 37, 39, 46];
  // 8 = BackSpace, 46 = Supr, 37 = flecha izquierda, 39 = flecha derecha
 
 
  // Seleccionar los caracteres a partir del parámetro de la función
  switch(permitidos) {
    case 'num':
      permitidos = numeros;
      break;
    case 'car':
      permitidos = caracteres;
      break;
    case 'num_car':
      permitidos = numeros_caracteres;
      break;
  }
 
  // Obtener la tecla pulsada 
  var evento = elEvento || window.event;
  var codigoCaracter = evento.charCode || evento.keyCode;
  var caracter = String.fromCharCode(codigoCaracter);
 
  // Comprobar si la tecla pulsada es alguna de las teclas especiales
  // (teclas de borrado y flechas horizontales)
  var tecla_especial = false;
  for(var i in teclas_especiales) {
    if(codigoCaracter == teclas_especiales[i]) {
      tecla_especial = true;
      break;
    }
  }
 
  // Comprobar si la tecla pulsada se encuentra en los caracteres permitidos
  // o si es una tecla especial
  return permitidos.indexOf(caracter) != -1 || tecla_especial;
}
