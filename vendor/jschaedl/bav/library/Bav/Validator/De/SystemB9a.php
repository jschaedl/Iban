<?php

namespace Bav\Validator\De;

use Bav\Validator\Math;

class SystemB9a extends \Bav\Validator\IterationWeighted
{

    protected $weights = array(1, 3, 2);
    protected $end = 2;
    
    protected function iterationStep()
    {
        $this->accumulator += ($this->number * $this->getWeight() + $this->getWeight()) % 11;
    }


    protected function getResult()
    {
        $result = $this->accumulator % 10;
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