<?php

    if (empty($_POST["email"]) && isset($_POST["password"])) {
        header("location: startafreshday9assignment.php?msg1=Please input your Email");  
    } elseif (empty($_POST["password"]) && isset($_POST["email"])) {
        header("location: startafreshday9assignment.php?msg2=Please input your Password");  
    } elseif (empty($_POST["email"]) && empty($_POST["password"])) {
        header("location: startafreshday9assignment.php?msg3=All fields are required");  
    } else {
        print_r($_POST);
    };

?>