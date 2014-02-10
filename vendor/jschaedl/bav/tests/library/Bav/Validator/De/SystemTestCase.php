<?php
namespace Bav\Validator\De;

use Bav\Bank\Bank;

class SystemTestCase extends \PHPUnit_Framework_TestCase
{
    protected $bankId;

    public function setUp()
    {
        $this->bankId = '12345678';
    }
}