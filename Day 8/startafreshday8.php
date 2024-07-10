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
        <form action="storage.php" method="POST">
            <input type="email" name="email" id="email">
            <input type="password" name="password" id="password">
            <button type="submit" class="btn">Submit</button>
        </form>
    </div>


    <!-- CREATE A CONTACT FORM AND SUMBIT THE DETAILS IN ANOTHER FILE -->

</body>
</html>