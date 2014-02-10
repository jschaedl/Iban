<?php

namespace Bav\Validator\De;

use Bav\Validator\Math;

class System68 extends \Bav\Validator\Chain
{

    protected $validator10;
    
    public function __construct($bankId)
    {
        parent::__construct($bankId);
        $this->validator10  = new System00($bankId);
        $this->validator10->setEnd(3);
        
        $this->validators[] = new System00($bankId);
        
        $this->validators[] = new System00($bankId);
        $this->validators[1]->setWeights(array(2, 1, 2, 1, 2, 0, 0, 1));
    }
    
    public function isValid($account) {
        switch (strlen($account)) {
        
            case 10:
                return $account{3} == 9 && $this->validator10->isValid($account);
                
            case 9:
                if ($account >= 400000000 && $account <= 499999999) {
                    return false;
                
                }
                
            case 6: case 7: case 8: case 9:
                return parent::isValid($account);
        
            default:
                return false;
        
        }
    }
    
}