<?php

namespace Bav\Validator\De;

use Bav\Validator\Math;

class System25 extends \Bav\Validator\IterationWeighted
{
    
    protected $weights = array(2, 3, 4, 5, 6, 7, 8, 9);

    protected function getResult()
    {
        $result = 11 - ($this->accumulator % 11);
        switch ($result) {
            
            case 10:
                $result = 0;
                if ($this->account{1} != 8 && $this->account{1} != 9) {
                    return false;

                }
                break;
            
            case 11:
                $result = 0;
                break;
                
        
        }
        return (string)$result === $this->getCheckNumber();
    }

    protected function iterationStep()
    {
        $this->accumulator += $this->number * $this->getWeight();
    }
}