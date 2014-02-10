<?php

namespace Bav\Validator\De;

use Bav\Validator\Math;

class System22 extends \Bav\Validator\IterationWeighted
{
    
    protected $weights = array(3, 1);

    protected function iterationStep()
    {
        $this->accumulator += ($this->number * $this->getWeight()) % 10;
    }

    protected function getResult()
    {
        $result = (10 - ($this->accumulator % 10)) % 10;
        return (string)$result === $this->getCheckNumber();
    }
}