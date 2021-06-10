<?php

namespace app;

use app\models\Complex\ComplexNumber;
use app\models\Complex\ComplexNumberOperations;
use PHPUnit\Framework\TestCase;

require_once '../models/Complex/ComplexNumber.php';
require_once '../models/Complex/ComplexNumberOperations.php';
require_once '../models/Complex/ComplexNumberOperationsAbstract.php';


$operations = new ComplexNumberOperations();
$result = $operations->addOperation(new ComplexNumber('33+23i'))
    ->addOperation(new ComplexNumber('43+5i'), ComplexNumberOperations::OPERATION_MINUS)
    ->addOperation(new ComplexNumber('43+5i'), ComplexNumberOperations::OPERATION_PLUS)
    ->addOperation(new ComplexNumber('43+5i'), ComplexNumberOperations::OPERATION_MULTI)
    ->calculate();

echo $result;
echo $result->getString();

class ComplexNumberTest extends TestCase
{
    public function testParse()
    {
        $num = new ComplexNumber('33-23i');
        static::assertSame(33.0, $num->getA());
        static::assertSame(-23.0, $num->getI());
    
        $num = new ComplexNumber('-23i');
        static::assertSame(0.0, $num->getA());
        static::assertSame(-23.0, $num->getI());
    }
    
    public function testString()
    {
        $num = new ComplexNumber();
        
        $num->setA('33');
        $num->setI('-23');
        static::assertSame('33-23i', $num->getString());
        
        $num->setA('33.0');
        $num->setI('-23.0');
        static::assertSame('33-23i', $num->getString());
    }
    
    public function testEnlarg()
    {
        static::assertSame('560-1518i', (new ComplexNumberOperations())->addOperation(new ComplexNumber('33-23i'))
            ->addOperation(new ComplexNumber('33-23i'), ComplexNumberOperations::OPERATION_MULTI)
            ->calculate()
            ->getString());
    }
    
    public function testPlus()
    {
        static::assertSame('-76-18i', (new ComplexNumberOperations())->addOperation(new ComplexNumber('33-23i'))
            ->addOperation(new ComplexNumber('-43-5i'), ComplexNumberOperations::OPERATION_PLUS)
            ->calculate()
            ->getString());
    }
    
    public function testMinus()
    {
        static::assertSame('-10-28i', (new ComplexNumberOperations())->addOperation(new ComplexNumber('33-23i'))
            ->addOperation(new ComplexNumber('-43-5i'), ComplexNumberOperations::OPERATION_MINUS)
            ->calculate()
            ->getString());
    }
}
