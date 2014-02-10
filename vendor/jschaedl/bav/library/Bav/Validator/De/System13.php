<?php

namespace Bav\Validator\De;

use Bav\Validator\Math;

class System13 extends System00
{
    
    protected $start = 6;
    protected $end = 1;
    protected $checknumberPosition = 7;
    
    /**
     * @param string $account
     * @return bool
     */
    public function isValid($account) {
    	if (parent::isValid($account)) {
    		return true;
    		
    	}
    	$account = ltrim($account, '0') . '00';
    	return strlen($account) <= $this->normalizedSize
    	   &&  parent::isValid($account);
    }

}