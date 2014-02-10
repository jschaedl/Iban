<?php

namespace Bav\Validator\De;

use Bav\Validator\Math;

class SystemA1 extends System00
{

    protected $weights = array(2, 1, 2, 1, 2, 1, 2, 0, 0);
    
    protected function getResult()
    {
        $length = strlen(ltrim($this->account, '0'));
        return ($length == 8 || $length == 10) && parent::getResult();
    }
    
}