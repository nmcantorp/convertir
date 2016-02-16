
		?>
<!-- 		<table>
			<caption>Cabeceras IPv4</caption>
			<tbody>
				<tr>
					<td>Version: <?php echo getprotobyname('tcp') ?></td>
					<td>ILH: <?php echo $_SERVER['CONTENT_LENGTH'] ?> </td>
					<td>Tipo de Servicio: <?php  echo $_SERVER['CONTENT_LENGTH'] ?></td>
					<td></td>
				</tr>
				<tr></tr>
				<tr></tr>
				<tr></tr>
				<tr></tr>
				<tr>
					<td>data</td>
				</tr>
			</tbody>
		</table> -->
<?php
/*		print_r($_SERVER)."<br><br>";die();
		echo "Tu direccion IP es: {$_SERVER['REMOTE_ADDR']}<br><br>";
		echo "El servidor es: {$_SERVER['SERVER_NAME']}<br><br>"; 
		echo "Vienes de la pagina: {$_SERVER['HTTP_REFERER']}<br><br>"; 
		echo "Te has conectado usando el puerto: {$_SERVER['REMOTE_PORT']}<br><br>"; 
		echo "El agente de usuario de tu navegador es: {$_SERVER['HTTP_USER_AGENT']}<br><br>";
		echo "Direccion IP asignada al usuario que carga la pagina en su navegador: {$_SERVER['REMOTE_ADDR']}<br><br>";
		echo "El nombre del host del usuario: {$_SERVER['REMOTE_HOST']}<br><br>";
		echo "El puerto empleado por el equipo del usuario: {$_SERVER['REMOTE_PORT']}<br><br>";
		echo "Direccion de la pagina anterior que dirige a la pagina actual: {$_SERVER['HTTP_REFERER']}<br><br>";
		echo "La URL que se empleo para acceder a la pagina: {$_SERVER['REQUEST_URI']}<br><br>";
		echo "Ofrece un valor no vacío si el script es pedido mediante el protocolo HTTPS: {$_SERVER['HTTPS']}<br><br>";
		echo "La direccion IP del servidor donde se esta ejecutando actualmente el script: {$_SERVER['SERVER_ADDR']}<br><br>";
		echo "El nombre del host del servidor donde se esta ejecutando actualmente el script: {$_SERVER['SERVER_NAME']}<br><br>";
		echo "El directorio raíz de documentos del servidor en el cual se esta ejecutando el script actual: {$_SERVER['DOCUMENT_ROOT']}<br><br>";
		echo "Cadena de identificacion del servidor dada en las cabeceras de respuesta a las peticiones: {$_SERVER['SERVER_SOFTWARE']}<br><br>";
		echo "Nombre y número de revision del protocolo de informacion: {$_SERVER['SERVER_PROTOCOL']}<br><br>";
		echo "El valor de la directiva SERVER_ADMIN (de Apache) en el archivo de configuracion: {$_SERVER['SERVER_ADMIN']}<br><br>";
		echo "Metodo de peticion empleado para acceder a la pagina: {$_SERVER['REQUEST_METHOD']}<br><br>";
		echo "Fecha Unix de inicio de la peticion: {$_SERVER['REQUEST_TIME']}<br><br>";
		echo "La cadena de la consulta de la peticion de la pagina: {$_SERVER['QUERY_STRING']}<br><br>";
		echo "Contenido de la cabecera Accept de la peticion actual: {$_SERVER['HTTP_ACCEPT']}<br><br>";
		echo "Contenido de la cabecera Accept-Charset: de la peticion actual: {$_SERVER['HTTP_ACCEPT_CHARSET']}<br><br>";
		echo "Contenido de la cabecera Accept-Encoding de la peticion actual: {$_SERVER['HTTP_ACCEPT_ENCODING']}<br><br>";
		echo "Contenido de la cabecera Accept-Language de la peticion actual: {$_SERVER['HTTP_ACCEPT_LANGUAGE']}<br><br>";
		echo "Contenido de la cabecera Connection de la peticion actual: {$_SERVER['HTTP_CONNECTION']}<br><br>";
		echo "Contenido de la cabecera Host de la peticion actual: {$_SERVER['HTTP_HOST']}<br><br>";
		echo "La ruta del script ejecutandose actualmente en forma absoluta: {$_SERVER['SCRIPT_FILENAME']}<br><br>";
		echo "El puerto de la maquina del servidor usado por el servidor web para la comunicacion: {$_SERVER['SERVER_PORT']}<br><br>";
		echo "Cadena que contiene la version del servidor y el nombre del host virtual: {$_SERVER['SERVER_SIGNATURE']}<br><br>";
		echo "Contiene la ruta del script actual: {$_SERVER['SCRIPT_NAME']}<br><br>";
		echo "Esta variable tiene el valor de la cabecera 'Authorization' enviada por el cliente: {$_SERVER['PHP_AUTH_DIGEST']}<br><br>";
		echo "Esta variable tiene el valor del nombre del usuario: {$_SERVER['PHP_AUTH_USER']}<br><br>";
		echo "Esta variable tiene el valor de la contraseña proporcionada por el usuario: {$_SERVER['PHP_AUTH_PW']}<br><br>";
		echo "Esta variable tiene el valor del tipo de autentificacion empleada: {$_SERVER['AUTH_TYPE']}<br><br>";
		echo "Contiene cualquier informacion sobre la ruta proporcionada por el cliente: {$_SERVER['PATH_INFO']}<br><br>";
		echo "Version original de 'PATH_INFO' antes de ser procesado por PHP: {$_SERVER['ORIG_PATH_INFO']}<br><br>";

		echo ip2long($_SERVER['REMOTE_ADDR']);
		echo headers_sent();
		print_r(headers_list());*/