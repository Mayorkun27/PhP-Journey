<?php

// Continuation on controlled structure

    $break = "<br>";

    // Conditional statement
    $good = 30;
    if ($good < 30) { 
        echo("Good id less than 30");
    } elseif ($good == 30) {
        echo("Good is equal to 30");
    } else {
        echo("Good is greater than 30");
    };
    echo($break);
    // echo($break);


    // Loop
    // Types are: For, while, do-while, for-each loop

    echo("<h3>FOR LOOP</h3>");
    echo("<h5>INCREMENTING WITH FOR LOOP</h5>");
    for ($val= 0; $val <= 15; $val++) { 
        echo("The value of val is ".$val.$break);
    };
    echo($break);
    echo("<h5 style='margin: 0px;'>DECREMENTING WITH FOR LOOP</h5>");
    for ($val= 15; $val >= 0; $val--) { 
        echo("The value of val is ".$val.$break);
    };


    $val2 = 12;
    echo("<h3>WHILE LOOP</h3>");
    echo("<h5 style='margin: 0px;'>INCREMENTING WITH WHILE LOOP</h5>");
    while ($val2 < 15) {
        echo($val2.$break);
        $val2++;
    }

    echo("<h5 style='margin: 0px;'>DECREMENTING WITH WHILE LOOP</h5>");
    $val2 = 15;
    while ($val2 > 12) {
        echo($val2.$break);
        $val2--;
    }

    echo("<h3>DO WHILE LOOP</h3>");
    $val3 = 2;
    do {
        echo($val3.$break);
        $val3++;
    } while ($val3 <= 10);

    echo("<h3>FOR EACH LOOP</h3>");
    $array = array("Mango", "Banana", "Cherry", "Avocado", "Grape", "Pear");
    foreach ($array as $val4) {
       echo($val4.$break);
    }


    // Assignment--- Nested if statement 2.2Use for each loop with associative array
?>