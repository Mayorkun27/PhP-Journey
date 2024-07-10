<?php

    $break = "<br>";
    $x = 5;
    $y = 3;

    // TYPES OF PHP SUPERGLOBAL VARIABLES
    // i. $GLOBALS
    // ii. $_SERVER
    // iii. $_REQUEST
    // iv. $_POST
    // v. $_GET
    // vi. $_FILES
    // vii. $_ENV
    // viii. $_COOKIE
    // ix. $_SESSION


    // Global variables are variables that can be accessed from any scope.

    // Variables of the outer most scope are automatically global variables, and can be used by any scope, e.g. inside a function.

    // To use a global variable inside a function you have to either define them as global with the global keyword, or refer to them by using the $GLOBALS syntax
    function multiNumbers() {
        $GLOBALS["z"] = $GLOBALS["x"] + $GLOBALS["y"];
    };

    multiNumbers();
    echo($z);

    function sumNum() {
        $GLOBALS["sum"] = 5 + 3;
    };

    sumNum();
    echo($sum);

    echo $break;

    // $_SERVER is a PHP super global variable which holds information about headers, paths, and script locations.
    echo $_SERVER["PHP_SELF"];
    echo $break;
    echo $_SERVER["SERVER_NAME"];
    echo $break;
    echo $_SERVER["HTTP_HOST"];
    echo $break;
    echo $_SERVER["HTTP_USER_AGENT"];
    echo $break;
    echo $_SERVER["SCRIPT_NAME"];
    echo $break;
?>