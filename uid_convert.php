#!/usr/bin/php
<?php

$UID = $argv[1];

echo "UID   : " . $UID . "\n";

if (strlen($UID) == 8) {
	$IK3 = str_pad(hexdec($UID), 13, '0', STR_PAD_LEFT);
	echo "IK3/IS: " . $IK3;
} elseif (strlen($UID) == 10) {
	$UIDsplit = str_split($UID,2);
	$HEX_OUT = "";
	foreach ($UIDsplit as $hex) {
		$byte = str_pad(base_convert($hex,16,2), 8, '0', STR_PAD_LEFT);
		$byte_reverse = strrev($byte);
		$bin = str_split($byte_reverse,4);
		foreach ($bin as $key) {
			$HEX_OUT .= base_convert($key,2,16);
		}
	}
	$IK3 = str_pad(base_convert($HEX_OUT,16,10), 13, '0', STR_PAD_LEFT);
	echo "IK3/IS: " . $IK3;
} else {
	echo "UID muss 32bit (HEX-8) oder 40bit (HEX-10) sein.";
}

?>
