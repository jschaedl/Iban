<?php

namespace Bav\Validator\De;

use Bav\Validator\Math;

class System75 extends System00
{
    
    protected $start = 4;
    protected $end = -2;
    
    
    public function isValid($account)
    {
        $account = ltrim($account, '0');
        $length  = strlen($account);
        
        if ($length < 6 || $length > 9) {
            return false;
        
        }
        if ($length == 9) {
            if ($account{0} == 9) {
                $account = substr($account, 1, 6);
            
            } else {
                $account = substr($account, 0, 6);
            
            }
        
        }
        return parent::isValid($account);
    }
}