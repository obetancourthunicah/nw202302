<?php
session_start();

$arrBebidasCaliente = array(
    "0001" => array(
        "sku" => "0001",
        "nombre" => "Cafe Americano 12 oz",
        "precio" => 30.00,
    ),
    "0002" => array(
        "sku" => "0002",
        "nombre" => "Cafe Americano 16 oz",
        "precio" => 50.00,
    ),
    "0003" => array(
        "sku" => "0003",
        "nombre" => "Capuccino 16 oz",
        "precio" => 60.00,
    ),
);

$arrReposteria = array(
    "R001" => array(
        "sku1" => "R001",
        "nombrex" => "Pastelito de Piña",
        "precio" => 50.00,
    ),
    "R002" => array(
        "sku1" => "R002",
        "nombrex" => "Flan de Queso",
        "precio" => 40.00,
    ),
    "R003" => array(
        "sku1" => "R003",
        "nombrex" => "Cheese Cake NY de Fresa",
        "precio" => 90.00,
    ),
);

function generarComboBox($arrayToProcess, $valueField, $textField, $selectedValue, $name = "unknown")
{
    $htmlBuffer = '<select name="' . $name . '" >';

    foreach ($arrayToProcess as $arrayItem) {
        // <option value="" selected> some text </option>
        $htmlBuffer .= '<option value="' . $arrayItem[$valueField] . '"';
        $htmlBuffer .= ($arrayItem[$valueField] == $selectedValue) ? ' selected ' : '';
        $htmlBuffer .= '>';
        $htmlBuffer .= $arrayItem[$textField];
        $htmlBuffer .= '</option>';
    }
    $htmlBuffer .= "</select>";
    return $htmlBuffer;
}

// Identificando se se hizo un post
$bebidasSelectedSku='0002';
$resposteriaSelectedSku='R003';

$orden = array();

if (isset($_POST["btnOrdenar"])){
    $bebidasSelectedSku=$_POST["bebidasSelectedSku"];
    $resposteriaSelectedSku=$_POST["reposteriaSelectedSku"];
    $orden["bebida"] = $arrBebidasCaliente[$bebidasSelectedSku];
    $orden["reposteria"] = $arrReposteria[$resposteriaSelectedSku];
    $orden["total"] = $orden["bebida"]["precio"] + $orden["reposteria"]["precio"];


    $ordenes = array();
    if(isset($_SESSION["ordenes"])){
        $ordenes = $_SESSION["ordenes"];
    }
    $ordenes[]=$orden;
    $_SESSION["ordenes"] = $ordenes;

}
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
    <form action="muycafe.php" method="post">
        <label for="idCombo1">Bebidas</label>
        <?php echo generarComboBox($arrBebidasCaliente, "sku", "nombre", $bebidasSelectedSku, "bebidasSelectedSku"); ?>
        <br>

        <label for="idCombo2">Repostería</label>
        <?php echo generarComboBox($arrReposteria, "sku1", "nombrex", $resposteriaSelectedSku, "reposteriaSelectedSku"); ?>
        <br>
        <button type="submit" name="btnOrdenar">Ordenar</button>
    </form>
    <div>
        <?php print_r($orden); ?>
        <br>
        <?php echo json_encode($orden, JSON_PRETTY_PRINT, 4); ?>
    </div>
</body>

</html>
