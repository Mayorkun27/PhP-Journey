<?php

    $break = "<br>";

    if (empty($_POST["fName"])) {
        header("location: startafreshday10assignment.php?msg1=Please input your First Name");  
    } elseif (empty($_POST["lName"])) {
        header("location: startafreshday10assignment.php?msg2=Please input your Last Name");   
    } elseif (empty($_POST["uName"])) {
        header("location: startafreshday10assignment.php?msg3=Please input your User Name");   
    } elseif (empty($_POST["gender"])) {
        header("location: startafreshday10assignment.php?msg4=Please input your Gender");  
    } elseif (empty($_POST["password"])) {
        header("location: startafreshday10assignment.php?msg5=Please input your Password");  
    } elseif (empty($_POST["confPassword"])) {
        header("location: startafreshday10assignment.php?msg6=Please confirm your password");  
    } elseif ($_POST["password"] !== $_POST["confPassword"]) {
        header("location: startafreshday10assignment.php?msg6=Passwords do not match, Please check and try again");  
    } else {
        print_r($_POST);
        foreach ($_POST as $key => $value) {
            echo "The ".$key." is ".$value.$break;
        };
    };

?>