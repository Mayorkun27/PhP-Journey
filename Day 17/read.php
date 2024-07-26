<?php
    include "connect.php";

    session_start();

    $sessionEmail = $_SESSION['email'];

    $select = mysqli_query($conn, "SELECT * FROM `with_c_r_u_d` WHERE `email` = '$sessionEmail'");
    $details = mysqli_fetch_assoc($select);

    if (isset($_POST["logout"])) {
        session_abort();
        header("location: startafreshday15.php?msg='Logged Out successfully'");
    };

    if (isset($_POST["delete"])) {
        $delete = mysqli_query($conn, "DELETE FROM `with_c_r_u_d` WHERE `email` = '$sessionEmail'");
        session_abort();
        header("location: startafreshday15.php?msg='Account Deleted Successfully'");
    };
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: sans-serif;
        }
        .gen{
            width: 100%;
            display: grid;
            align-items: center;
            place-items: center;
            margin-top: 2rem;
        }
        .card{
            display: flex;
            /* align-items: center; */
            border-top-right-radius: 20px;
            border-top-left-radius: 20px;
            background: gray;
            width: 40%;
            .card-img{
                width: 80%;
                display: flex;
                align-items: end;
                justify-content: center;
            }
            img{
                width: 80%;
            }
            .card-text{
                width: 60%;
                height: 100%;
                border-top-right-radius: 20px;
                background: blue;
                line-height: 40px;
                padding: 2rem;
                color: white;
                display: flex;
                flex-direction: column;
                justify-content: space-between;
                gap: 2.5rem;
                strong{
                    opacity: 50%;
                    letter-spacing: 3px;
                }
            }
        }
        .btn{
                width: 15%;
                margin: 20px;
                background: #000;
                color: #fff;
                height: 40px;
                border: none;
                border-radius: 5px;
            }
    </style>
</head>
<body>
   
    <div class="gen">
        <div class="card">
            <div class="card-img">
                <img src="/uploads/<?php echo $details["file"]; ?>" alt="...">
            </div>
            <div class="card-text">
                <div class="top">
                    <h3><?php echo $details['fname']." ".$details['lname']?></h3>
                    <h5><?php echo $details['uname']?></h5>
                    <p><?php echo $details['email']?></p>
                </div>
                <div class="btom">
                    <strong><?php echo $details['password']?></strong>
                </div>
            </div>
        </div>
    </div>

    <form action="" method="POST">
        <button class="btn" name="logout">Log Out</button>
        <button class="btn" name="delete">Delete Account</button>
    </form>

    <a href="update.php">Edit Details</a>

</body>
</html>