<?php
$break = "<br>";
    // ASSIGNMENT --- Write a function to check if a function is even or odd 2.Calculate the sum of 1 to 10 3.Read about functions returning an array 4.Read about recursive functions 5.Read about Global function

    //1. Check if a function is even or odd
    function checkEvenOdd($number) {
        // Check if there is a remainder after divide by 2
        if ($number % 2 == 0) {
            return "Number ".$number." is Even";
        } else {
            return "Number ".$number." is Odd";
        }
    }

    echo(checkEvenOdd(3));
    echo $break;

    //2. Calculate the sum of two numbers
    function sumFunction($start, $stop) {
        $sum = 0;
        for ($i = $start; $i <= $stop; $i++) {
            $sum += $i;
        }
        return "The sum of values between" . $start . " to " . $stop . " is: " . $sum;
    }
    echo sumFunction(2, 7);

    // Read about functions returning an array
    // function arrayFunction() {
    //     return array(1, 2, 3, 4, 5);
    // }
    // $array = arrayFunction();
    // echo "The array is: ".implode(", ", $array);

    // Read about recursive functions
    // function recursiveFunction($n) {
    //     if ($n > 0) {
    //         echo $n.", ";
    //         recursiveFunction($n - 1);
    //     }
    // }
    // recursiveFunction(10);

    // Read about Global function
    // $globalVariable = "This is a global variable";
    // function globalFunction() {
    //     global $globalVariable;
    //     echo "This is a global function: ".$globalVariable;
    // }
    // globalFunction();

    
?>