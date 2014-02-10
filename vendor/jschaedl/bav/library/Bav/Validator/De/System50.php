<?php

namespace Bav\Validator\De;

use Bav\Validator\Math;

class System50 extends System06
{
    protected $weights = array(2, 3, 4, 5, 6, 7);
    protected $start = -5;
    protected $end = 0;
    protected $checknumberPosition = -4;
    
    public function isValid($account)
    {
    	if (parent::isValid($account)) {
            return true;
            
        }
        $account = ltrim($account, '0') . '000';
        return strlen($account) <= $this->normalizedSize
           &&  parent::isValid($account);
    }
}