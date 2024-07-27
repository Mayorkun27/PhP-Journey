<?php

    include "connect.php";

    if (isset($_POST["register"])) {
        
        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $perm_file = $_FILES["image"]["name"];
        $tmp_file = $_FILES["image"]["tmp_name"];
        $mnum = $_POST["mnum"];
        $email = $_POST["email"];
        $lvl = $_POST["lvl"];
        $dob = $_POST["dob"];
        $password = $_POST["password"];
        $cpassword = $_POST["cpassword"];

        if (empty($fname) && empty($lname) && empty($perm_file) && empty($mnum) && empty($email) && empty($lvl) && empty($dob) && empty($password) && empty($cpassword)) {
            echo "All Inputs are required";
        } else {

            $select = mysqli_query($conn, "SELECT * FROM `students` WHERE `email` = '$email' OR `mnum` = '$mnum'");
            $result = mysqli_num_rows($select);

            // if ($password !== $cpassword) {
            //     echo "Password don't match, Please try again";
            // } else
            if ($result > 0) {
                echo "Email or Matric Number Already Exists!";
            } else {
                $insert = mysqli_query($conn, "INSERT INTO `students`(`fname`, `lname`, `mnum`, `email`, `file`, `lvl`, `dob`, `password`) VALUES ('$fname','$lname','$mnum','$email','$perm_file','$lvl','$dob','$password')");
                move_uploaded_file($tmp_file, "uploads/$perm_file");
                echo "Account Registration Successful.";
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
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: sans-serif;
            overflow-x: hidden;
        }
        body{
            background: #000;
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
            box-shadow: 5px 5px 0px #2b2b2b;
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
                <legend>Welcome To A School</legend>
                <p>Education at it's peak of excellence. Signup and begin learning now.</p>
            </fieldset>
            <label for="fname">First Name</label>
            <input type="text" name="fname" id="fname" class="form-control">
            <label for="lname">Last Name</label>
            <input type="text" name="lname" id="lname" class="form-control">
            <label for="image">Display Picture</label>
            <input type="file" name="image" id="image" class="form-control">
            <label for="mnum">Matric Number</label>
            <input type="text" name="mnum" id="mnum" class="form-control">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control">
            <label for="lvl">Level</label>
            <input type="number" name="lvl" id="lvl" class="form-control">
            <label for="dob">Date Of Birth</label>
            <input type="date" name="dob" id="dob" class="form-control">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control">
            <label for="cpassword">Confirm Password</label>
            <input type="password" name="cpassword" id="cpassword" class="form-control">
            <div style="text-align: center;">
                <button class="btn" type="submit" name="register">Register</button>
            </div>
        </form>
    </div>

</body>
</html>