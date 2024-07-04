<!-- Php is a scripting language, xampp is our server ...It make suse of tags *float means decimal number *Instead of console.log in js, we use echo, print and print_r to get our output while var_dump gives us the string length, data type and print it out also-->
<?php
 $favour = "Adeleke";
 $age = 29;
 
//  echo($favour);
//  echo($age);

//  print($age);
//  print_r($favour);
//  var_dump($favour)

 $num1 = 2;
 $num2 = 5;
//  echo($num1 + $num2);

//  $word1 = "Adeleke";
//  $word2 = "Favour";
//  var_dump("Adeleke", "Favour");



// Datatypes in php

// 1. strings
// $string = "A String";
// echo($string);
// echo(strlen($string));
// echo(strrev($string));


// 2. Integers
$integer = 29;
// echo($integer);
// echo($integer + $num1);
// echo($integer * $num2);
// echo($integer / $num2);
// echo($integer - ($num2 * $num1));
// echo($integer * $integer)
// var_dump($integer);

// 3. Float
$float = 20.20;
// echo($float);
// var_dump($float);

// 4. Comparison operations
// echo(12 > 10); //returns 1 as true
// echo(12 < 10); //returns 0 or blank as false
// echo(12 <! 10);
// echo(12 >! 10);
// echo(12 != 10);
// echo(12 == 10);
// echo(10 == "10");
// echo(10 === "10");
// echo(12 != 10);
// echo(12 !== 10);
//True is 1, false is 0 in booleans


//Functions
//Two types of functions, Inbuilt function and user-defined function

// echo(is_int($age));
// echo(is_float($float));
// echo(is_finite($integer));
// echo(is_nan($float));
// echo(is_numeric($num1))

// echo("True"&&"False");
// echo(TRUE or FALSE);
$var = FALSE;
$var2 = TRUE;
echo($var);
echo($var2);
?>