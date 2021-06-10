<?php

namespace app\models\Complex;

final class ComplexNumber
{
    private float $a = 0;
    private float $i = 0;
    private string $string;
    
    public function __construct(string $string = '')
    {
        if ($string) {
            $this->setString($string);
            $this->parseString();
        }
    }
    
    public function __toString(): string
    {
        return $this->getString();
    }
    
    public function getString(): string
    {
        $this->makeString();
        
        return $this->string;
    }
    
    public function setString(string $string): void
    {
        $this->string = $string;
    }
    
    public function getA(): float
    {
        return $this->a;
    }
    
    public function setA(float $a): void
    {
        $this->a = $a;
    }
    
    public function getI(): float
    {
        return $this->i;
    }
    
    public function setI(string $i): void
    {
        $this->i = $i;
    }
    
    private function parseString(): void
    {
        if (preg_match_all("/(\d*)([\+\-]?\d*)i/", $this->string, $pices) && isset($pices[1], $pices[2], $pices[1][0], $pices[2][0])) {
            $this->setA((float)$pices[1][0]);
            $this->setI((float)$pices[2][0]);
        }
    }
    
    private function makeString(): void
    {
        $this->setString($this->getA() ?: '') . ($this->getA() && $this->getI() > 0 ? '+' : '') . ($this->getI() ? $this->getI() . 'i' : '');
    }
}
