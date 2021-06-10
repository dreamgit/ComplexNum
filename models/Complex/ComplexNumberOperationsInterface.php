<?php

namespace app\models\Complex;

interface ComplexNumberOperationsInterface
{
    public function addOperation(ComplexNumber $complexNumber, string $operation = ''): self;
    
    public function calculate(): ComplexNumber;
}
