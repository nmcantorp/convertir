<?php
$id = $_GET['id'];
try {
    $connection = new Mongo();
    $database = $connection->selectDB('supermercado');
    $collection = $database->selectCollection('aseo');
} catch (MongoConnectionException $e) {
    die("Failed to connect to database " . $e->getMessage());
}
$article = $collection->findOne(array('_id' => new MongoId($id)));
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <link rel="stylesheet" href="style.css" />
        <title>Producto de Aseo</title>
    </head>
    <body>
        <div id="contentarea">
            <a href="lista_aseo.php">Volver</a>
            <div id="innercontentarea">
                <h1>Producto de Aseo</h1>
                <h2><?php echo $article['codigo']; ?></h2>
                <p><?php echo $article['producto']; ?></p>
            </div>
        </div>
    </body>
</html>