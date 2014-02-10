<?php

namespace Bav\Validator\De;

use Bav\Validator\Math;

class System76 extends \Bav\Validator\IterationWeighted
{
    
    protected $checknumberPosition = -3;
    protected $start = -4;
    protected $end = 1;
    
    public function isValid($account)
    {
    	if (parent::isValid($account)) {
            return true;
            
        }
        $account = ltrim($account, '0') . '00';
        return strlen($account) <= $this->normalizedSize
           &&  parent::isValid($account);
    }
    
    
    public function getWeight()
    {
        return $this->i + 2;
    }


    protected function iterationStep()
    {
        $this->accumulator += $this->number * $this->getWeight();
    }


    protected function getResult()
    {
        $result = $this->accumulator % 11;
        return array_search((int)$this->account{0}, array(0, 4, 6, 7, 8, 9)) !== false
            && $result != 10
            && (string)$result === $this->getChecknumber();
    }
}