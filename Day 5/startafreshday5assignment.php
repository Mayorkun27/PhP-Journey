<?php
    $break = "<br>";
    // Assignment--- Nested if statement

    $x = 10;
    $y = 12;

    if ($x === "10") {
        echo "I checked X, it is true.....Proceeding to check Y".$break;
        if ($y < 13) {
            echo "I checked X first before checking Y".$break;
        };
    } else { 
        echo "X wasn't true so I didn't bother checking Y".$break;
    };

    // 2. Use for each loop with associative array

    $array = array(
        "fName" => "Adeleke",
        "sName" => "Favour",
        "stack" => "Frontend",
    );

    // Using forEach to print the value of each key
    foreach ($array as $value) {
        echo $value.$break;
    };

    // Using forEach to print the key of each value
    foreach ($array as $value => $key) {
        echo $value.$break;
    };
    
    // Using forEach to print both key and value
    foreach ($array as $key => $value) {
        echo $key." is ".$value.$break;
    }
?>