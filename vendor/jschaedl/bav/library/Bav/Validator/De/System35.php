<?php

namespace Bav\Validator\De;

use Bav\Validator\Math;

class System35 extends \Bav\Validator\IterationWeighted
{
    
    protected $weights = array(2, 3, 4, 5, 6, 7, 8, 9, 10);
    

    protected function iterationStep() {
        $this->accumulator += $this->number * $this->getWeight();
    }


    protected function getResult() {
        $result = $this->accumulator % 11;
        if ($result === 10) {
            return $this->account{9} === $this->account{8};
        
        }
        return (string)$result === $this->getCheckNumber();
    }


}