<?php

namespace Bav\Validator\De;

use Bav\Validator\Math;

class System17 extends \Bav\Validator\IterationWeighted
{
    
    protected $weights = array(1, 2);
    protected $start = 1;
    protected $end = 6;
    protected $checknumberPosition = 7;
    
    
    protected function iterationStep()
    {
        $this->accumulator += Math::crossSum($this->number * $this->getWeight());
    }

    protected function getResult()
    {
        $result = (10 - ($this->accumulator - 1) % 11) % 10;
        return $this->accumulator != 0 && (string)$result === $this->getCheckNumber();
    }
}