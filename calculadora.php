<?php
$numero1 = 0;
$numero2 = 0;
$resultado = 0;
$operacion = '';

if (isset($_POST["btnAdd"])) {
    $numero1 = floatval($_POST["txtNumero1"]);
    $numero2 = floatval($_POST["txtNumero2"]);
    $resultado = $numero1 + $numero2;
    $operacion = 'suma';
} elseif (isset($_POST["btnSub"])) {
    $numero1 = floatval($_POST["txtNumero1"]);
    $numero2 = floatval($_POST["txtNumero2"]);
    $resultado = $numero1 - $numero2;
    $operacion = 'resta';
}



?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora Básica</title>
</head>
<body>
    <h1>Calculadora</h1>
    <form action="calculadora.php" method="post">
        <label for="txtNumero1">Número 1</label>
        <input type="text" name="txtNumero1" id="txtNumero1" value="<?php echo $numero1; ?>" />
        <br>
        <label for="txtNumero2">Número 2</label>
        <input type="number" name="txtNumero2" id="txtNumero2" value="<?php echo $numero2; ?>" />
        <br>
        <button type="submit" name="btnAdd">Sumar</button>
        <button type="submit" name="btnSub">Restar</button>
    </form>
    <?php if ($resultado > 0) { ?>
    <section>
        <?php echo "La " . $operacion . " de ". $numero1 . " y " . $numero2 . " es igual a " . $resultado; ?>
    </section>
    <?php } ?>
</body>
</html>
