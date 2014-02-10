<?php

namespace Bav\Validator\De;

use Bav\Validator\Math;

class System87c extends \Bav\Validator\IterationWeighted
{
    
    protected $weights = array(2, 3, 4, 5, 6);
    protected $end = 4;
    
    protected function iterationStep()
    {
        $this->accumulator += $this->number * $this->getWeight();
    }

    protected function getResult()
    {
        $result = 7 - ($this->accumulator % 7);
        $result = $result == 7 ? 0 : $result;
        return (string)$result === $this->getCheckNumber();
    }
    
}