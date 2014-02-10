<?php

namespace Bav\Validator\De;

use Bav\Validator\Math;

class System61 extends \Bav\Validator\IterationWeighted
{
         
    protected $checknumberPosition = -3;
    protected $start = 0;
    
    public function init($account)
    {
        parent::init($account);
        
        if ($this->account{8} == 8) {
            $this->setWeights(array(2, 1, 2, 1, 2, 1, 2, 0, 1, 2));
            $this->setEnd(-1);
        
        } else {
            $this->setWeights(array(2, 1));
            $this->setEnd(-4);
            
        }
    }


    protected function iterationStep()
    {
        $this->accumulator += Math::crossSum($this->number * $this->getWeight());
    }


    protected function getResult()
    {
        $result = (10 - ($this->accumulator % 10)) % 10;
        return (string)$result === $this->getCheckNumber();
    }
}