<?php

namespace Bav\Validator\De;

use Bav\Validator\Math;

class System45 extends System00
{
    
    protected function getResult()
    {
        return $this->account{0} === '0'
            || $this->account{4} === '1'
            || parent::getResult();
    }


}