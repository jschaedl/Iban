<?php

namespace Bav\Validator\De;

use Bav\Validator\Math;

class SystemC0 extends \Bav\Validator\Chain
{


    public function __construct($bankId)
    {
        $this->validators[] = new System52($bankId);
        $this->validators[0]->setWeights(array(2, 4, 8, 5, 10, 9, 7, 3, 6, 1, 2, 4));
        
        $this->validators[] = new System20($bankId);
        $this->validators[1]->setWeights(array(2, 3, 4, 5, 6, 7, 8, 9, 3));
    }
    
    public function useValidator(\Bav\Validator\Base $validator)
    {
        return $validator !== $this->validators[0]
            || preg_match('~^00[^0]~', $this->account);
    }
    
}