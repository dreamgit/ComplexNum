<?php

namespace app\models\Complex;

use function array_shift;
use function call_user_func_array;

require_once '../models/Complex/ComplexNumberOperationsAbstract.php';

class ComplexNumberOperations extends ComplexNumberOperationsAbstract
{
    protected array $operations = [];
    protected ComplexNumber $resultComplexNum;
    
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
            $this->resultComplexNum = call_user_func_array($operation['operationCallable'], [
                    $this->resultComplexNum,
                    array_shift($this->operations)['complexNumber']
                ]
            );
        }
        
        return $this->resultComplexNum;
    }
    
    protected function _operationPlus(ComplexNumber $num1, ComplexNumber $num2): ComplexNumber
    {
        $resultNum = new ComplexNumber();
        $resultNum->setA(($num1->getA() * $num2->getA()) + (-($num1->getI() * $num2->getI())));
        $resultNum->setI(($num1->getA() * $num2->getI()) + ($num1->getI() * $num2->getA()));
        
        return $resultNum;
    }
    
    protected function _operationMinus(ComplexNumber $num1, ComplexNumber $num2): ComplexNumber
    {
        $resultNum = new ComplexNumber();
        $resultNum->setA(($num1->getA() * $num2->getA()) + (-($num1->getI() * $num2->getI())));
        $resultNum->setI(($num1->getA() * $num2->getI()) + ($num1->getI() * $num2->getA()));
        
        return $resultNum;
    }
    
    protected function _operationEnlarge(ComplexNumber $num1, ComplexNumber $num2): ComplexNumber
    {
        $resultNum = new ComplexNumber();
        $resultNum->setA(($num1->getA() * $num2->getA()) + (-($num1->getI() * $num2->getI())));
        $resultNum->setI(($num1->getA() * $num2->getI()) + ($num1->getI() * $num2->getA()));
        
        return $resultNum;
    }
    
    protected function _operationSplit(ComplexNumber $num1, ComplexNumber $num2): ComplexNumber
    {
        $resultNum = new ComplexNumber();
        $resultNum->setA(($num1->getA() * $num2->getA()) + (-($num1->getI() * $num2->getI())));
        $resultNum->setI(($num1->getA() * $num2->getI()) + ($num1->getI() * $num2->getA()));
        
        return $resultNum;
    }
}
