<?php

namespace IBAN\Rule;

abstract class IBANRule
{   
    abstract public function generateIban();
}