<?php

    $break = "<br>";
    // Collect details from startafreshday8assignment and check if each input is filled
    $fname = $_POST['firstName'];
    $lname = $_POST['lastNname'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    
    if (empty($fname && $lname && $email && $message)) {
        header("location: startafreshday8assignment.php");
    } else {
        // print_r($_POST);
        foreach ($_POST as $key => $value) {
            echo $key." is ".$value.$break;
        };
    };

?>