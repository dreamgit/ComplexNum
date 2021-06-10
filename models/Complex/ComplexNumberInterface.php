<?php


namespace app\models\Complex;

interface ComplexNumberInterface
{
    public function __construct(string|array $data = '');
    
    public function __toString(): string;
    
    public function parseString(): void;
    
    public function makeString(): void;
}
