<?php

namespace Bav\Validator\De;

use Bav\Validator\Math;

class System97 extends \Bav\Validator\Base
{

    protected $result;
    
    protected function validate()
    {
        $account = (int) ltrim(substr($this->account, 0, -1), '0');
        $this->result = $account - (int)($account / 11) * 11;
    
    }
    /**
     * @return bool
     */
    protected function getResult()
    {
        return strlen(ltrim($this->account, '0')) >= 5
            && $this->result === (int) $this->getChecknumber();
    }

}