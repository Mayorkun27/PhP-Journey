<?php
    
    include "connect.php";

    session_start();

    if (isset($_POST["login"])) {
        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $password = $_POST["password"];

        if (empty($fname) && empty($password)) {
            echo "All Fields are required";
        } else {
            $select = mysqli_query($conn, "SELECT * FROM `lecturer_details` WHERE `fname` = '$fname' AND `password` = '$password'");
            $search_for_it = mysqli_num_rows($select);

            if ($search_for_it) {

                $user = mysqli_fetch_assoc($select);

                $_SESSION['fname'] = $user['fname'];
                $_SESSION['password'] = $user['password'];

                echo "Login Successful";
                header("location: lecturer.php");
            } else {
                echo "Invalid Credentials, Please check and try again!.";
            }
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
            *{
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                font-family: sans-serif;
                overflow-x: hidden;
            }
            body{
                /* background: #000; */
            }
            .general{
                margin: 2rem auto;
                width: 100vw;
                height: max-content;
                display: flex;
                justify-content: center;
                align-items: center;
            }
            form{
                width: 50%;
                background: #ffffffe0;
                padding: 2rem;
                border-radius: 1rem;
                text-align: start;
                fieldset{
                    border-color: red;
                    padding: 1rem;
                    margin-bottom: 2rem;
                }
                legend{
                    font-size: 2rem;
                    font-weight: 900;
                }
                .form-control{
                    width: 100%;
                    height: 40px;
                    outline: none;
                    text-indent: 10px;
                    margin-bottom: 1rem;
                }
                .btn{
                    width: 25%;
                    background: #000;
                    color: #fff;
                    border-radius: .5rem;
                    height: 40px;
                    border: 2px solid #2b2b2b;
                    text-align: center;
                    margin: 20px auto !important;
                }
            }
        </style>
    </head>
<body>
    
    <div class="general">
        <form action="" method="post" enctype="multipart/form-data">
            <fieldset>
                <legend>Welcome Back</legend>
                <p>Login to access your dashboard.</p>
            </fieldset>
            <label for="fname">First Name</label>
            <input type="text" name="fname" id="fname" class="form-control">
            <label for="lname">Last Name</label>
            <input type="text" name="lname" id="lname" class="form-control">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control">
            <div style="text-align: center;">
                <button class="btn" type="submit" name="login">Login</button>
            </div>
        </form>
    </div>

</body>
</html>