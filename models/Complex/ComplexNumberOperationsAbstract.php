<?php

namespace app\models\Complex;

abstract class ComplexNumberOperationsAbstract
{
    protected array $operations = [];
    protected ComplexNumber $resultComplexNum;
    
    public function addOperation(ComplexNumber $complexNumber, string $operation = ''): self
    {
        switch ($operation) {
            case '-':
                $operationCallable = '_operationMinus';
                break;
            case '*':
                $operationCallable = '_operationEnlarge';
                break;
            case '/':
                $operationCallable = '_operationSplit';
                break;
            case '+':
            default:
                $operationCallable = '_operationPlus';
        }
        
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
