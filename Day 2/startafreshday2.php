<?php 
    $break = "<br>";

    $num = 30; //integers
    var_dump($num);
    echo($break);

    $num2 = 56.4; //float
    var_dump($num2);
    echo($break);

    $bool = true;
    var_dump($bool);
    echo($break);

    $name = "Matthew";
    var_dump($name);
    echo($break);

    // INDEXED ARRAY
    $array = array("Matthew", "Ibirogba", "Ayomide", "Ruqoyyah");
    // $echo($array);
    var_dump($array);
    echo($break);
    print_r($array);
    echo($break);

    $matthew = array("Matthew", "Computer Science", "Engaged", 20210000001, "Male", 27, 400, 4.96);
    var_dump($matthew);
    echo($break);
    print_r($matthew[0]);
    echo($break);
    print_r($matthew[1]);
    echo($break);
    print_r($matthew[2]);
    echo($break);
    print_r($matthew[3]);
    echo($break);

    // MULTIDIMENSIONAL ARRAY
    $list = array(
        array("Matthew", "Computer Science", "In A Relationship"),
        array("Roseline", "Computer Science", "In a Relationship"),
        array("Sunday", "Agricultural Science", "Complicated"),
        array("Quadri", "Graduate", "Searching"),
        array("Esther", "Computer Science", "Complicated"),
        array("Emmanuel", "Fine Arts", "Rev'd Father"),
        array("Olasunkanmi", "Computer Science", "Happily Engaged")
    );

    var_dump($list);
    echo($break);
    print_r($list[6]);
    echo($break);
    print_r($list[3][2]);

    $student = array(
        array("Matthew", 202100001, array(4.75, 4.70)),
        array("Favour", 2023000886, array(4.96, 5.00)),
        array("Roseline", 203764, array(0.95, 1.20)),
        array("Sunday", 2021004334, array("AR", "ADVISED TO WITHDRAW")),
        array("Prosper", 19002, array(1.50, 3.70))
    );

    echo($break);
    print_r($student);
    echo("THis");
    echo($break);
    print_r($student[2][2][0]);

    // ASSOCIATIVE ARRAY
    $profile = array(
        "Name" => "Roseline",
        "Department" => "Computer Science",
        "Matric Number" => 203764,
        "Marital Status" => "Dating",
        "Level" => 400,
        "CGPA" => 1.20
    );

    echo($break);
    print_r($profile);
    echo($break);
    print_r($profile["CGPA"]);
    echo($break);
    print_r($profile["Marital Status"]);

    // CREATE AN ARRAY TELL US ABOUT SOMEONE YOU DON"T KNOW OR KNOW
    


?>