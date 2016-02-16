<?php
try {
    $connection = new Mongo();
    $database = $connection->selectDB('supermercado');
    $collection = $database->selectCollection('aseo');
} catch (MongoConnectionException $e) {
    die("Fallo en la conexión a la base de datos " . $e->getMessage());
}
$cursor = $collection->find();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <link rel="stylesheet" href="style.css" />
        <title>Producto de Aseo</title>
    </head>
    <body>
        <div id="contentarea">
            <a href="insert_aseo.php">Nuevo Producto</a>
            <div id="innercontentarea">
                <h1>Producto de Aseo</h1>
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>Codigo</th>
                            <th>Producto</th>
                            <th>Accion</th>
                        </tr>
                    </thead>
                    <tbody>
                    
                <?php while ($cursor->hasNext()):
                    $article = $cursor->getNext();
                    ?>
                        <tr>
                            <td><?php echo $article['codigo']; ?></td>
                            <td><?php echo $article['producto']; ?></td>
                            <td><a href="detalle.php?id=<?php echo $article['_id']; ?>">Leer M&aacute;s</a></td>
                        </tr>

                <?php endwhile; ?>
                </tbody>
                </table>
            </div>
        </div>
    </body>
</html>

<?php 
/* Ejemplo de consulta en el shell de Mongo que obtiene todos los documentos de
 * una colección llamada peliculas que tienen su campo genero configurado como
 * aventura:
 * >db.peliculas.find({"genero":"aventura"})
{ "_id" : ObjectId("4db439153ec7b6fd1c9093ec"), "nombre" : "guardianes de la noche", "genero" : "aventura", "año" : 2009 }
 */
?>