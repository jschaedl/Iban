# Iban

*Important: This library is derecated. Please use https://github.com/jschaedl/iban-validation instead.*

A small library for validating and generating International Bankaccount Numbers (IBAN). It is build for PHP 5.3+.

[![Build Status](https://travis-ci.org/jschaedl/Iban.png)](https://travis-ci.org/jschaedl/Iban) 
[![Latest Stable Version](https://poser.pugx.org/jschaedl/iban/v/stable)](https://packagist.org/packages/jschaedl/iban) 
[![Total Downloads](https://poser.pugx.org/jschaedl/iban/downloads)](https://packagist.org/packages/jschaedl/iban) 

## Development status
This library is ready to use. The Iban validation should be run fine, but there is no warranty for the generation functionality. Please use it at your own risk.

---

## Changelog

### Version 1.3.0

* Activation of new german Iban rules valid from 6th of March 2016

### Version 1.2.0

* Activation of new german Iban rules valid from 5th of December 2016

## Installation
To install jschaedl/iban just run:

```
$ composer require jschaedl/iban
```

You can see this library on [Packagist](https://packagist.org/packages/jschaedl/iban).

Composer installs autoloader at `./vendor/autoload.php`. If you use jschaedl/iban in your php script, add:

```php
require_once 'vendor/autoload.php';
```


## Usage example

```php
<?php

use IBAN\Validation\IBANValidator;
use IBAN\Generation\IBANGeneratorDE;
use IBAN\Generation\IBANGeneratorNL;
    
// validation example
$ibanValidator = new IBANValidator();
if ($ibanValidator->validate('DE89370400440532013000')) {
	echo "DE89370400440532013000 is valid!";
}
 
// generate german iban example #1
$ibanGenerator = new IBANGeneratorDE();
$generatedIban = $ibanGenerator->generate('60050101', '502502502'); 
// $generatedIban => DE15600501010001108884

// generate german iban example #2
$generatedIban = IBANGenerator::DE('60050101', '502502502');
// $generatedIban => DE15600501010001108884

// generate dutch iban example #1
$ibanGenerator = new IBANGeneratorNL();
$generatedIban = $ibanGenerator->generate('ABNA', '123456789'); 
// $generatedIban => NL02ABNA0123456789

// generate dutch iban example #2
$generatedIban = IBANGenerator::NL('ABNA', '123456789');
// $generatedIban => NL02ABNA0123456789

```

---
 
## How to contribute
If you want to fix some bugs or want to enhance some functionality, please fork this repository and 
create a feature branch based on the develop branch or a htfix branch based on the master branch. 
Then fix the bug you found or add your enhancements and make a pull request. 
Please commit your changes in tiny steps and add a detailed description on every commit. 

### Unit Testing

All pull requests must be accompanied by passing unit tests. This repository uses PHPUnit and Composer. 
You must run `composer install` to install this package's dependencies before the unit tests will run. 
You can run the test via:

```
phpunit -c tests/phpunit.xml tests/
```

### ToDos
* add support for more countries

---
   
## Author

[Jan Schädlich](https://github.com/jschaedl)

## Contributions

https://github.com/jschaedl/Iban/graphs/contributors

## License

MIT Public License
