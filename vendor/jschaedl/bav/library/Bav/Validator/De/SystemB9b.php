<?php

namespace Bav\Validator\De;

use Bav\Validator\Math;

class SystemB9b extends \Bav\Validator\IterationWeighted
{

    protected $weights = array(1, 2, 3, 4, 5, 6);
    protected $end = 3;
    
    protected function iterationStep()
    {
        $this->accumulator += $this->number * $this->getWeight();
    }


    protected function getResult()
    {
        $result = $this->accumulator % 11;
        if ((string) $result === $this->getChecknumber()) {
            return true;
            
        }
        $result += 5;
        if ($result >= 10) {
            $result -= 10;
        
        }
        return (string) $result === $this->getChecknumber();
    }
}