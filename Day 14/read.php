<?php
    include "connect.php";

    $selectAll = mysqli_query($conn, "SELECT * FROM `hall_of_fame`");
    $update = mysqli_query($conn, "UPDATE `hall_of_fame` SET `name`='Adeleke Oluwamayokun' WHERE 1");

    // print_r($details);
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
        }
        body{
            background: #f7f7f7;
        }
        .general{
            display: grid;
            grid-template-columns: repeat(3, 1fr) !important;
            gap: 2rem;
            /* width: 70%; */
        }
        .card{
            align-items: center;
            width: 100%;
            position: relative;
            .main{
                height: max-content;
                display: flex;
                flex-direction: column;
                justify-content: center;
                transform: translate(24%, 20%);
            }
            img{
                width: 88%;
                height: 290px;
                object-fit: cover;
            }
            .label{
                background: #af8807;
                font-size: 14px;
                height: 60px;
                width: 88%;
                color: white;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                font-family: sans-serif;
            }
        }
        .card::before{
            position: absolute;
            top: 0;
            left: 0%;
            z-index: -1;
            content: "";
            width: 135%;
            height: 144%;
            background: url("frame.jpg");
            background-size: cover;
            /* background-position: center; */
        }
    </style>
</head>
<body>
    <div class="general">
    <?php
        while ($details = mysqli_fetch_assoc($selectAll)) {
    ?>
        <div class="card">
            <div class="main">
                <img src="uploads/<?php echo $details["image"]?>" alt="...">
                <div class="label">
                    <h3><?php echo $details["name"]?></h3>
                    <p><?php echo $details["post"]?></p>
                </div>
            </div>
        </div>
        <?php  
        }
        ?>
    </div>
</body>
</html>