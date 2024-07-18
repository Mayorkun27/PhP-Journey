<?php
    include "connectday13.php";

    $selectAll = mysqli_query($conn, "SELECT * FROM `products`");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            background: #eee;
            font-family: monospace;
        }
        .general{
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            justify-content: center;
            align-items: center;
            text-align: center;
            gap: 2rem;
        }
        .products{
            padding: 2rem 0px 0px 0px;
            width: 90%;
            background: #fff;
            box-shadow: 5px 5px 10px #b2b2b2;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            gap: 2rem;
            text-align: center;
            small{
                display: block;
                margin: 0;
                font-size: 1.3rem;
                font-weight: 600;
            }
            .card-img{
                width: 80%;
                margin: 0 auto;
                position: relative;
                z-index: 3;
            }
            .card-img::before{
                content: "";
                position: absolute;
                width: 100%;
                height: 50%;
                background: #1f8b3e20;
                top: 25%;
                left: 0;
                z-index: -1;
            }
            img{
                height: 150px;
            }
            p{
                font-size: 14px;
                width: 75%;
                margin: 30px auto;
                margin-bottom: 0px
            }
            button{
                width: 100%;
                background: #1e8b3f;
                font-family: monospace;
                box-shadow: -0px -3px 10px #b2b2b2;
                border: none;
                padding: .9rem 2rem;
                color: #fff;
            }
        }
    </style>
</head>
<body>
    <h1 style="margin-bottom: 2rem;">All products Section</h1>
    <div class="general">
        <?php
            while($details = mysqli_fetch_assoc($selectAll)){  
        ?>
        <div class="products">
            <div>
                <div class="card-img">
                    <img src="uploads/<?php echo $details["image"] ?>" alt="...">
                </div>
                <small><?php echo $details["name"] ?></small>
                <small>$<?php echo $details["price"] ?></small>
                <p><?php echo $details["description"]?></p>
            </div>
            <button>Add to cart</button>
        </div>
        <?php
            }  
        ?>
    </div>
</body>
</html>