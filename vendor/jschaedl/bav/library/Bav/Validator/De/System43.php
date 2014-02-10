<?php

namespace Bav\Validator\De;

use Bav\Validator\Math;

class System43 extends \Bav\Validator\IterationWeighted
{
    
    protected $weights = array(1, 2, 3, 4, 5, 6, 7, 8, 9);

    protected function iterationStep()
    {
        $this->accumulator += $this->number * $this->getWeight();
    }


    protected function getResult()
    {
        $result = (10 - ($this->accumulator % 10)) % 10;
        return (string)$result === $this->getCheckNumber();
    }

}