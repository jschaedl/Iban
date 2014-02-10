<?php

namespace Bav\Validator\De;

use Bav\Validator\Math;

class System88 extends System06
{

    protected $weights = array(2, 3, 4, 5, 6, 7, 8);
    
    protected function init($account)
    {
        parent::init($account);
        
        $this->setEnd($this->account{2} == 9 ? 2: 3);
    }
    
}