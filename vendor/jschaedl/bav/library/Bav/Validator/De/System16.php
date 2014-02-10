<?php

namespace Bav\Validator\De;

use Bav\Validator\Math;

class System16 extends System06
{

    protected function getResult()
    {
     	return $this->accumulator % $this->modulo === 1
     		 ? $this->getChecknumber() === $this->account{Math::getNormalizedPosition($this->account, $this->checknumberPosition) - 1}
     		 : parent::getResult();
    }

}