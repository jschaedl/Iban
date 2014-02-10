<?php

namespace Bav\Validator\De;

use Bav\Validator\Math;

class SystemB3 extends \Bav\Validator\Base
{

    protected $validator;
    protected $mode1;
    protected $mode2;
    
    public function __construct($bankId)
    {
        parent::__construct($bankId);
        $this->mode1 = new System32($bankId);
        $this->mode1->setWeights(array(2, 3, 4, 5, 6, 7));
        
        $this->mode2 = new System06($bankId);
        $this->mode2->setWeights(array(2, 3, 4, 5, 6, 7));
    }
    
    protected function validate()
    {
        $this->validator = $this->account{0} != 9
                         ? $this->mode1
                         : $this->mode2;
    }
    /**
     * @return bool
     */
    protected function getResult()
    {
        return $this->validator->isValid($this->account);
    }
    
}