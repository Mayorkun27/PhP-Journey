<?php
    include "connect.php";

    if(isset($_POST["submit"])) {

        $name = $_POST["name"];
        $email = $_POST["email"];
        $perm_file = $_FILES["image"]["name"];
        $tmp_file = $_FILES["image"]["tmp_name"];

        if (empty($name) && empty($email) && empty($perm_file)) {
            echo "All fields are required";
        } else {
            $find = mysqli_query($conn, "SELECT * FROM `attendee` WHERE `email` = '$email'");
            $result = mysqli_num_rows($find);
            if ($result > 0) {
                echo "This Email has already RSVP'd!";
            } else {
                $insert = mysqli_query($conn, "INSERT INTO `attendee`(`name`, `email`, `image`) VALUES ('$name','$email','$perm_file')");
                move_uploaded_file($tmp_file, "uploads/$perm_file");
                echo "Thanks for RSVP'ing for Tech to Cash, See you there!";
            };
        };
    };
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hall of Fame</title>
    <style>
        .form{
            padding: 2rem;
            padding-top: 5px;
            box-shadow: 5px 5px 10px #eee,
            -5px -5px 10px #eee;
            width: 40%;
            margin: 3rem auto;
            form{
                display: flex;
                flex-direction: column;
                gap: 1rem;
            }
            input{
                border: 2px solid #eee;
                outline: none;
                text-indent: 10px;
                height: 50px;
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
        <h2>Attendee</h2>
        <form action="" method="POST" enctype="multipart/form-data">
            <input type="text" name="name" id="name" placeholder="Input Your Name">
            <input type="email" name="email" id="email" placeholder="Input Your email">
            <input type="file" name="image" id="image">
            <button type="submit" class="btn" name="submit">Submit</button>
        </form>
    </div>

</body>
</html>