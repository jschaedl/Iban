<?php
namespace Bav\Validator;

use Bav\Bank\Bank;

abstract class Base
{
    protected $normalizedSize = 10;

    protected $account = '';

    protected $checknumberPosition = - 1;

    protected $doNormalization = true;

    protected $bankId;

    protected $eserChecknumberOffset = 0;

    public function __construct($bankId)
    {
        $this->bankId = $bankId;
    }

    public function getChecknumberPosition()
    {
        return $this->checknumberPosition;
    }

    public function setChecknumberPosition($checknumberPosition)
    {
        $this->checknumberPosition = $checknumberPosition;
    }

    protected function getChecknumber()
    {
        return $this->account{Math::getNormalizedPosition($this->account, $this->checknumberPosition)};
    }

    abstract protected function validate();

    public function isValid($account)
    {
        try {
            $this->init($account);
            $this->validate();
            return ltrim($account, "0") != "" && $this->getResult();
        } catch (Exception\OutOfBoundsException $e) {
            return false;
        }
    }

    /**
     *
     * @param string $account            
     * @return void
     */
    protected function init($account)
    {
        if ($this->doNormalization) {
            $account = $this->normalizeAccount($account, $this->normalizedSize);
        }
        
        $this->account = $account;
    }

    protected function normalizeAccount($account, $size)
    {
        $account = (string) $account;
        if (strlen($account) > $size) {
            throw new Exception\OutOfBoundsException("Can't normalize {$account} to size {$size}.");
        }
        
        return str_repeat('0', $size - strlen($account)) . $account;
    }

    public function setNormalizedSize($size)
    {
        $this->normalizedSize = $size;
    }

    /**
     *
     * @throws BAV_ValidatorException_ESER
     * @return string
     */
    protected function getEser8($account)
    {
        $account = ltrim($account, '0');
        if (strlen($account) != 8) {
            throw new \Exception();
        }
        
        $bankId = (string) $this->bankId;
        if ($bankId{3} != 5) {
            throw new \Exception();
        }
        
        $blzPart = ltrim(substr($bankId, 4), '0');
        $this->eserChecknumberOffset = - (4 - strlen($blzPart));
        
        if (empty($blzPart)) {
            throw new \Exception();
        }
        
        $accountPart = ltrim(substr($account, 2), '0');
        $eser = $blzPart . $account{0} . $account{1} . $accountPart;
        
        return $eser;
    }

    /**
     *
     * @throws \Exception
     * @return string
     */
    protected function getEser9($account)
    {
       	$account = ltrim($account, '0');
        if (strlen($account) != 9) {
            throw new \Exception();
        }
        
        $bankId = (string) $this->bankId;
        if ($bankId{3} != 5) {
            throw new \Exception();
        }
        
        $blzPart0 = substr($bankId, - 4, 2);
        $blzPart1 = substr($bankId, - 1);
        
        $accountPart0 = $account{0};
        $t = $account{1};
        $p = $account{2};
        $accountTail = ltrim(substr($account, 3), '0');
        
        $eser = $blzPart0 . $t . $blzPart1 . $accountPart0 . $p . $accountTail;
        
        return $eser;
    }

    protected function getEserChecknumberPosition()
    {
        return Math::getNormalizedPosition($this->account, $this->checknumberPosition + $this->eserChecknumberOffset);
    }

    protected function getEserChecknumber()
    {
        return $this->account{$this->getEserChecknumberPosition()};
    }

    abstract protected function getResult();
}