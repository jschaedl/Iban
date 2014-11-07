# Iban

A small library for validating and generating International Bankaccount Numbers (IBAN). It is build for PHP 5.3+.


[![Build Status](https://travis-ci.org/jschaedl/Iban.png)](https://travis-ci.org/jschaedl/Iban) 
[![Latest Unstable Version](https://poser.pugx.org/jschaedl/Iban/v/stable.png)](https://packagist.org/packages/jschaedl/Iban) 
[![Latest Unstable Version](https://poser.pugx.org/jschaedl/Iban/v/unstable.png)](https://packagist.org/packages/jschaedl/Iban) 
[![Total Downloads](https://poser.pugx.org/jschaedl/Iban/downloads.png)](https://packagist.org/packages/jschaedl/Iban) 
[![Dependencies Status](https://d2xishtp1ojlk0.cloudfront.net/d/12894297)](http://depending.in/jschaedl/Iban)

## Development status
This library is ready to use. The iban validation should be run fine, but there is no warranty for the generation functionality. Please use it at your own risk.

---

## Installation
To install jschaedl/iban install Composer first, if you haven't already 

```
curl -sS https://getcomposer.org/installer | php
```

Then just add the following to your composer.json file:

```js
// composer.json
{
	"require": {
		"jschaedl/iban": "1.1.6"
    }
}
```

Then, you can install the new dependencies by running Composer’s update command from the directory where your `composer.json` file is located:

```sh
# install
$ php composer.phar install
# update
$ php composer.phar update jschaedl/iban

# or you can simply execute composer command if you set it to
# your PATH environment variable
$ composer install
$ composer update jschaedl/iban
```

You can see this library on [Packagist](https://packagist.org/packages/jschaedl/iban).

Composer installs autoloader at `./vendor/autoload.php`. If you use jschaedl/iban in your php script, add:

```php
require_once 'vendor/autoload.php';
```

Or you can use git clone command:

```sh
# HTTP
$ git clone https://github.com/jschaedl/Iban.git
# SSH
$ git clone git@github.com:jschaedl/Iban.git
```


## Usage example

```php
<?php

use IBAN\Validation\IBANValidator;
use IBAN\Generation\IBANGenerator;
use IBAN\Rule\RuleFactory;
    
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
If you want to fix some bugs or want to enhance some functionality, please fork the master branch and create your own development branch. 
Then fix the bug you found or add your enhancements and make a pull request. Please commit your changes in tiny steps and add a detailed description on every commit. 

### Unit Testing

All pull requests must be accompanied by passing unit tests. This repository uses phpunit and Composer. You must run `composer install` to install this package's dependencies before the unit tests will run. You can run the test via:

```
phpunit -c tests/phpunit.xml tests/
```

### ToDos
* add support for more countries

---
   
## Author

[Jan Schädlich](https://github.com/jschaedl)

## Contributions

* [Stefan Warnat](https://github.com/swarnat)
* [Simon Mönch](https://github.com/smoench)
* [Martin Abraham](https://github.com/mabrahamde)
* [Benjamin Paap](https://github.com/benjaminpaap)
* [Dennis Lassiter](https://github.com/pulseit-dennis)


## License

MIT Public License


[![Bitdeli Badge](https://d2weczhvl823v0.cloudfront.net/jschaedl/iban/trend.png)](https://bitdeli.com/free "Bitdeli Badge")

