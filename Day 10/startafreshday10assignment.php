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
                /* gap: 2rem; */

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
        $msg1 = isset($_GET["msg1"]) ? $_GET["msg1"] : null;
        $msg2 = isset($_GET["msg2"]) ? $_GET["msg2"] : null;
        $msg3 = isset($_GET["msg3"]) ? $_GET["msg3"] : null;
        $msg4 = isset($_GET["msg4"]) ? $_GET["msg4"] : null;
        $msg5 = isset($_GET["msg5"]) ? $_GET["msg5"] : null;
        $msg6 = isset($_GET["msg6"]) ? $_GET["msg6"] : null;
    ?>

    <div class="form">
        <h2>Signup</h2>
        <form action="storageassignment10.php" method="POST">
            <input type="text" name="fName" id="fName" placeholder="Input your First Name">
            <?php
                echo("<p style='color: red; font-size: 20px; text-align:center;'>$msg1</p>")
            ?>
            <input type="text" name="lName" id="lName" placeholder="Input your Last Name">
            <?php
                echo("<p style='color: red; font-size: 20px; text-align:center;'>$msg2</p>")
            ?>
            <input type="text" name="uName" id="uName" placeholder="Input your User Name">
            <?php
                echo("<p style='color: red; font-size: 20px; text-align:center;'>$msg3</p>")
            ?>
            <input type="text" name="gender" id="gender" placeholder="Gender">
            <?php
                echo("<p style='color: red; font-size: 20px; text-align:center;'>$msg4</p>")
            ?>
            <input type="password" name="password" id="password" placeholder="Input your Password">
            <?php
                echo("<p style='color: red; font-size: 20px; text-align:center;'>$msg5</p>");
            ?>
            <input type="password" name="confPassword" id="confPassword" placeholder="Confirm your Password">
            <?php
                echo("<p style='color: red; font-size: 20px; text-align:center;'>$msg6</p>")
            ?>
            <button type="submit" class="btn">Submit</button>
        </form>
    </div>
    


</body>
</html>