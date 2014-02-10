<?php

namespace Bav\Validator\De;

use Bav\Validator\Math;

class System58 extends System02
{
    
    protected $weights = array(2, 3, 4, 5, 6, 0, 0, 0, 0);
    protected $end = 4;
        
    public function isValid($account)
    {
        return strlen($account) >= 6 && parent::isValid($account);
    }
}