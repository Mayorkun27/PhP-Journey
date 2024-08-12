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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        .form{
            padding: 2rem;
            padding-top: 5px;
            box-shadow: 5px 5px 10px #eee,
            -5px -5px 10px #eee;
            width: 40%;
            margin: 4rem auto;
            form{
                display: flex;
                flex-direction: column;
                gap: 1rem;
            }
            input{
                border: 1px solid #000;
                outline: none;
                text-indent: 10px;
                height: 40px;
                box-shadow: 5px 5px 5px #eee;
            }
            textarea{
                resize: none;
            }
            h2{
                font-weight: 900;
                font-family: sans-serif;
                font-size: 3rem;
            }
            button{
                width: 25%;
                margin: 0 auto;
                background: #000;
                color: #fff;
                height: 40px;
                border: none;
                border-radius: 5px;
            }
        }
    </style>
</head>
<body>
    
    <div class="form">
        <h2>Login</h2>
        <form action="" method="POST" enctype="multipart/form-data">
            <input type="email" name="email" id="email" placeholder="Enter Your Email">
            <input type="password" name="password" id="password" placeholder="Enter Your Password">
            <button type="submit" class="btn" name="submit">Submit</button>
        </form>
    </div>

</body>
</html>




<!-- 6ZVNM77X22 -->