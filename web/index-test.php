<?php

namespace app;


use app\models\Complex\ComplexNumber;
use app\models\Complex\ComplexNumberOperations;

require_once '../models/Complex/ComplexNumber.php';
require_once '../models/Complex/ComplexNumberOperations.php';
require_once '../models/Complex/ComplexNumberOperationsAbstract.php';


$operations = new ComplexNumberOperations();
$result = $operations->addOperation(new ComplexNumber('33-23i'), '')
    ->addOperation(new ComplexNumber('43+5i'), '+')
    ->addOperation(new ComplexNumber('43+5i'), '+')
    ->addOperation(new ComplexNumber('43+5i'), '+')
    ->calculate();

echo $result;
echo $result->getString();

class ComplexNumberTest extends \PHPUnit\Framework\TestCase
{
    public function testParse()
    {
        $num = new ComplexNumber('33-23i');
        $this->assertSame(33.0, $num->getA());
        $this->assertSame(-23.0, $num->getI());
        
        $num = new ComplexNumber('-23i');
        $this->assertSame(0.0, $num->getA());
        $this->assertSame(-23.0, $num->getI());
    }
    
    public function testString()
    {
        $num = new ComplexNumber();
        
        $num->setA('33');
        $num->setI('-23');
        $this->assertSame('33-23i', $num->getString());
        
        $num->setA('33.0');
        $num->setI('-23.0');
        $this->assertSame('33-23i', $num->getString());
    }
    
    public function testEnlarg()
    {
        $this->assertSame('1534-824i', enlargement('33-23i', '43+5i'));
    }
}