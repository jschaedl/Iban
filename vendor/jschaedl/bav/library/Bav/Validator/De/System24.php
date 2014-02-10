<?php

namespace Bav\Validator\De;

use Bav\Validator\Math;

class System24 extends \Bav\Validator\IterationWeighted
{
    
    protected $weights = array(1, 2, 3);
    protected $start = 0;
    protected $end = -2;
    
    protected function init($account)
    {
    	parent::init($account);
        
        $this->account = preg_replace('~^([3456]|9..)?0*~', '', $this->account);
    }

    protected function getResult()
    {
        $result = $this->accumulator % 10;
        return (string)$result === $this->getChecknumber();
    }

    protected function iterationStep()
    {
        $this->accumulator += ($this->number * $this->getWeight() + $this->getWeight()) % 11;
    }
}