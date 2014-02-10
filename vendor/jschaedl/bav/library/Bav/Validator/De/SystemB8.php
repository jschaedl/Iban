<?php

namespace Bav\Validator\De;

use Bav\Validator\Math;

class SystemB8 extends \Bav\Validator\Chain
{
    
    protected $validator9;

    public function __construct($bankId)
    {
        parent::__construct($bankId);
        $this->validators[] = new System20($bankId);
        $this->validators[0]->setWeights(array(2, 3, 4, 5, 6, 7, 8, 9, 3));
        
        $this->validators[] = new System29($bankId);
        
        $this->validator9 = new System09($bankId);
        $this->validators[] = $this->validator9;
    }
    
    /**
     * Limits System09 to the accounts
     *
     * @return bool
     */
    protected function useValidator(\Bav\Validator\Base $validator) {
        if ($validator !== $this->validator9) {
            return true;

        }
        $set1 = substr($this->account, 0, 2);
        $set2 = substr($this->account, 0, 3);
        return ($set1 >= 51  && $set1 <= 59)
            || ($set2 >= 901 && $set2 <= 910);
    }
    
}