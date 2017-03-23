<?php

// Open a file
if (!is_file($myFile)) {
  die ('Unable to open file');
}

$fp = fopen($myFile,'r');
$myFileContents = fread ($fp, filesize ($myFile));
fclose ($fp);


