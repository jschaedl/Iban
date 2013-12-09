# Iban

A small library for validating and generating International Bankaccount Numbers (IBAN). It is build for PHP 5.3+.


[![Build Status](https://travis-ci.org/jschaedl/Iban.png)](https://travis-ci.org/jschaedl/Iban) 
[![Latest Unstable Version](https://poser.pugx.org/jschaedl/Iban/v/stable.png)](https://packagist.org/packages/jschaedl/Iban) 
[![Latest Unstable Version](https://poser.pugx.org/jschaedl/Iban/v/unstable.png)](https://packagist.org/packages/jschaedl/Iban) 
[![Total Downloads](https://poser.pugx.org/jschaedl/Iban/downloads.png)](https://packagist.org/packages/jschaedl/Iban) 
[![Dependencies Status](https://d2xishtp1ojlk0.cloudfront.net/d/12894297)](http://depending.in/jschaedl/Iban)

## Development status
This library is ready to use. The iban validation should be run fine, but there is no warranty for the generation functionality. Please use it at your own risk.

## How to contribute
If you want to fix some bugs or want to enhance some functionality, please fork the master branch and create your own development branch. 
Then fix the bug you found or add your enhancements and make a pull request. Please commit your changes in tiny steps and add a detailed description on every commit. 

### Unit Testing

All pull requests must be accompanied by passing unit tests. This repository uses phpunit and Composer. You must run `composer install` to install this package's dependencies before the unit tests will run.


## ToDos
* add support for more countries

---


## Usage example

```
<?php

use IBAN\Validation\IBANValidator;
use IBAN\Generation\IBANGenerator;
use IBAN\Rule\RuleFactory;
    
// validation example
$ibanValidator = new IBANValidator();
if ($ibanValidator->validate('DE89370400440532013000')) {
	echo "DE89370400440532013000 is valid!";
}
 
// generation example #1
$ibanGenerator = new IBANGenerator(new RuleFactory('DE'));
$generatedIban = $ibanGenerator->generate('60050101', '502502502'); 
// $generatedIban => DE15600501010001108884

// generation example #2
$generatedIban = IBANGenerator:DE('60050101', '502502502');
// $generatedIban => DE15600501010001108884
 ```	
    
## How to Install

First install composer, if you haven't already:

```
curl -sS https://getcomposer.org/installer | php
```

Add the following to your composer.json:

```
"require": {
    "jschaedl/iban": "v1.1"
}
```

And run the composer install command.

```
sudo composer.phar install
```

## Author

[Jan Schädlich](https://github.com/jschaedl)

## Contributions

[Stefan Warnat](https://github.com/swarnat)

[Simon Mönch](https://github.com/smoench)

## License

MIT Public License
