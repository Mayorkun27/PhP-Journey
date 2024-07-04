<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    // echo "My first PHP Script";
    // echo ("My first PHP Script");
    // if (5 < 7) {
    //     echo "True";
    // }
    $num = 20;
    $num2 = 19;
    $num3 = 29;
    // if ($num == 20) {
    //     echo "num is equal to 20";
    // }
    // if ($num == "20") {
    //     echo "num is equal to 20 but differnt data type";
    // }
    // if ($num <> "2") { //<> means not equal to
    //     echo "num is not equal to 2";
    // }
    // if ($num === "20") {
    //     echo "num is equal to 20 but differnt data type";
    // } else {
    //     echo "False";
    // }
    // if ($num > $num2 and $num3 > $num) {
    //     print("Both is condition");
    // }
    // if ($num3 === "29" || $num2 < $num) {
    //     echo "One is true here";
    // }
    // if ($num > $num2 Xor $num3 > $num2) { //Xor will only work if one is true not both
    //    echo "One is True";
    // }

    // $t = date("H");
    // echo $t;
    // var_dump($t);

    // if ($t < "20") {
    // echo "Have a good day!";
    // } else {
    // echo "Have a good night!";
    // }

    // if ($num < $num3) {
    //     echo "29 is greather than 20";
    // } elseif ($num2 == 19) { //In php it is "elseif" and not "else if" as in js
    //     echo "That is true";
    // } else {
    //     echo "All not true";
    // }

    $a = 5;

    // if ($a < 10) $b = "Hello";

    // echo $b
    if ($a == 5) echo "Hello "; //writing if tenary statement

    $a = 13;
    $b = $a < 10 ? "Hello " : "GoodBye "; // Writing if else tenary statement with php, save the statement in a variable and echo that variable to view output
    echo $b;

    $a = 13;

    if ($a > 10) {
    echo "Above 10";
        if ($a > 20) {
            echo " and also above 20";
        } else {
            echo " but not above 20 ";
        }
    };

    echo strlen("Hello world");
    echo str_word_count("Hello world");
    echo strrev(" Hello world ");
    echo strpos("Hello world", "world");
    echo str_replace("Dolly", "World", "Hello Dolly");
   

    // Declaring a constant
    // define(name, value, case-insensitive) 
    // name: Specifies the name of the constant
    // value: Specifies the value of the constant
    // case-insensitive: Specifies whether the constant name should be case-insensitive. Default is false **and is no longer supported 
    
    define("constGreeting", " Hello world, This how to create a constant variable with php");
    echo constGreeting;

    $cars = array("Volvo","BMW","Toyota");
    var_dump($cars);

    $favcolor = "red";

    switch ($favcolor) {
        case "red":
            echo "<br> Your favorite color is red!";
            break;
        case "blue":
            echo "Your favorite color is blue!";
            break;
        case "green":
            echo "Your favorite color is green!";
            break;
        default:
            echo "Your favorite color is neither red, blue, nor green!";
    }

    // While loop
    $x = 1;

    while($x <= 5) {
        echo "The number is: $x <br>";
        $x++;
    }

    // Do while loop
    $x = 1;

    do {
        echo "The number is: $x <br>";
        $x++;
    } while ($x <= 5);


    // Example 2

    $x = 6;

    do {
        echo "The number is: $x <br>";
        $x++;
    } while ($x <= 5);

    // for loop
    for ($x = 0; $x <= 10; $x++) {
    echo "The number is: $x <br>";
    }

    // for each loop
    $colors = array("red", "green", "blue", "yellow");

foreach ($colors as $value) {
    echo "$value <br>";
}
    ?>
</body>
</html>