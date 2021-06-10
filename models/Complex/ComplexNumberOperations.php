<?php

namespace app\models\Complex;

require_once '../models/Complex/ComplexNumberOperationsAbstract.php';

class ComplexNumberOperations extends ComplexNumberOperationsAbstract
{
    public function _operationPlus(ComplexNumber $num1, ComplexNumber $num2): ComplexNumber
    {
        return new ComplexNumber([
            'a' => $num1->getA() + $num2->getA(),
            'i' => $num1->getI() + $num2->getI(),
        ]);
    }
    
    public function _operationMinus(ComplexNumber $num1, ComplexNumber $num2): ComplexNumber
    {
        return new ComplexNumber([
            'a' => $num1->getA() - $num2->getA(),
            'i' => $num1->getI() - $num2->getI(),
        ]);
    }
    
    public function _operationMulti(ComplexNumber $num1, ComplexNumber $num2): ComplexNumber
    {
        return new ComplexNumber([
            'a' => ($num1->getA() * $num2->getA()) + -($num1->getI() * $num2->getI()),
            'i' => ($num1->getA() * $num2->getI()) + ($num1->getI() * $num2->getA()),
        ]);
    }
    
    public function _operationDivision(ComplexNumber $num1, ComplexNumber $num2): ComplexNumber
    {
        //        $resultNum = new ComplexNumber();
        //        $resultNum->setA(($num1->getA() * $num2->getA()) + (-($num1->getI() * $num2->getI())));
        //        $resultNum->setI(($num1->getA() * $num2->getI()) + ($num1->getI() * $num2->getA()));
        //
        //        return $resultNum;
    }
}
