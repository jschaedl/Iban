<?php

namespace Bav\Validator\De;

use Bav\Validator\Math;

class System31 extends \Bav\Validator\IterationWeighted
{
    
    protected $weights = array(9, 8, 7, 6, 5, 4, 3, 2, 1);
    
    protected function iterationStep()
    {
        $this->accumulator += $this->number * $this->getWeight();
    }

    protected function getResult()
    {
        $result = $this->accumulator % 11;
        if ($result == 11) {
            $result = 0;
            
        } elseif ($result == 10) {
            return false;
        
        }
        return (string)$result === $this->getCheckNumber();
    }
}