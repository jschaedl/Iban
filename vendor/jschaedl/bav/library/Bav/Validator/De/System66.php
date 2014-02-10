<?php

namespace Bav\Validator\De;

use Bav\Validator\Math;

class System66 extends \Bav\Validator\IterationWeighted
{

    protected $weights = array(2, 3, 4, 5, 6, 0, 0, 7);
    protected $start = -2;
    protected $end = 1;
    
    protected function iterationStep() 
    {
        $this->accumulator += $this->number * $this->getWeight();
    }


    protected function getResult()
    {
        $result = (11 - $this->accumulator % 11) % 10;
        return $this->account{0} == '0' && (string)$result === $this->getCheckNumber();
    }
    
    
}