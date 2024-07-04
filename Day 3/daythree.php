<?php
$name = "Favour";
    if ($name === "Favour") {
        echo "Your name is valid <br>";
    } else {
        print("No name detected <br>");
    };

    echo($name === "Favour" ? "True <br>" : "FALSE <br>");
    $age = 193;
    $ans = $age == 193 ? "Age detected and 193 <br>" : "No Age <br>";
    echo $ans;

    $class = "JS1";
    switch ($class) {
        case 'Js1':
            echo "You are in Js1 <br>";
            break;
        default:
            echo "You are in JS1 <br>";
            break;
    };

    switch ($name) {
        case 'Favour':
            echo "Your name is Valid <br>";
            break;
        default:
            echo "Your name is Invalid <br>";
            break;
    };

    switch ($age) {
        case $age > 100:
            echo "You are above 100 <br>";
            break;
        default:
            echo "You are below 100 <br>";
            break;
    }


    // Functions
    // Function are lines of codes that are used to perform secific tasks

    // function work(){
    //     $num1 = 16;
    //     $num1 = $num1**2;
    //     echo $num1;
    // };
    // work();
    function work($num1){
        $num1 = $num1**2;
        echo $num1;
    };
    work(5);
    echo"<br>";
    work(10);
    echo"<br>";
    work(15);
    echo"<br>";
    work(20);
    echo"<br>";

    // Write a function to check if a number is even or odd
    function evenOrOddChecker($num2){
        $result = $num2 / 2;
        if (is_float($result)) {
            echo "Number is odd";
        } else{
            echo "Number is even";
        };
    }
    evenOrOddChecker(10);
    echo"<br>";
    // Write a function to check if a number is a prime number
    function primeNumChecker1($num3) {
        for ($i=2; $i <  $num3; $i++) {
            // echo "The number is ".$num3."<br>";
            // echo "The divider is ".$i."<br>";
            // echo "The result after division ".$num3 / $i."<br>";
            $result = $num3 / $i;
            if ($num3 / $num3 === 1 && $num3 / 1 === $num3 && is_float($result) && $result !== $num3) {
                echo $num3." is not a prime number because it is not divisible by".$i."<br>";
            } else if (is_int($result) && $result === $num3) {
                echo $num3." is not a prime number <br>";
            }
        }
    };
    primeNumChecker1(9);


function isPrime($number) {
    // 1 and 0 are not prime numbers
    if ($number <= 1) {
        return false;
    }

    // 2 and 3 are prime numbers
    if ($number <= 3) {
        return true;
    }
    
    // Check if the number is divisible by 2 or 3
    if ($number % 2 == 0 || $number % 3 == 0) {
        return false;
    }
    
    // Check divisibility by numbers of the form 6k ± 1, up to sqrt(n)
    $sqrtNum = floor(sqrt($number));
    for ($i = 5; $i <= $sqrtNum; $i += 6) {
        if ($number % $i == 0 || $number % ($i + 2) == 0) {
            return false;
        }
    }
    
    return true;
}

// Test the function
$number = 25;
if (isPrime($number)) {
    echo "$number is a prime number";
} else {
    echo "$number is not a prime number";
}
?>


