 <?php
require_once 'oopPlanilla.php';

// Establece la cadena de responsabilidad
$Planilla = new SalaryToPay(
    new CommissionsToPay()
);

echo $Planilla->process(100);

 ?>
