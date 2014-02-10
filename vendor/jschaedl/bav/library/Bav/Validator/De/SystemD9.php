<?php

namespace Bav\Validator\De;

use Bav\Validator\Math;
use Bav\Bank\Bank;

class SystemD9 extends \Bav\Validator\Chain
{

    public function __construct($bankId)
    {
        parent::__construct($bankId);
        $this->validators[] = new System00($bankId);
        $this->validators[] = new System10($bankId);
        $this->validators[] = new System18($bankId);
    }
    
}