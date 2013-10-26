<?php

namespace IBAN\Rule\DE;

class Rule001700 extends \IBAN\Rule\DE\Rule000000
{    
	public function generateIban() {
        if ($this->bankAccountNumberEquals('100')) {
            $this->bankAccountNumber = '2009090013';
        } else if ($this->bankAccountNumberEquals('111')) {
            $this->bankAccountNumber = '2111111017';
        } else if ($this->bankAccountNumberEquals('240')) {
            $this->bankAccountNumber = '2100240010';
        } else if ($this->bankAccountNumberEquals('4004')) {
            $this->bankAccountNumber = '2204004016';
        } else if ($this->bankAccountNumberEquals('4444')) {
            $this->bankAccountNumber = '2044444014';
        } else if ($this->bankAccountNumberEquals('6060')) {
            $this->bankAccountNumber = '2016060014';
        } else if ($this->bankAccountNumberEquals('102030')) {
            $this->bankAccountNumber = '1102030016';
        } else if ($this->bankAccountNumberEquals('333333')) {
            $this->bankAccountNumber = '2033333016';
        } else if ($this->bankAccountNumberEquals('909090')) {
            $this->bankAccountNumber = '2009090013';
        } else if ($this->bankAccountNumberEquals('50005000')) {
            $this->bankAccountNumber = '5000500013';
        }
        return parent::generateIban();
    }
}
