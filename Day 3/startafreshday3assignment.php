<?php
    // ASSIGNMENT: CHECK OUT MORE OPERATIONS ON ARRAYS AND STRINGS

    $break = "<br>";
    // ON ARRAY
    $anArray = array("Dog", "Cat", "Rat", "Goat");
    var_dump($anArray);
    echo($break);
    var_dump(array_change_key_case($anArray, CASE_LOWER));
    echo($break);
    var_dump(array_change_key_case($anArray, CASE_UPPER));
    echo($break);
    $add = $anArray[0]."Bull";
    echo($add);
    echo($break);
    $anArray[2] = "Bull";
    var_dump($anArray);
    echo($break);

    print_r(array_chunk($anArray, 3));
    echo($break);

    $a = "rat";
    $b = "ram";
    var_dump(array_push($anArray, $a));
    echo($break);
    var_dump(array_unshift($anArray, $b));
    echo($break);
    print_r(array_count_values($anArray));
    echo($break);
    var_dump(array_fill(0, 2, $a));
    echo($break);
    var_dump($anArray);
    echo($break);
    var_dump(array_pop($anArray));
    echo($break);
    var_dump(array_shift($anArray));
    echo($break);
    var_dump($anArray);

?>