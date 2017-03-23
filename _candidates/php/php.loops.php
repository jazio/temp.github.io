<?php

$tables = array (
      '0' => array(
          'name' => 'table1',
          'field' => 'field1',
      ),
      '1' => array(
          'name' => 'table2',
          'field' => 'field2',
      ),
     '2' => array(
          'name' => 'table3',
          'field' => 'field3',
      ),
     '3' => array(
          'name' => 'table4',
          'field' => 'field4',
      ),

  );


 //print_r($tables['0']['name'].'<br/>'); //table1
var_dump($tables);
print_r('<h2>Example of looping with for</h2>');
for ($i=0; $i<count($tables); $i++) {

   print_r($tables[$i]['name'].'<br/>');//table1, table2...
   print_r($tables[$i]['field'].'</br>------------------');//field1, field2...
   }
  print_r('----------------------END-------------------------');//field1, field2...




print_r('<h2>Example of looping with foreach</h2>');

  foreach($tables as $key => $value) {
        print_r('<br/>--- KEY: '. $key.'----<br/>');
        var_dump($value);
        print($value['table'] . ' : ' . $value['field']);
    }

