<?php
    // Linking connect.php
    include "connectday12.php";


    // To check if the submit button is clicked
    if (isset($_POST["submit"])) {

        // Save all values collected into variables
        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $email = $_POST["email"];
        $perm_file = $_FILES["file"]["name"];
        $tmp_file = $_FILES["file"]["tmp_name"];
        

        if (empty($fname) && empty($lname) && empty($email) && empty($perm_file)) {
            // Echo error if all values are not filled
            echo("All fields are required!.");
        }else {
            $select = mysqli_query($conn, "SELECT * FROM `day_12` WHERE `email` = '$email'");
            $result = mysqli_num_rows($select);
            if ($result > 0) {
                echo "Email already Exists!.";
            }else {
                // Save data into the database
                $insert = mysqli_query($conn, "INSERT INTO `day_12`(`fname`, `lname`, `email`, `file`) VALUES ('$fname','$lname','$email','$perm_file')");
                move_uploaded_file($tmp_file, "Uploads/$perm_file");
                echo "User created successfully";
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
        <h2>Unique Email</h2>
        <form action="" method="POST" enctype="multipart/form-data">
            <input type="text" name="fname" id="fname" placeholder="Input your First Name">
            <input type="text" name="lname" id="lname" placeholder="Input your Last Name">
            <input type="email" name="email" id="email" placeholder="Input your Email">
            <input type="file" name="file" id="file">

            <button type="submit" class="btn" name="submit">Submit</button>
        </form>
    </div>
    


</body>
</html>