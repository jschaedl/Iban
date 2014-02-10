<?php
namespace Bav;

class BankAccount
{
    // $bank
    // $ibanRule
    // 
    
    protected $bankId;
    protected $bankAccountNumber;
    protected $locale;
    
    public function __construct($bankId, $bankAccountNumber, $locale)
    {
    	$this->bankId = $bankId;
    	$this->bankAccountNumber = $bankAccountNumber;
    	$this->locale = $locale;
    }
    
    
}
