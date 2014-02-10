<?php

namespace Bav\Validator\De;

use Bav\Validator\Math;

class System71 extends \Bav\Validator\IterationWeighted
{

    protected $weights = array(6, 5, 4, 3, 2, 1);
    protected $start = 1;
    protected $end = 6;
    
    protected function iterationStep() {
        $this->accumulator += $this->number * $this->getWeight();
    }


    protected function getResult() {
        $result = 11 - ($this->accumulator % 11);
        $result = $result >= 10
                ? 11 - $result
                : $result;
        return (string)$result === $this->getChecknumber();
    }
}