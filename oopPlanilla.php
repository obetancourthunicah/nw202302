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

abstract class ChainNode implements IPayrollNode
{
    protected ?IPayrollNode $next = null;
    public function __construct(?IPayrollNode $nextNode = null)
    {
        if ($nextNode) {
            $this->next = $nextNode;
        }
    }
    public function process(float $value):float
    {
        if ($this->next) {
            return $this->next->process($value);
        }
        return $value;
    }
}

class SalaryToPay extends ChainNode
{}

class CommissionsToPay extends ChainNode
{
    public function process(float $value):float
    {
        // Ir a la DB y ver si hay comisiones
        $newValue = $value * 1.10;
        return parent::process($newValue);
    }
}

class IHSSToPay extends ChainNode
{
    public function process(float $value):float
    {
        // Ir a la DB y ver si hay comisiones
        $newValue = $value * 0.9;
        return parent::process($newValue);
    }
}

class RapToPay extends ChainNode
{
    public function process(float $value):float
    {
        // Ir a la DB y ver si hay comisiones
        $newValue = $value * 0.985;
        return parent::process($newValue);
    }
}
?>
