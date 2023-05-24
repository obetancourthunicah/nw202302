<?php
session_start();
$ordenes = array();
if(isset($_SESSION["ordenes"])){
    $ordenes = $_SESSION["ordenes"];
}


?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Listado de Ordenes</h1>
    <?php
        echo json_encode($ordenes, JSON_PRETTY_PRINT, 5);
    ?>
</body>
</html>
