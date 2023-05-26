<?php 
/*
Empleado
    TH - TD = SN
    TH = TI + (TP * 0)
    TI = SB + CM + BN + HES + HE2 + HE3
    TP = IHSSP + RAPP + INFOPP
    TD = IHSS + RAP + INFOP + PR + SSP + DED
 */
/* Cadena de Responsabilidad */

interface IPayrollNode
{
    public function process(float $value): float;
    public function __construct(IPayrollNode $nextNode);
}

class SalaryToPay implements IPayrollNode
{
    private IPayrollNode $next;
    public function __construct(IPayrollNode $nextNode)
    {
        $this->next = $nextNode;
    }
    public function process(float $value):float
    {
        if ($this->next) {
            return $this->next->process($value);
        }
        return $value;
    }
}

class CommissionsToPay implements IPayrollNode
{
    private ?IPayrollNode $next;
    public function __construct(?IPayrollNode $nextNode = null)
    {
        $this->next = $nextNode;
    }
    public function process(float $value):float
    {
        // Ir a la DB y ver si hay comisiones
        $newValue = $value * 1.10;
        if ($this->next) {
            return $this->next->process($newValue);
        }
        return $newValue;
    }
}

?>
