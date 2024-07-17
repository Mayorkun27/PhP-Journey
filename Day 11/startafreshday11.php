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
        $password = $_POST["password"];
        $cpassword = $_POST["cpassword"];
        

        if (empty($fname) && empty($lname) && empty($uname) && empty($email) && empty($password) && empty($cpassword)) {
            // Echo error if all values are not filled
            echo("All fields are required!.");
        } else {
            $select = mysqli_query($conn, "SELECT * FROM `day_12` WHERE `email` = '$email'");
            $result = mysqli_num_rows($select);
            if ($password !== $cpassword) {
                echo "Passwords do not match, Please check and try again";
            }elseif ($result > 0) {
                echo "Email already Exists!.";
            } else {
                // Save data into the database
                $insert = mysqli_query($conn, "INSERT INTO `customer_details`(`fname`, `lname`, `uname`, `email`, `password`, `cpassword`) VALUES ('$fname','$lname','$uname','$email','$password','$cpassword')");
                echo "User created successfully";
            };
        };
    };


    // assignment
    // If password and confirmation don't match, output error
    
    // Full name, age, gender, country;
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
        <h2>Signup</h2>
        <form action="" method="POST">
            <input type="text" name="fname" id="fname" placeholder="Input your First Name">
            <input type="text" name="lname" id="lname" placeholder="Input your Last Name">
            <input type="text" name="uname" id="uname" placeholder="Input your User Name">
            <input type="email" name="email" id="email" placeholder="Input your Email Address">
            <input type="password" name="password" id="password" placeholder="Input your Password">
            <input type="password" name="cpassword" id="cpassword" placeholder="Confirm your Password">

            <button type="submit" class="btn" name="submit">Submit</button>
        </form>
    </div>
    


</body>
</html>