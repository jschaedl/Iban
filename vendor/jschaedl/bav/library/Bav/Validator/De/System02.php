<?php

namespace Bav\Validator\De;

use Bav\Validator\Math;

class System02 extends \Bav\Validator\IterationWeighted
{
    
    protected $weights = array(2, 3, 4, 5, 6, 7, 8, 9);
    protected $modulo = 11;
    
    
    protected function iterationStep()
    {
        $this->accumulator += $this->number * $this->getWeight();
    }

    protected function getResult()
    {
        $rest = ($this->accumulator % $this->modulo);
        if ($rest == 1) return false;
        
        $result = $this->modulo - ($this->accumulator % $this->modulo);
        $result = ($result == $this->modulo) ? 0 : $result;
        return (string)$result === $this->getCheckNumber();
    }
}