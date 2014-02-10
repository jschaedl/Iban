<?php

namespace Bav\Validator\De;

use Bav\Validator\Math;

class SystemA4b extends \Bav\Validator\IterationWeighted
{

    protected $weights = array(2, 3, 4, 5, 6, 7, 0, 0, 0);
    protected $end = 3;
    
    protected function iterationStep()
    {
        $this->accumulator += $this->number * $this->getWeight();
    }


    protected function getResult()
    {
        $result = 7 - $this->accumulator % 7;
        $result = $result == 7
                ? 0
                : $result % 10;
        return (string)$result === $this->getChecknumber();
    }
    
}