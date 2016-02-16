<?php
$action = (!empty($_POST['btn_submit']) && ($_POST['btn_submit'] === 'Guardar')) ? 'save_article' : 'show_form';
switch ($action) {
    case 'save_article':
        try {
            $connection = new Mongo();
            $database = $connection->selectDB('supermercado');
            $collection = $database->selectCollection('aseo');
             /* método alternativo de selección base datos colección:
             * $connection = new Mongo();
             * $collection = $connection->miblog->articles;
             */
            $article = array();
            $article['codigo'] = $_POST['codigo'];
            $article['producto'] = $_POST['producto'];
            //$article['saved_at'] = new MongoDate();
            $collection->insert($article);
        } catch (MongoConnectionException $e) {
            die("No se ha podido conectar a la base de datos " . $e->getMessage());
        } catch (MongoException $e) {
            die('No se han podido insertar los datos ' . $e->getMessage());
        }
        /*código alternativo si queremos que el método insert espere resputesta de MongoDB:
         * try {
         * $status = $connection->insert(array('title' => 'Titulo Blog', 'content' => 'Contenido Blog'), array('safe' => True));
         * echo "Operación de inserción completada";
         * } catch (MongoCursorException $e) {
         * die("Insert ha fallado ".$e->getMessage());
         * }
         */
        
         /* Cuando hacemos un insert 'safe' podemos utilizar un parámetro timeout opcional:
         * try {
         * $collection->insert($document, array('safe' => True, 'timeout' => True));
         * } catch (MongoCursorTimeoutException $e) {
         * die('El tiempo de espera para Insert ha finalizado '.$e->getMessage());
         */
        
         /* Podemos añadir un _id personalizado con un insert:
          * $username = 'Juan';
          * try{
          * $document = array('_id' => hash('sha1', $username.time()),
          * 'user' => $username, 'visited' => 'homepage.php');
          * $collection->insert($document, array('safe' => True));
          * } catch(MongoCursorException $e) {
          * die('Failed to insert '.$e->getMessage());
          * }
          */
        break;
    case 'show_form':
    default:
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <link rel="stylesheet" href="style.css"/>
        <title>Creador de Productos</title>
    </head>
    <body>
        <div id="contentarea">
            <a href="lista_aseo.php">Volver</a>
            <div id="innercontentarea">
                <h1>Creador de Productos</h1>
                <?php if ($action === 'show_form'): ?>
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                        <h3>Codigo</h3>
                        <p>
                            <input type="text" name="codigo" id="codigo">
                        </p>
                        <h3>Producto</h3>
                            <input type="text" name="producto" id="producto" placeholder="Nombre Producto">
                        <!-- <textarea name="content" rows="20"></textarea> -->
                        <p>
                            <input type="submit" name="btn_submit" value="Guardar"/>
                        </p>
                    </form>
                <?php else: ?>
                    <p>
                        Art&iacute;culo Guardado. _id:<?php echo $article['_id']; ?>.
                        <a href="insert_aseo.php"> &iquest;Escribir otro?</a>
                    </p>
                <?php endif; ?>
            </div>
        </div>
    </body>
</html>