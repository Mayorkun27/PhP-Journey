<?php
    include "connect.php";

    session_start();

    if (isset($_POST["submit"])) {
        $email = $_POST["email"];
        $password = $_POST["password"];

        if (empty($email) && empty($password)) {
            echo "All Inputs are required";
        } else {

            $select_password_from_email = mysqli_query($conn, "SELECT `password` FROM `with_c_r_u_d` WHERE `email` = '$email'");
            
            $select_password_from_email_in_row = mysqli_num_rows($select_password_from_email);

            if ($select_password_from_email_in_row == 1) {
                $row = mysqli_fetch_assoc($select_password_from_email);
                $hashed_password = $row["password"];

                $compared_password = password_verify($password, $hashed_password);

                if ($compared_password) {
                    $user = mysqli_fetch_assoc($select);
                    $_SESSION['email'] = $user['email'];
                    $_SESSION['password'] = $user['password'];
        
                    header("location: read.php");
                }
            }
            // if ($email_and_password_result > 0) {
                
            //     $user = mysqli_fetch_assoc($select);
            //     $_SESSION['email'] = $user['email'];
            //     $_SESSION['password'] = $user['password'];
    
            //     header("location: read.php");
            // } else {

            //     echo "Invalid credentials";
            // };
            
        }
    }
    
?>




<!-- 6ZVNM77X22 -->