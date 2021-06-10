<?php


namespace app\models\Complex;

interface ComplexNumberInterface
{
    public function __construct(string $string = '');
    
    public function __toString(): string;
    
    public function makeString(): void;
    
    public function parseString(): void;
}
