<?php

namespace Bav\Validator\De;

use Bav\Validator\Math;

class System56 extends \Bav\Validator\IterationWeighted
{
    
    protected $weights = array(2, 3, 4, 5, 6, 7);
        
    protected function iterationStep()
    {
        $this->accumulator += $this->number * $this->getWeight();
    }


    protected function getResult()
    {
        $result = 11 - ($this->accumulator % 11);
        if ($this->account{0} == 9 && $result >= 10) {
            $result -= 3;
        
        }
        return (string)$result === $this->getCheckNumber();
    }
}