<?php

namespace Bav\Validator\De;

use Bav\Validator\Math;

class System08 extends System00
{
    
    protected $weights = array(2, 1);

    protected function getResult()
    {
        if ((int) $this->account < 60000) return false;
        return parent::getResult();
    }
}