<?php
    include "connect.php";

    $selectAll = mysqli_query($conn, "SELECT * FROM `attendee`");
    
    // $details = mysqli_fetch_assoc($selectAll);
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
        }
        body{
            background: #eee;
            font-family: sans-serif;
        }
        .general{
            display: grid !important;
            grid-template-columns: repeat(3, 1fr) !important;
            justify-content: center;
            align-items: center;
            gap: 2rem;
            padding: 2rem;
        }
        .attendee{
            padding: 2rem;
            background: #796fab;
            box-shadow: 5px 5px 10px #b2b2b2;
            display: flex;
            flex-direction: column;
            gap: 2rem;
            border-radius: 10px;
            .top{
                display: flex;
                flex-direction: column;     
                gap: .5rem;
            }
            .btom{
                display: flex;
                flex-direction: column;     
                gap: .7rem;
            }
            .event{
                color: #eff6f8;
                font-size: 30px;
            }
            .logo{
                width: 50%;
                margin-left: auto;
                object-fit: cover;
            }
            .image{
                position: relative;
                border: 3px solid #282828;
                border-radius: 8px;
                img{
                    width: 100%;
                    height: 500px;
                    object-fit: cover;
                    border-radius: 8px;
                }
                .affirm{
                    padding: 1rem;
                    position: absolute;
                    top: 0;
                    right: 0;
                    background: #00000052;
                    backdrop-filter: blur(10px);
                    color: #eff6f8;
                    font-size: 25px;
                    font-weight: 700;
                    width: 25%;
                    border-top-right-radius: 5px;
                    line-height: 40px;
                }
                .name{
                    position: absolute;
                    bottom: 3%;
                    left: 4%;
                    color: #eff6f8;
                    text-shadow: 2px 2px 0px #e487bc;
                    font-size: 40px;
                    font-weight: 700;
                    width: 30%;
                }
            }
            p{
                font-size: 16px;
                line-height: 20px;
                color: #eff6f8;
            }
            button{
                width: 100%;
                background: #e487bc;
                border: none;
                padding: 1rem 2rem;
                color: #fff;
                border-radius: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="general">
        <?php
            while ($details = mysqli_fetch_assoc($selectAll)) {
        ?>
        <div class="attendee">
            <div class="top">
                <img src="asset121.png" alt="..." class="logo">
                <h3 class="event">Tech2Cash</h3>
                <div class="image">
                    <img src="uploads/<?php echo $details["image"]; ?>" alt="...">
                    <div class="affirm">I will be there</div>
                    <h3 class="name"><?php echo $details["name"]; ?></h3>
                </div>
            </div>
            <div class="btom">
                <p>I just registered for "Tech2Cash" event! See you there</p>
                <button class="btn">www.buggybillions.com/tech2cash</button>
            </div>
        </div>
        <?php
            };
        ?>
    </div>
</body>
</html>