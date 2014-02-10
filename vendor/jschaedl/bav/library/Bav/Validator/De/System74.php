<?php

namespace Bav\Validator\De;

use Bav\Validator\Math;

class System74 extends System00
{
    
    public function isValid($account)
    {
        return strlen($account) >= 2 && parent::isValid($account);
    }
    
    
    protected function getResult()
    {
        if (parent::getResult()) {
            return true;
        
        } elseif (strlen(ltrim($this->account, '0')) == 6) {
            $nextDecade     = (int) ($this->accumulator/10) + 1;
            $nextHalfDecade = $nextDecade*10 - 5;
            $check          = $nextHalfDecade - $this->accumulator;
            return (string) $check === $this->getChecknumber();
        
        } else {
            return false;
            
        }
    }
}