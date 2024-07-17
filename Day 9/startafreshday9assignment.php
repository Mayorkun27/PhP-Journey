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

    <div class="form">
        <h2>Login</h2>
        <form action="storageassignment.php" method="POST">
            <input type="email" name="email" id="email" placeholder="Input your Email">
            <?php
                $condition1 = isset($_GET["msg1"]) ? $_GET["msg1"] : null;
                echo("<p style='color: red; font-size: 20px; text-align:center;'>$condition1</p>")
            ?>
            <input type="password" name="password" id="password" placeholder="Input your Password">
            <?php
                $condition2 = isset($_GET["msg2"]) ? $_GET["msg2"] : null;
                echo("<p style='color: red; font-size: 20px; text-align:center;'>$condition2</p>")
            ?>
            <button type="submit" class="btn">Submit</button>
        </form>
    </div>
    


</body>
</html>