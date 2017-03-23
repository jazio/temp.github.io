<?php
/**
 * This script demonstrate the use of various date functions in php.
 * Ovi Farcas 2013
 */

$str = date('Y-m-d H:i:s');
echo 'Current Date: ' . $str;
echo '</br>--------------------------------------------</br>';

/**
 * There cannot be a strtotime reverse function because this is not a bijection.
 * The source string from which you get a UNIX timestamp when you use strtotimecan be formatted in many different ways.
 */

$timestamp = convert_datetime($str);
echo 'Unix timestamp [mktime]: ' . $timestamp;
echo '</br>--------------------------------------------</br>';
//or the equivalent
$timestamp2 = strtotime($str);
echo 'Unix timestamp [strtotime]: ' . $timestamp2;
echo '</br>--------------------------------------------</br>';
/**
 *
 * @param type $str
 * @return type
 */

function convert_datetime($str)
{
list($date, $time) = explode(' ', $str);
list($year, $month, $day) = explode('-', $date);
list($hour, $minute, $second) = explode(':', $time);

$timestamp = mktime($hour, $minute, $second, $month, $day, $year);

return $timestamp;
}

