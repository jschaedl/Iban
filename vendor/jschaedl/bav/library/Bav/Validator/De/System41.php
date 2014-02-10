<?php

namespace Bav\Validator\De;

use Bav\Validator\Math;

class System41 extends System00
{
    
    protected $weights = array(2, 1);

    protected function init($account)
    {
        parent::init($account);
        
        if ($this->account{3} == 9) {
            $this->end = 3;
        
        } else {
            $this->end = 0;
        
        }
    }

}