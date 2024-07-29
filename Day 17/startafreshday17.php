<?php
    // Linking connect.php
    include "connect.php";


    // To check if the submit button is clicked
    if (isset($_POST["submit"])) {

        // Save all values collected into variables
        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $uname = $_POST["uname"];
        $email = $_POST["email"];
        $perm_file = $_FILES["file"]["name"];
        $tmp_file = $_FILES["file"]["tmp_name"];
        $password = $_POST["password"];
        $cpassword = $_POST["cpassword"];
        

        if (empty($fname) && empty($lname) && empty($uname) && empty($email) && empty($perm_file) && empty($password) && empty($cpassword)) {
            // Echo error if all values are not filled
            echo("All fields are required!.");
        } else {
            $select = mysqli_query($conn, "SELECT * FROM `with_c_r_u_d` WHERE `email` = '$email'");
            $result = mysqli_num_rows($select);

            
            if ($password !== $cpassword) {
                echo "Passwords do not match, Please check and try again";
            }elseif ($result > 0) {
                echo "Email already Exists!.";
            } else {
                // Hash password for better security
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                // Save data into the database
                // $insert = mysqli_query($conn, "INSERT INTO `with_c_r_u_d`(`fname`, `lname`, `uname`, `email`, `image`, `password`) VALUES ('$fname','$lname','$uname','$email','$perm_file','$hashed_password')");
                $insert = mysqli_query($conn, "INSERT INTO `with_c_r_u_d`(`fname`, `lname`, `uname`, `email`, `image`, `password`) VALUES ('$fname','$lname','$uname','$email','$perm_file','$password')");
                move_uploaded_file($tmp_file, "uploads/$perm_file");
                echo "User created successfully";

                header("location: login.php");
            };
        };
    };

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .form{
            padding: 2rem;
            padding-top: 5px;
            box-shadow: 5px 5px 10px #eee,
            -5px -5px 10px #eee;
            width: 40%;
            margin: 2rem auto;
            form{
                display: flex;
                flex-direction: column;
                gap: 1rem;

            }
            input{
                height: 30px;
            }
            h2{
                font-weight: 900;
                font-family: sans-serif;
                font-size: 2.5rem;
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
        <h2>Create new Account</h2>
        <form action="" method="POST" enctype="multipart/form-data">
            <input type="text" name="fname" id="fname" placeholder="Input your First Name">
            <input type="text" name="lname" id="lname" placeholder="Input your Last Name">
            <input type="text" name="uname" id="uname" placeholder="Input your User Name">
            <input type="email" name="email" id="email" placeholder="Input your Email Address">
            <input type="file" name="file" id="file">
            <input type="password" name="password" id="password" placeholder="Input your Password">
            <input type="password" name="cpassword" id="cpassword" placeholder="Confirm your Password">

            <button type="submit" class="btn" name="submit">Create Account</button>
        </form>
    </div>
    


</body>
</html>