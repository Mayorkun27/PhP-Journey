<?php
    
    $break = "<br>";
    // FUNCTION

    echo("<h4>FUNCTIONS WITHOUT PARAMETERS</h4>");
    function greetUser () {
        echo "Hello, User!";     
    };

    greetUser();
    echo $break;


    function greetUser2 ($name) {
        echo("Hello, ".$name."!");     
    };

    greetUser2("Adeleke");
    echo $break;

    function calc ($a, $b) {
        echo $a + $b;
    };

    calc(3, 5);
    echo $break;

    echo("<h4>FUNCTIONS WITH DEFAULT PARAMETERS</h4>");
    function calcnums($x = 10, $y = 30) {
        return($x + $y);
    };
    
    echo(calcnums());
    echo $break;

    // OR USE THIS

    $e = 10;
    $f = 30;
    function calcnums2($e, $f) {
        return($e + $f);
    };
    
    echo(calcnums2($e, $f));

    echo $break;

    function checkValue($a, $b) {
        if ($a > $b) {
           echo $a. " is greater than ". $b;
        } else {
            echo $b. " is greater than ". $a;
        }
    };

    checkValue(2, 3);
    echo $break;

    // 
    echo("<h4>FUNCTIONS WITH VARIABLE LENGTH AEGUMENTS</h4>");
    // We use this when we don't know the number of arguments to be used
    function sumAll(...$nums) { 
        // "..." ie 3dots => means splat
        $sum = 0;
        foreach ($nums as $num) {
            $sum += $num;
        };
        return($sum);
    };

    echo(sumAll(2, 5, 9, 13, 17));
    echo $break;

    // ASSIGNMENT --- Write a function to check if a function is even or odd 2.Calculate the sum of 1 to 10 3.Read about functions returning an array 4.Read about recursive functions 5.Read about Global function
?>