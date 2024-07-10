<?php

    // if (empty($_POST["email"])) {
    //   header("location: startafreshday8.php");  
    // } elseif (empty($_POST["password"])) {
    //     header("location: startafreshday8.php");  
    // } else {
    //     print_r($_POST);
    // };


    if (empty($_POST["email"] && $_POST[ "password"])) {
      header("location: startafreshday8.php");  
    } else {
        print_r($_POST);
    };
?>=