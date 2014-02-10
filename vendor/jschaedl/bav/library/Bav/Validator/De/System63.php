<?php

namespace Bav\Validator\De;

use Bav\Validator\Math;

class System63 extends \Bav\Validator\IterationWeighted
{
         
    protected $weights = array(2, 1);
    protected $checknumberPosition = 7;
    protected $start = 6;
    protected $end = 1;
    
    public function isValid($account)
    {
        if (parent::isValid($account)) {
            return true;
        
        }
        if (substr($this->account, 0, 3) !== '000') {
            return false;
        
        }
        return parent::isValid(ltrim($account.'00', '0'));
    }


    protected function iterationStep()
    {
        $this->accumulator += Math::crossSum($this->number * $this->getWeight());
    }


    protected function getResult()
    {
        $result = (10 - ($this->accumulator % 10)) % 10;
        return $this->account{0} == '0' && (string)$result === $this->getChecknumber();
    }
}