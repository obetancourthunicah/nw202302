<?php

require_once 'oopbasics.php';

$resposteria = array();
$resposteria[] = new Producto('R001',30,"Flan de Queso");
$resposteria[] = new Producto('R002',50,"Flan de Coco");
$resposteria[] = new Producto('R003',80,"Flan Imposible");

$bebidas = array();
$bebidas[] = new Producto('B001', 15, 'Soda');
$bebidas[] = new Producto('B002', 25, 'Café');
$bebidas[] = new Producto('B003', 45, 'Agua');

$miOrden = new Orden($bebidas[1], $resposteria[0]);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    foreach($resposteria as $producto) {
        echo $producto->getNombre() . " " . $producto->getPrecio() . "<br/>";
    }
    echo '<hr/>';
    echo $miOrden->getTotal();

    ?>
</body>
</html>
