<?php

namespace Bav\Validator\De;

use Bav\Validator\Math;

class SystemD6 extends \Bav\Validator\Chain
{

    public function __construct($bankId)
    {
        parent::__construct($bankId);
        $this->validators[] = new System07($bankId);
        $this->validators[] = new System03($bankId);
        $this->validators[] = new System00($bankId);
    }

    
}