<?php

namespace Bav\Validator\De;

use Bav\Validator\Math;

class System69 extends \Bav\Validator\Chain
{

    public function __construct($bankId)
    {
        parent::__construct($bankId);
        $this->validators[] = new System28($bankId);
        $this->validators[0]->setWeights(array(2, 3, 4, 5, 6, 7, 8));
        
        $this->validators[] = new System69b($bankId);
    }
    
    public function isValid($account)
    {
        return ($account >= 9300000000 && $account <= 9399999999) || parent::isValid($account);
    }
    
    
    /**
     * @return bool
     */
    protected function useValidator(\Bav\Validator\Base $validator)
    {
        if ($validator === $this->validators[0] && ($this->account >= 9700000000 && $this->account <= 9799999999)) {
            return false;
        
        }
        return true;
    }
    
}