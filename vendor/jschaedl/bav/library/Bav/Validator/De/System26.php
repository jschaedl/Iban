<?php

namespace Bav\Validator\De;

use Bav\Validator\Math;

class System26 extends System06
{
    
    protected $weights = array(2, 3, 4, 5, 6, 7);
    protected $start = 6;
    protected $end = 0;
    protected $checknumberPosition = 7;

    protected function init($account)
    {
        parent::init($account);
        
        if (substr($this->account, 0, 2) === '00') {
            $this->account = substr($this->account, 2).'00';

        }
    }
}