<?php

namespace Bav\Validator\De;

use Bav\Validator\Math;

class System83x extends \Bav\Validator\IterationWeighted
{
    
    protected $weights = array(2, 3, 4, 5, 6, 7, 8);
    protected $end = 2;
    
    protected function iterationStep()
    {
        $this->accumulator += $this->number * $this->getWeight();
    }


    protected function getResult()
    {
        $result = 11 - ($this->accumulator % 11);
        $result = $result >= 10 ? 0 : $result;
        return substr($this->account, 2, 2) == 99 && (string)$result === $this->getChecknumber();
    }
}