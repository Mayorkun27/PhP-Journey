<?php
    include "connect.php";

    session_start();

    $session_fName = $_SESSION['fname'];

    $select = mysqli_query($conn, "SELECT * FROM `lecturer_details` WHERE `fname` = '$session_fName'");
    $details = mysqli_fetch_assoc($select);

    if (isset($_POST["logOut"])) {
        session_abort();
        echo "Logged out successfully!.";
        header("location: startafreshday19.php");
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Courier New', Courier, monospace;
            overflow-x: hidden;
        }
        .sidebar{
            background: #eee;
            position: fixed;
            height: 100vh;
            padding: 2rem;
            width: 20%;
            box-shadow: 1px 0px 20px #00000067;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            .navbar-brand{
                font-size: 1.98rem;
                text-align: center;
                color: transparent;
                background-clip: text;
                -webkit-text-stroke: 2px #4f4f4f;
                background: linear-gradient(128deg, #e6c4c4, #1f0b0b5c);
                -webkit-background-clip: text;
                font-weight: 900;
            }
            ul{
                color: black;
                list-style: none;
                padding: 0;
                display: flex;
                flex-direction: column;
                gap: 1.5rem;
                li{
                    cursor: pointer;
                }
            }
            .active{
                background: #9a9a9a75;
                padding: 1rem;
                box-shadow: 2px 2px 5px #000000d2,
                inset -2px 0px 2px #000000d2;
            }
            .btn{
                opacity: 50%;
                border: none;
            }
        }
        main{
            position: relative;
            height: 100vh;
            width: 82%;
            transform: translateX(24%);
            padding-bottom: 2rem;
            header{
                position: sticky;
                top: 0;
                width: 100%;
                padding: 2rem;
                padding-top: 1.5rem;
                display: flex;
                justify-content: space-between;
                align-items: center;
                background: #eee;
                box-shadow: 7px 5px 5px #0000006d;
                .right{
                    display: flex;
                    align-items: center;
                    gap: 1rem;
                    background: #9a9a9a75;
                    border: 3px solid #9a9a9a75;
                    padding: .5rem 1rem;
                    border-radius: .5rem;
                    img{
                        width: 30px;
                        height: 30px;
                        border-radius: 50%;
                        object-fit: cover;
                        background: #9a9a9a75;
                    }
                }
            }
            .main-content{
                padding: 2rem;
                display: grid;
                gap: 3rem;
                .home{
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    height: 70vh;
                }
                .profile{
                    display: flex;
                    flex-wrap: wrap;
                    align-items: center;
                    justify-content: space-between;
                    background: #eee;
                    padding: 2rem;
                    box-shadow: 3px 3px 10px #00000026;
                    border-radius: 2rem;
                    border-top-left-radius: 0rem;
                    border-bottom-left-radius: 0rem;
                    .image{
                        width: 50%;
                        border-radius: 10px;
                        border: 5px dashed #9a9a9a75;
                        background: #eee;
                        img{
                            height: 100px;
                            width: 100%;
                            object-fit: cover;
                            border-radius: 10px;
                        }
                    }
                    .info{
                        width: 100%;
                        display: flex;
                        justify-content: space-between;
                        flex-wrap: wrap;
                        align-items: center;
                        width: 100%;
                        text-align: start;
                        .card{
                            width: 45%;
                            border-bottom: 1px solid;
                            margin: 1rem 0px;
                            display: grid;
                            display: flex;
                            align-items: center;
                            justify-content: space-between;
                            gap: .5rem;
                            span{
                                font-size: 12px;
                            }
                            h3{
                                font-size: 18px;
                            }
                        }
                        .small-card{
                            width: 30%;
                            height: max-content;
                        }
                        .card-img{
                            background: #9a9a9a3d;
                            width: 30%;
                            border: none;
                            flex-direction: column !important;
                            border-radius: 2rem;
                            padding-top: 2rem;
                            text-align: center;
                            img{
                                width: 75%;
                            }
                        }
                        .btn{
                            width: 25%;
                            background: #000;
                            color: #fff;
                            border-radius: .5rem;
                            height: 40px;
                            border: 2px solid #2b2b2b;
                            text-align: center;
                            margin: 20px auto !important;
                        }
                    }
                }
                .settings{
                    display: flex;
                    flex-wrap: wrap;
                    align-items: center;
                    justify-content: space-between;
                    .image{
                        width: 50%;
                        border-radius: 10px;
                        border: 5px dashed #9a9a9a75;
                        background: #eee;
                        img{
                            width: 100%;
                            object-fit: cover;
                            border-radius: 10px;
                        }
                    }
                    .info{
                        width: 50%;
                        form{
                            display: flex;
                            justify-content: space-between;
                            flex-wrap: wrap;
                            width: 100%;
                            background: #ffffffe0;
                            padding: 2rem;
                            text-align: start;
                            .form-control{
                                width: 100%;
                                height: 40px;
                                outline: none;
                                text-indent: 10px;
                                margin-bottom: 1rem;
                            }
                            .fc-type-1{
                                width: 49%;
                            }
                            .btn{
                                width: 25%;
                                background: #000;
                                color: #fff;
                                border-radius: .5rem;
                                height: 40px;
                                border: 2px solid #2b2b2b;
                                text-align: center;
                                margin: 20px auto !important;
                            }
                        }
                    }
                }
            }
        }
    </style>
</head>
<body>
    
    <section class="general">
        <nav class="sidebar">
            <div class="navbar-brand">Mella</div>
            <ul>
                <li class="active" id="home">Home</li>
                <li id="profile">Profile</li>
                <li id="settings">Settings</li>
                <li>Lorem</li>
                <li>Lorem</li>
            </ul>
            <form method="post">
                <button type="submit" name="logOut" class="btn">Logout</button>
            </form>
        </nav>
        <main class="main">
            <header>
                <h1>Welcome, <?php echo $details["fname"]; ?></h1>
                <div class="right">
                    <h5><?php echo $details["fname"]." ".$details["lname"]; ?></h5>
                </div>
            </header>
            <div class="main-content">
                <div class="home">
                    <div class="profile">
                        <h3 style="width: 100%; margin-bottom: 2rem;">Courses to be taken</h3>
                        <div class="info">
                            <div class="card">
                                <h5><?php echo $details["course1"]; ?></h5>
                            </div>
                            <div class="card">
                                <h5><?php echo $details["course2"]; ?></h5>
                            </div>
                            <div class="card">
                                <h5><?php echo $details["course3"]; ?></h5>
                            </div>
                            <div class="card">
                                <h5><?php echo $details["course4"]; ?></h5>
                            </div>
                            <div class="card">
                                <h5><?php echo $details["course5"]; ?></h5>
                            </div>
                            <div class="card">
                                <h5><?php echo $details["course6"]; ?></h5>
                            </div>
                            <div class="card">
                                <h5><?php echo $details["course7"]; ?></h5>
                            </div>
                            <div class="card">
                                <h5><?php echo $details["course8"]; ?></h5>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </main>
    </section>

    <script src="script.js"></script>
</body>
</html>