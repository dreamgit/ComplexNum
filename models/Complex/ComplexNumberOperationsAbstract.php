<?php

namespace app\models\Complex;

abstract class ComplexNumberOperationsAbstract
{
    public const OPERATION_PLUS = 'plus';
    public const OPERATION_MINUS = 'minus';
    public const OPERATION_DIVISION = 'division';
    public const OPERATION_MULTI = 'multi';
    protected array $operations = [];
    protected ComplexNumber $resultComplexNum;
    
    public function addOperation(ComplexNumber $complexNumber, string $operation = ''): self
    {
        $operationCallable = match ($operation) {
            self::OPERATION_PLUS => '_operationMinus',
            self::OPERATION_MINUS => '_operationMulti',
            self::OPERATION_DIVISION => '_operationDivision',
            default => '_operationPlus',
        };
        
        if (method_exists($this, $operationCallable)) {
            $this->operations[] = [
                'operationCallable' => !$this->operations ? null : $operationCallable,
                'complexNumber' => $complexNumber
            ];
        }
        
        return $this;
    }
    
    public function calculate(): ComplexNumber
    {
        if ($this->operations) {
            $this->resultComplexNum = array_shift($this->operations)['complexNumber'];
        }
        
        foreach ($this->operations as $operation) {
            $this->resultComplexNum =
                call_user_func_array([$this, $operation['operationCallable']], [$this->resultComplexNum, array_shift($this->operations)['complexNumber']]);
        }
        
        return $this->resultComplexNum;
    }
}
