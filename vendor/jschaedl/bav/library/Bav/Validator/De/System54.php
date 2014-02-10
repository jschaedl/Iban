<?php

namespace Bav\Validator\De;

use Bav\Validator\Math;

class System54 extends \Bav\Validator\IterationWeighted
{
    
    protected $weights = array(2, 3, 4, 5, 6, 7, 2);
    protected $end = 2;
    
    
    protected function iterationStep()
    {
        $this->accumulator += $this->number * $this->getWeight();
    }


    protected function getResult()
    {
        $result = 11 - ($this->accumulator % 11);
        return substr($this->account, 0, 2) === '49' && (string)$result === $this->getCheckNumber();
    }
}