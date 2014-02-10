<?php

namespace Bav\Validator\De;

use Bav\Validator\Math;

class SystemB7 extends System01
{

    protected $weights = array(3, 7, 1);
    
    protected function getResult()
    {
        return (Math::isBetween($this->account, 1000000,   5999999) || Math::isBetween($this->account, 700000000, 899999999))
             ? parent::getResult()
             : true;
    }
}