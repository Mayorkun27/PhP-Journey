<?php

    // if (empty($_POST["email"])) {
    //   header("location: startafreshday9.php");  
    // } elseif (empty($_POST["password"])) {
    //     header("location: startafreshday9.php");  
    // } else {
    //     print_r($_POST);
    // };


    if (empty($_POST["email"] && $_POST[ "password"])) {
      header("location: startafreshday9.php?msg=All fields are required");  
    } else {
        print_r($_POST);
    };
?>