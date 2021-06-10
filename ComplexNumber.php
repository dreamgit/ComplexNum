<?php

final class ComplexNumber
{
	private float $a = 0;
	private float $i = 0;
	private string $str;
	
	public function __construct(string $string = '')
	{
		if ($string) {
			$this->setStr($string);
			$this->parseString();
		}
	}
	
	public function getA(): float
	{
		return $this->a;
	}
	
	public function setA(string $a): void
	{
		$this->a = (float)$a;
	}
	
	public function getI(): float
	{
		return $this->i;
	}
	
	public function setI(string $i): void
	{
		$this->i = (float)$i;
	}
	
	public function getStr(): string
	{
		$this->setStr(($this->getA() ?: '') . ($this->getA() && $this->getI() && $this->getI() >= 0 ? '+' : '') . ($this->getI() ? ($this->getI() . 'i') : ''));
		
		return $this->str;
	}
	
	public function setStr(string $str): void
	{
		$this->str = $str;
	}
	
	private function parseString(): void
	{
		if (preg_match_all("/(\d*)([\+\-]?\d*)i/", $this->str, $pices) && isset($pices[1], $pices[2], $pices[1][0], $pices[2][0])) {
			$this->setA($pices[1][0]);
			$this->setI($pices[2][0]);
		}
	}
}


function enlargement($str1, $str2):string {
	$num1 = new ComplexNumber($str1);
	$num2 = new ComplexNumber($str2);
	
	$res = new ComplexNumber();
	$res->setA(($num1->getA() * $num2->getA()) + (-($num1->getI() * $num2->getI())));
	$res->setI(($num1->getA() * $num2->getI()) + ($num1->getI() * $num2->getA()));
	
	return $res->getStr();
}

echo enlargement('33-23i', '43+5i');
