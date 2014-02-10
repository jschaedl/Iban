<?php

namespace Bav\Validator\De;

use Bav\Validator\Math;

class System62 extends \Bav\Validator\IterationWeighted
{
         
    protected $weights = array(2, 1);
    protected $checknumberPosition = -3;
    protected $start = -4;
    protected $end = 2;
    
    protected function iterationStep()
    {
        $this->accumulator += Math::crossSum($this->number * $this->getWeight());
    }


    protected function getResult()
    {
        $result = (10 - ($this->accumulator % 10)) % 10;
        return (string)$result === $this->getCheckNumber();
    }
}