<?php

namespace app\models\Complex;

require_once '../models/Complex/ComplexNumberOperationsAbstract.php';

class ComplexNumberOperations extends ComplexNumberOperationsAbstract
{
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
