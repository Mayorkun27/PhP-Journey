<?php 
    $break = "<br>";
    $name = "Roheemah";
    $name2 = "Adegoke";
    echo($name);
    echo($break);
    echo(2 + 3);
    echo($break);
    $sum = 5 + 10;
    echo($sum);
    echo($break);
    var_dump($sum);
    echo($break);
    print($sum);
    echo($break);
    print_r($sum);
    echo($break);
    $age = 87.2;
    echo($age);
    echo($break);
    echo(strlen($name));
    echo($break);
    echo(str_word_count($name));
    echo($break);
    echo(strpos($name, "Roheemah"));
    echo($break);
    $name3 = $name . " " . $name2;
    echo($name3);

    // DATA TYPES
    // Strings, Integer, Boolean, Float, Array
    // FIVE FUNCTIONS ThAT CAN BE PERFORMED WITH STRING
    echo($break);
    echo(str_repeat($name, 3));
    echo($break);
    echo(str_replace("Adegoke", "Adeleke", $name3));
    echo($break);
    echo(strtoupper($name3));
    echo($break);
    echo(strtolower($name3));
    echo($break);
    echo(strrev($name3));
    echo($break);
?>