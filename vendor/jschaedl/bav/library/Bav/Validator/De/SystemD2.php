<?php

namespace Bav\Validator\De;

use Bav\Validator\Math;

class SystemD2 extends \Bav\Validator\Chain
{
    
    protected $doNormalization = false;
    
    public function __construct($bankId)
    {
        parent::__construct($bankId);
        $this->validators[] = new System95($bankId);
        $this->validators[] = new System00($bankId);
        $this->validators[] = new System68($bankId);
    }
    
    
}