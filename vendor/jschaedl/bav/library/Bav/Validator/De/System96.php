<?php

namespace Bav\Validator\De;

use Bav\Validator\Math;

class System96 extends \Bav\Validator\Chain
{

    public function __construct($bankId)
    {
        parent::__construct($bankId);
        $this->validators[] = new System19($bankId);
        $this->validators[0]->setWeights(array(2, 3, 4, 5, 6, 7, 8, 9, 1));
        
        $this->validators[] = new System00($bankId);
        $this->validators[1]->setWeights(array(2, 1));
    }
    
    public function isValid($account)
    {
        return parent::isValid($account)
            || Math::isBetween($account, 1300000, 99399999);
    }
    
}