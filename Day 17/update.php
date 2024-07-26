<?php
    include "connect.php";

    session_start();

    $sessionEmail = $_SESSION['email'];

    $select = mysqli_query($conn, "SELECT * FROM `with_c_r_u_d` WHERE `email` = '$sessionEmail'");
    $details = mysqli_fetch_assoc($select);

    if (isset($_POST["submit"])) {
        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $password = $_POST["password"];
        $perm_file = $_FILES["file"]["name"];
        $tmp_file = $_FILES["file"]["tmp_name"];

        if (empty($email) && empty($password)) {
            echo "All Inputs are required";
        } else {
            $update = mysqli_query($conn, "UPDATE `with_c_r_u_d` SET ``fname`='$fname',`lname`='$lname',`image`='$perm_file',`password`='$password'");
            move_uploaded_file($tmp_file, "uploads/$perm_file");

            header("location: read.php?msg='Details updated successfully'");
        }
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
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
        <h2>Update Details</h2>
        <form action="" method="POST" enctype="multipart/form-data">
            <input type="text" name="fname" id="fname" value="<?php echo $details['fname']?>">
            <input type="text" name="lname" id="lname" value="<?php echo $details['lname']?>">
            <input type="file" name="file" id="file">
            <input type="password" name="password" id="password" value="<?php echo $details['password']?>">

            <button type="submit" class="btn" name="submit">Update</button>
        </form>
    </div>

</body>
</html>