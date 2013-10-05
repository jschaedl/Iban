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
		print '"' + (line[:8]).strip() + '" => "' + (line[9:16]).strip() + '", ', 
	print ");"


if __name__ == '__main__':
    main()