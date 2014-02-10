<?php

namespace Bav\Validator\De;

use Bav\Validator\Math;

class SystemC1b extends \Bav\Validator\IterationWeighted
{

    protected $weights = array(1, 2);
    protected $start = 0;
    protected $end = -2;


    protected function iterationStep()
    {
        $this->accumulator += Math::crossSum($this->number * $this->getWeight());
    }


    protected function getResult()
    {
        $result = (10 - (($this->accumulator - 1) % 11)) % 10;
        return (string)$result === $this->getChecknumber();
    }
    
    
}