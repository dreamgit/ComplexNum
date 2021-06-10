<?php

namespace app\models\Complex;

class ComplexNumberOperations implements ComplexNumberOperationsInterface
{
    private array $operations = [];
    private ComplexNumber $resultComplexNum;
    
    public function addOperation(ComplexNumber $complexNumber, string $operation = ''): self
    {
        switch ($operation) {
            case '-':
                $operationCallable = [self::class, '_operationMinus'];
                break;
            case '*':
                $operationCallable = [self::class, '_operationEnlarge'];
                break;
            case '/':
                $operationCallable = [self::class, '_operationSplit'];
                break;
            case '+':
            default:
                $operationCallable = [self::class, '_operationPlus'];
        }
        
        $this->operations[] = [
            'operationCallable' => !$this->operations ? null : $operationCallable,
            'complexNumber' => $complexNumber
        ];
        
        return $this;
    }
    
    public function calculate(): ComplexNumber
    {
        if ($this->operations) {
            $this->resultComplexNum = array_shift($this->operations)['complexNumber'];
        }
        
        foreach ($this->operations as $operation) {
            $this->resultComplexNum = call_user_func_array(
                $operation['operationCallable'],
                [$this->resultComplexNum, array_shift($this->operations)['complexNumber']]
            );
        }
        
        return $this->resultComplexNum;
    }
    
    private function _operationPlus(ComplexNumber $num1, ComplexNumber $num2): ComplexNumber
    {
        $resultNum = new ComplexNumber();
        $resultNum->setA(($num1->getA() * $num2->getA()) + (-($num1->getI() * $num2->getI())));
        $resultNum->setI(($num1->getA() * $num2->getI()) + ($num1->getI() * $num2->getA()));
        
        return $resultNum;
    }
    
    private function _operationMinus(ComplexNumber $num1, ComplexNumber $num2): ComplexNumber
    {
        $resultNum = new ComplexNumber();
        $resultNum->setA(($num1->getA() * $num2->getA()) + (-($num1->getI() * $num2->getI())));
        $resultNum->setI(($num1->getA() * $num2->getI()) + ($num1->getI() * $num2->getA()));
        
        return $resultNum;
    }
    
    private function _operationEnlarge(ComplexNumber $num1, ComplexNumber $num2): ComplexNumber
    {
        $resultNum = new ComplexNumber();
        $resultNum->setA(($num1->getA() * $num2->getA()) + (-($num1->getI() * $num2->getI())));
        $resultNum->setI(($num1->getA() * $num2->getI()) + ($num1->getI() * $num2->getA()));
        
        return $resultNum;
    }
    
    private function _operationSplit(ComplexNumber $num1, ComplexNumber $num2): ComplexNumber
    {
        $resultNum = new ComplexNumber();
        $resultNum->setA(($num1->getA() * $num2->getA()) + (-($num1->getI() * $num2->getI())));
        $resultNum->setI(($num1->getA() * $num2->getI()) + ($num1->getI() * $num2->getA()));
        
        return $resultNum;
    }
}
