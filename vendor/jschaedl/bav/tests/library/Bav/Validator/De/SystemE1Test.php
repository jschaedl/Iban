<?php

namespace Bav\Validator\De;

class SystemE1Test extends SystemTestCase
{
    public function testWithValidAccountReturnsTrue() {
        $validAccounts = array( 
                '0134211909', 
                '0100041104', 
                '0100054106', 
                '0200025107' 
        );
        
        foreach ($validAccounts as $account) {
            $validator = new SystemE1($this->bankId);
            $this->assertTrue($validator->isValid($account));
        }
    }

    public function testWithInvalidAccountReturnsFalse() {
        $validAccounts = array( 
                '0150013107', 
                '0200035101', 
                '0081313890', 
                '4268550840', 
                '0987402008' 
        );
        
        foreach ($validAccounts as $account) {
            $validator = new SystemE1($this->bankId);
            $this->assertFalse($validator->isValid($account));
        }
    }
}
