<?php

namespace Bav\Validator\De;

use Bav\Validator\Math;

class SystemC5 extends \Bav\Validator\Base
{

    protected $validator;
    protected $mode1;
    protected $mode2;
    protected $mode3;
    protected $mode4;
    
    public function __construct($bankId)
    {
        parent::__construct($bankId);
        $this->mode1 = new System75($bankId);
        $this->mode2 = new System29($bankId);
        $this->mode3 = new System00($bankId);
        $this->mode4 = new System09($bankId);
    }
    
    protected function validate()
    {
        $account = ltrim($this->account, '0');
        $length  = strlen($account);
        
        switch ($length) {
            
            case 6:
            case 9:
                if ($account{0} < 9) {
                    $this->validator = $this->mode1;
                }
                break;
                
            case 8:
                if ($account{0} >= 3 && $account{0} <= 5) {
                    $this->validator = $this->mode4;
                    
                }
                break;
                
            case 10:
                if ($account{0} == 1 || $account{0} >= 4 && $account{0} <= 6 || $account{0} == 9) {
                    $this->validator = $this->mode2;
                
                } elseif ($account{0} == 3) {
                    $this->validator = $this->mode3;

                } else {
                    $circle = substr($account, 0, 2);
                    if ($circle == 70 || $circle = 85) {
                        $this->validator = $this->mode4;
                        
                    }
                }
                break;
            
            default:
                $this->validator = null;
                break;
        }
    }
    
    /**
     * @return bool
     */
    protected function getResult()
    {
        return ! is_null($this->validator) && $this->validator->isValid($this->account);
    }
    
}