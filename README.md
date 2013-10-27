# Iban

A small library for validating and generating International Bankaccount Numbers (IBAN). It is build for PHP 5.3+.


[![Build Status](https://travis-ci.org/jschaedl/Iban.png)](https://travis-ci.org/jschaedl/Iban) 
[![Latest Unstable Version](https://poser.pugx.org/jschaedl/Iban/v/stable.png)](https://packagist.org/packages/jschaedl/Iban) 
[![Latest Unstable Version](https://poser.pugx.org/jschaedl/Iban/v/unstable.png)](https://packagist.org/packages/jschaedl/Iban) 
[![Total Downloads](https://poser.pugx.org/jschaedl/Iban/downloads.png)](https://packagist.org/packages/jschaedl/Iban) 
[![Dependencies Status](https://d2xishtp1ojlk0.cloudfront.net/d/12894297)](http://depending.in/jschaedl/Iban)

## Development status
This library is currently under development and at the moment not ready for production use. The iban validation should be run fine, but the generation functionality is not yet complete. Contributions are welcome.

## How to contribute

Please fork the master branch and create your own development branch. Then for example add a new iban rule and make a pull request. 

### Unit Testing

All pull requests must be accompanied by passing unit tests. This repository uses phpunit and Composer. You must run `composer install` to install this package's dependencies before the unit tests will run.


## ToDos
* add more iban rules to [Rule package](https://github.com/jschaedl/Iban/tree/master/src/IBAN/Rule) (see: [IBAN-Regeln](http://www.kigst.de/media/Deutsche_Bundesbank_Uebersicht_der_IBAN_Regeln_Stand_Juni_2013.pdf))
* add support for more countries

---


## Usage example

```
<?php

use IBAN\Validator\IBANValidator;
use IBAN\Generation\IBANGeneration;
    
// validation example
$ibanValidator = new \IBAN\Validation\IBANValidator();
if ($ibanValidator->validate('DE89370400440532013000')) {
	echo "DE89370400440532013000 is valid!";
}
 
// generation example
$instituteIdentifier = '60050101';
$bankAccountNumber = '502502502';
$generatedIban = IBANGenerator::DE($instituteIdentifier, $bankAccountNumber); 
// $generatedIban => DE15600501010001108884
 ```	
    
## How to Install

Add the following to your composer.json:


```
"require": {
        "jschaedl/iban": "dev-master"
}
```

And run the composer install command.

```
sudo composer.phar install
```

## Author

[Jan Schädlich](https://github.com/jschaedl)

## License

MIT Public License
