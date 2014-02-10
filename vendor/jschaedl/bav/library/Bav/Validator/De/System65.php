<?php

namespace Bav\Validator\De;

use Bav\Validator\Math;

class System65 extends System00
{

    protected $weights = array(2, 1, 2, 1, 2, 1, 2, 0, 1, 2);
    protected $start = 0;
    protected $checknumberPosition = 7;
    
    protected function init($account)
    {
        parent::init($account);
        
        if ($this->account{8} == 9) {
            $this->setEnd(-1);
        
        } else {
            $this->setEnd(6);
            
        }
    }
    
    
}