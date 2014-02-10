<?php

namespace Bav\Validator\De;

use Bav\Validator\Math;

class SystemB5 extends \Bav\Validator\Chain
{

    protected $validator;
    protected $mode1;
    protected $mode2;
    
    public function __construct($bankId)
    {
        parent::__construct($bankId);
        $this->validators[] = new System01($bankId);
        $this->validators[0]->setWeights(array(7, 3, 1));
        
        $this->validators[] = new System00($bankId);
        $this->validators[1]->setWeights(array(2, 1));
    }
    
    /**
     * @return bool
     */
    protected function continueValidation(\Bav\Validator\Base $validator)
    {
        if ($validator === $this->validators[1]) {
            return $this->account{0} < 8;
        
        }
        return true;
    }
    
}