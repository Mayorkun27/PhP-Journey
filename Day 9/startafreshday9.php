<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .form{
            padding: 2rem;
            box-shadow: 5px 5px 10px #eee,
            -5px -5px 10px #eee;
            width: 40%;
            margin: 5rem auto;
            form{
                display: flex;
                flex-direction: column;
                gap: 2rem;

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
<?php
    $condition = isset($_GET["msg"]) ? $_GET["msg"] : null;
    // echo $condition;
    echo("<p style='color: red; font-size: 20px;'>$condition</p>")
?>
    <div class="form">
        <h2>Login</h2>
        <form action="storageday9.php" method="POST">
            <input type="email" name="email" id="email">
            <!-- In ternary operation "?" is if, ":" is else-->
            <input type="password" name="password" id="password">
            <button type="submit" class="btn">Submit</button>
        </form>
    </div>
    


</body>
</html>