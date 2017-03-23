<?php
// Replace http with https.
// preg_replace('/^http(?=:\/\/)/i','https',$url);
$url="http://www.google.com"; // example http url ##
$url = str_replace('http://', 'https://', $url );
echo $url;
