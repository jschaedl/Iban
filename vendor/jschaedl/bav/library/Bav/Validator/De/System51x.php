<?php

namespace Bav\Validator\De;

use Bav\Validator\Math;

class System51x extends \Bav\Validator\IterationWeighted
{
    
    protected $weights = array(2, 3, 4, 5, 6, 7, 8);
    protected $start = -2;
    protected $end = 2;
    
    
    protected function iterationStep()
    {
        $this->accumulator += $this->number * $this->getWeight();
    }


    protected function getResult()
    {
        $result = 11 - ($this->accumulator % 11);
        $result = $result == 11
                ? 0
                : $result % 10;
        return (string)$result === $this->getCheckNumber();
    }
}