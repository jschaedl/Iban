#!/usr/bin/python

# usage:
# python format_ibans.py data_in.csv > data_out.php

import sys

instituteIdentification = ''
bankName = ''
bankPoCode = ''
bankCity = ''
bankShortname = ''
bankName = ''
pan = ''
bic = ''
checksumMethod = ''
rule = ''

def printProperties(string_splitted):
	bankName = string_splitted[2]
	bankPoCode = string_splitted[3]
	bankCity = string_splitted[4]
	bankShortname = string_splitted[5]
	pan = string_splitted[6]
	bic = string_splitted[7]
	checksumMethod = string_splitted[8]
	rule = string_splitted[13]
	array_string = 'array('
	array_string += '"bankName" => "' + bankName.strip() + '", ' 
	array_string += '"bankPoCode" => "' + bankPoCode.strip() + '", ' 
	array_string += '"bankCity" => "' + bankCity.strip() + '", ' 
	array_string += '"bankShortname" => "' + bankShortname.strip() + '", ' 
	array_string += '"pan" => "' + pan.strip() + '", ' 
	array_string += '"bic" => "' + bic.strip() + '", ' 
	array_string += '"checksumMethod" => "' + checksumMethod.strip() + '", ' 
	array_string += '"rule" => "' + rule.strip() + '", ' 
	array_string += ')'
	return array_string

def main():
	print "<?php"
	print "return array(", 
	
	with open(sys.argv[1], 'rb') as ibans:
		content = ibans.readlines()

	for line in content:
		string = ''
		for i in line:
			string += str(i)
		string_splitted = string.split(';')
		instituteIdentification = string_splitted[0]
		array_string = printProperties(string_splitted)
		print '"' + instituteIdentification.strip() + '" => ' + array_string + ', ', 
	print ");"


if __name__ == '__main__':
    main()