<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    // Arrays
    // Types 1-Multidimensional ie are arrays that contains arrays in them , 2-Associative ie are arrays with objects inside of them, 3-Indexed are normal array

    $anArray = array("Favour", "Age");
    // print_r($anArray."<br>");
    print_r($anArray[0]);
    echo"<br>";
    print($anArray[1]);
    echo"<br>";
    var_dump($anArray[1]);
    echo"<br>";

    // Loop
    for ($i=0; $i < count($anArray); $i++) { 
        print_r($anArray[$i]);
        echo"<br>";
    };

    $secArray = array();
    for ($i=0; $i < 10; $i++) { 
        print_r(array_push($secArray, $i));
        echo"<br>";
    }
    print_r(array_pop($secArray));
    print_r($secArray);
    echo"<br>";

    $car = array(
        "brand"=>"Ford", 
        "model"=>"Mustang",
        "year"=>1964
    );
    print($car["model"]);
    echo"<br>";
    print($car["brand"]);
    echo"<br>";
    print($car["year"]);
    echo"<br>";

    $car["year"] = 2024;
    print_r($car);
    echo"<br>";
    print_r(array_pop($car));
    echo"<br>";
    print_r($car);
    echo"<br>";
    print_r(array_shift($car));
    echo"<br>";
    print_r($car);


    // MUltidimensional arrays
    $newCar = array (
        array("Volvo",22,18),
        array("BMW",15,13),
        array("Saab",5,2),
        array("Land Rover",17,15)
      );
      echo("<br>");
      print_r($newCar);
      echo("<br>");
      print_r($newCar[0]);
      echo("<br>");
      print_r($newCar[0][1]);
      echo("<br>");
      print_r($newCar[3][2]);
      echo("<br>");

      $newCars = array (
        array("Volvo", array("Ford",10,9)),
        array("BMW",15,13),
        array("Saab",5,2),
        array("Land Rover",17,15)
      );
      print_r($newCars[0][1][1]);
    
    // Check out more functions to perform with arrays 

    // Classwork
    // Changing the value of an array
    $changeValue = array("Volvo", "BMW", "Toyota");
    var_dump($changeValue);
    echo "<br>";
    $changeValue[1] = "Ford";
    var_dump($changeValue);
    echo "<br>";
    // Looping through array and printing all value with for each
    foreach ($changeValue as $x) {
        echo "$x <br>";
    }
    echo "<br>";
    // Changing the cases of the vaues of an array **Default is capitalized
    $age=array("Peter"=>"35","Ben"=>"37","Joe"=>"43");
    print_r($age);
    echo "<br>";
    print_r(array_change_key_case($age,CASE_UPPER));
    echo "<br>";
    print_r(array_change_key_case($age,CASE_LOWER));
    echo "<br>";
    // Spliting an array into chunks of two
    $cars2=array("Volvo","BMW","Toyota","Honda","Mercedes","Opel");
    print_r(array_chunk($cars2,2));
    echo "<br>";

    $cars2=array("Volvo","BMW","Toyota","Honda","Mercedes","Opel");
    print_r(array_chunk($cars2,2,true));
    echo "<br>";

    // Picking all values of an object key at once
    $a = array(
        array(
        'id' => 5698,
        'first_name' => 'Peter',
        'last_name' => 'Griffin',
        ),
        array(
        'id' => 4767,
        'first_name' => 'Ben',
        'last_name' => 'Smith',
        ),
        array(
        'id' => 3809,
        'first_name' => 'Joe',
        'last_name' => 'Doe',
        )
    );
  
    $last_names = array_column($a, 'id');
    print_r($last_names);
    echo "<br>";

    // Combining array values to form key and values i.e objects picking the value of first array as key and that of the second as value **They must have the same length to be able to combine
    $fname=array("Peter","Ben","Joe");
    $age=array("35","37","43");
    $c=array_combine($fname,$age);
    print_r($c);
    echo "<br>";

    // Counting the times a value occur in an array
    $a=array("A","Cat","Dog","A","Dog");
    print_r(array_count_values($a));
    echo "<br>";

    // Comparing two arrays value and telling their difference ie what is present in the first array but absent in others
    $a1=array("a"=>"red","b"=>"green","c"=>"blue","d"=>"yellow");
    $a2=array("e"=>"red","f"=>"green","g"=>"blue","i"=>"pink","j"=>"white");
    $result=array_diff($a1,$a2);
    print_r($result);
    echo "<br>";

    // Comparing two arrays key and value and telling their difference ie what is present in the first array but absent in others
    $a1=array("a"=>"red","b"=>"green","c"=>"blue","d"=>"yellow");
    $a2=array("a"=>"red","b"=>"green","c"=>"blue","d"=>"gray");
    $result=array_diff_assoc($a1,$a2);
    print_r($result);
    echo "<br>";

    // Comparing two arrays key and telling their difference ie what is present in the first array but absent in others
    $a1=array("a"=>"red","b"=>"green","c"=>"blue");
    $a2=array("a"=>"red","c"=>"blue","d"=>"pink");
    $result=array_diff_key($a1,$a2);
    print_r($result);
    echo "<br>";

    // Fill an array with values
    $a3=array_fill(0,4,"blue");//First value is number the index should start from, Second value is how many times the value should repeat, Third value is the value to be repeated
    print_r($a3);
    echo "<br>";

    // Fill an array with values while also specifying the keys
    $keys=array("a","b","c","d");
    $a1=array_fill_keys($keys,"blue");
    print_r($a1);
    echo "<br>";

    // Flip all keys with their associated values in an array ie make the values the keys and make the key become the value
    $a1=array("a"=>"red","b"=>"green","c"=>"blue","d"=>"yellow");
    $result=array_flip($a1);
    print_r($result);
    echo "<br>";

    // Checking for the common values in an array and printing them ie what is in the first array and also in the second   
    $a1=array("a"=>"red","b"=>"green","c"=>"blue","d"=>"yellow");
    $a2=array("e"=>"red","f"=>"green","g"=>"blue");
    $result=array_intersect($a1,$a2);
    print_r($result);
    ?>
</body>
</html>