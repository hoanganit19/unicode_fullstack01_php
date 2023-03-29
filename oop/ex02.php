<?php

class Calc
{
    public float $result = 0;

    public float $numberA = 0;

    public float $numberB = 0;

    public function setA(float $value): void
    {
        $this->numberA = $value;
    }

    public function setB(float $value): void
    {
        $this->numberB = $value;
    }

    public function makeTotal(): void
    {
        $this->result = $this->numberA + $this->numberB;
    }

    public function showResult(): float
    {
        return $this->result;
    }
}

$calc = new Calc();
$calc->setA(10);
$calc->setB(20);
$calc->makeTotal();
echo $calc->showResult().'<br/>';
