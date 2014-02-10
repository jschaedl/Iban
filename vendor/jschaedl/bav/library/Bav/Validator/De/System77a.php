<?php

namespace Bav\Validator\De;

use Bav\Validator\Math;

class System77a extends \Bav\Validator\IterationWeighted
{
    
    protected $start = -1;
    protected $end = 5;
    
    protected function iterationStep() {
        $this->accumulator += $this->number * $this->getWeight();
    }


    protected function getResult() {
        $result = $this->accumulator % 11;
        return $result === 0;
    }
}