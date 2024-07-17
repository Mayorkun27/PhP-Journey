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
            .gen{
                display: flex;
                flex-wrap: wrap;
            }
            .gen>div{
                width: 50%;
                margin: 10px 0;
            }
            input{
                width: 85%;
                padding: 10px;
            }
            textarea{
                width: 100%;
                margin: 10px 0;
                padding: 10px;
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
            small{
                font-size: 10px;
                color: red;
                transform: translateY(10px) !important;
            }
        }
    </style>
</head>
<body>
    
   <!-- CREATE A CONTACT FORM AND SUMBIT THE DETAILS IN ANOTHER FILE -->
    <div class="form">
        <form action="storageassignment.php" method="POST">
            <h2>Contact</h2>
            <div class="gen">
                <div>
                    <label for="fname">First Name:</label><br>
                    <input type="text" id="fname" name="firstName" required><br>
                </div>
                <div>
                    <label for="lname">Last Name:</label><br>
                    <input type="text" id="lname" name="lastNname" required><br>
                </div>
                <div>
                    <label for="email">Email:</label><br>
                    <input type="email" id="email" name="email" required><br>
                </div>
                <div>
                    <label for="subject">Subject: <small>Optional</small></label><br>
                    <input type="text" id="subject" name="subject"><br>
                </div>
            </div>
            <div>
                <label for="message">Message:</label><br>
                <textarea id="message" name="message" rows="10" required></textarea><br>
            </div>
            <button type="submit">Submit</button>
        </form>
    </div>

</body>
</html>