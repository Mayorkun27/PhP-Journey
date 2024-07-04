<?php

    $break = "<br>";

    // ARITHEMETIC OPERATIONS
    $a = 10;
    $b = 5;

    // ADDING
    $sum = $a + $b;
    var_dump($sum);
    echo($break);

    // SUBTRACTING
    $sub = $a - $b;
    var_dump($sub);
    echo($break);

    // MULTIPLYING
    $mul = $a * $b;
    var_dump($mul);
    echo($break);

    // DIVISION
    $div = $b / $a;
    var_dump($div);
    echo($break);

    // EXPONENTIAL
    $expo = $b ** 2;
    var_dump($expo);
    echo($break);

    // MODULE
    $mod = $a % $b;
    var_dump($mod);
    echo($break);

    // INCREAMENT
    $inc = $a++;
    $inc = $a++;
    var_dump($inc);
    echo($break);

    // DECREAMENT
    $dec = $b--;
    $dec = $b--;
    var_dump($dec);
    echo($break);

    // COMPARISON OPERATION
    $c = 5;
    $d = 3;

    var_dump($c == $d);
    echo($break);
    var_dump($c > $d);
    echo($break);
    var_dump($d < $c);
    echo($break);
    var_dump($d <= $c);
    echo($break);
    var_dump($c >= $d);
    echo($break);

    // == COMPARE THE DATA VALUES
    var_dump("3" == $d);
    echo($break);
    // === COMPARE THE DATA VALUES AND DATA TYPE
    var_dump("3" === $d);
    echo($break);

    // LOGICAL OPERATIONS
    $true = true;
    $false = false;

    // AND && -- BOTH CONDITIONS MUST BE TRUE
    var_dump($true and $false);
    echo($break);
    var_dump($false and $true);
    echo($break);
    var_dump($true and $true);
    echo($break);

    // OR || -- ATLEAST ONE MUST BE TRUE
    var_dump($true or $false);
    echo($break);
    var_dump($false or $true);
    echo($break);
    var_dump($true or $true);
    echo($break);
    var_dump($false or $false);
    echo($break);

    // NOT ! -- GIVE INVERSE OF THE RESULT
    var_dump(!$true);
    echo($break);
    var_dump(!$false);
    echo($break);
    var_dump(!null);
    echo($break);

    // ASSIGNMENT OPERATORS
    $ass = 5;
    echo($ass += 2);
    echo($break);
    echo($ass);
    echo($break);
    echo($ass -= 2);
    echo($break);
    echo($ass *= 3);
    echo($break);
    echo($ass /= 2);
    echo($break);


    // ASSIGNMENT: CHECK OUT MORE OPERATIONS ON ARRAYS AND STRINGS

?>