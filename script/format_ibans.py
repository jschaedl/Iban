#!/usr/bin/python

# usage:
# python format_ibans.py data_in.csv > data_out.php

import sys


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
		bankname = string_splitted[2]
		bic = string_splitted[7]
		rule = string_splitted[13]

		array_string = 'array('
		array_string += '"bankname" => "' + bankname.strip() + '", ' 
		array_string += '"bic" => "' + bic.strip() + '", ' 
		array_string += '"rule" => "' + rule.strip() + '", ' 
		array_string += ')'

		print '"' + instituteIdentification.strip() + '" => ' + array_string + ', ', 
	print ");"


if __name__ == '__main__':
    main()