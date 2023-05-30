 <?php
require_once 'oopPlanilla.php';

// Establece la cadena de responsabilidad
$Planilla = new SalaryToPay(
    new CommissionsToPay(
        new IHSSToPay(
            new RapToPay()
        )
    )
);

$arrSalarios = array(100, 150, 900, 800, 12930);
foreach ($arrSalarios as $salario) {
    echo "Salario: " . $salario . " -> ";
    echo $Planilla->process($salario);
    echo '<br/>';
}

 ?>
