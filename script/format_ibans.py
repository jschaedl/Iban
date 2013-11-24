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
	
	bankName = string_splitted[2].strip().replace('"', '')
	bankPoCode = string_splitted[3].strip().replace('"', '')
	bankCity = string_splitted[4].strip().replace('"', '')
	bankShortname = string_splitted[5].strip().replace('"', '')
	pan = string_splitted[6].strip().replace('"', '')
	bic = string_splitted[7].strip().replace('"', '')
	checksumMethod = string_splitted[8].strip().replace('"', '')
	successorBlz = string_splitted[12].strip().replace('"', '')
	rule = string_splitted[13].strip().replace('"', '')

	array_string = 'array('
	array_string += '"bankName" => "' + bankName + '", ' 
	array_string += '"bankPoCode" => "' + bankPoCode + '", ' 
	array_string += '"bankCity" => "' + bankCity + '", ' 
	array_string += '"bankShortname" => "' + bankShortname + '", ' 
	array_string += '"pan" => "' + pan + '", ' 
	array_string += '"bic" => "' + bic + '", ' 
	array_string += '"checksumMethod" => "' + checksumMethod + '", ' 
	array_string += '"successorBlz" => "' + successorBlz + '", ' 
	array_string += '"rule" => "' + rule + '"' 
	array_string += ')'

	return array_string

def main():
	print '<?php'
	print 'return array(', 
	
	with open(sys.argv[1], 'rb') as ibans:
		content = ibans.readlines()

	for line in content:
		string = ''
		for i in line:
			string += str(i)
		string_splitted = string.split(';')
		instituteIdentification = string_splitted[0].strip().replace('"', '')
		isOwnBlz = string_splitted[1].strip().replace('"', '')
		if isOwnBlz == '1':
			array_string = printProperties(string_splitted)
			print '"' + instituteIdentification + '" => ' + array_string + ', ', 
	print ");"


if __name__ == '__main__':
    main()