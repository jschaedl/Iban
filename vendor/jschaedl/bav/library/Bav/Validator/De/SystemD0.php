<?php

namespace Bav\Validator\De;

use Bav\Validator\Math;

class SystemD0 extends \Bav\Validator\Base
{
    const SWITCH_PREFIX = '57';
    
    protected $validator;

    
    protected function validate()
    {
        $this->validator = substr($this->account, 0, 2) !== self::SWITCH_PREFIX
                         ? new System20($this->bankId)
                         : new System09($this->bankId);
    }
    
    
    /**
     * @return bool
     */
    protected function getResult()
    {
        return $this->validator->isValid($this->account);
    }
    
}