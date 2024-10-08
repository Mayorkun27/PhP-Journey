<?php
    include "connect.php";

    if (isset($_POST["submit"])) {

        $name = $_POST["name"];
        $perm_file = $_FILES["image"]["name"];
        $tmp_file = $_FILES["image"]["tmp_name"];
        $description = $_POST["description"];

        if (empty($name) && empty($perm_file) && empty($description)) {
            echo "All Fields are required";
        } else {
            $insert = mysqli_query($conn, "INSERT INTO `hall_of_fame`(`name`, `image`, `post`) VALUES ('$name','$perm_file','$description')");
            move_uploaded_file($tmp_file, "uploads/$perm_file");
            echo "Hero uploaded sucessfully";
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
        <h2>Hall Of Fame</h2>
        <form action="" method="POST" enctype="multipart/form-data">
            <input type="text" name="name" id="name" placeholder="Input Hero Name">
            <input type="file" name="image" id="image">
            <textarea name="description" id="description" rows="5" placeholder="Input Hero Post"></textarea>
            <button type="submit" class="btn" name="submit">Submit</button>
        </form>
    </div>

</body>
</html>