#!/usr/bin/php
<?php

define('DEBUG', FALSE);
unset($argv[0]);

if (DEBUG)
	print_r($argv);

$columns_count=$argc-1;
$c=0;
$l=0;
$data=array();

foreach(file('php://stdin') as $line){
	$line=trim($line);
	
	if($c >= $columns_count) {
		$c=0;
		if(!isset($data[$l])) {
			$data[$l]=array();
		}
		$l++;
	}
	
	$data[$l][$argv[$c+1]]=$line;
	$c++;
}

if (DEBUG)
	print_r($data);

// Example output to CSV
foreach($data as $line){
	echo implode(';', array(
		$line[$argv[1]],
		$line[$argv[2]],
		$line[$argv[3]],
		$line[$argv[4]],
		$line[$argv[5]],
		$line[$argv[6]],
		$line[$argv[7]],
		$line[$argv[8]]
	))."\n";
}
