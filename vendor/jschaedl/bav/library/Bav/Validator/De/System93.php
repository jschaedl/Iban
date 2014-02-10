<?php

namespace Bav\Validator\De;

use Bav\Validator\Math;

class System93 extends \Bav\Validator\Chain
{

    public function __construct($bankId)
    {
        parent::__construct($bankId);
        $this->validators[] = new System06($bankId);
        $this->validators[0]->setWeights(array(2, 3, 4, 5, 6));
        $this->validators[0]->setEnd(4);
        
        $this->validators[] = new System06($bankId);
        $this->validators[1]->setWeights(array(2, 3, 4, 5, 6));
        $this->validators[1]->setEnd(4);
        $this->validators[1]->setModulo(7);
    }
    
    /**
     * @throws BAV_ValidatorException_OutOfBounds
     * @param int $int
     */
    protected function normalizeAccount($account, $size) {
        $account = parent::normalizeAccount($account, $size);
        if (substr($account, 0, 4) !== '0000') {
            return '0000'.substr($account, 0, 6);
            
        }
    }
    
}