<?php

namespace Bav\Validator\De;

use Bav\Validator\Math;

class System99 extends System06
{

    protected $weights = array(2, 3, 4, 5, 6, 7);
    
    public function isValid($account)
    {
        return parent::isValid($account)
            || Math::isBetween($account, 396000000, 499999999);
    }
    
}