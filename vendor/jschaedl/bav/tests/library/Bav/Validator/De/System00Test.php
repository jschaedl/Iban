<?php
namespace Bav\Validator\De;

class System00Test extends SystemTestCase
{

    public function testWithValidAccountReturnsTrue()
    {
        $validAccounts = array(
            '9290701',
            '539290858',
            '1501824',
            '1501832'
        );
        
        foreach ($validAccounts as $account) {
            $validator = new System00($this->bankId);
            $this->assertTrue($validator->isValid($account));
        }
    }

    public function testWithInvalidAccountReturnsFalse()
    {
        $validAccounts = array(
            '3290701',
            '539290990',
            '1101824',
            '1000802'
        );
        
        foreach ($validAccounts as $account) {
            $validator = new System00($this->bankId);
            $this->assertFalse($validator->isValid($account));
        }
    }
}
