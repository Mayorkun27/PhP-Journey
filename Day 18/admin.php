<?php
    include "connect.php";

    $selectAll = mysqli_query($conn, "SELECT * FROM `students`");

    if (isset($_GET["delete"])) {
        $mnum = $_GET["delete"];
        
        $delete = mysqli_query($conn, "DELETE FROM `students` WHERE `mnum` = '$mnum'");
        
        if ($delete) {
            header("location: admin.php");
        };
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
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
                .allstudents{
                    text-align: center;
                    overflow: scroll;
                    height: 70vh;
                    padding: 2rem;
                    display: flex;
                    flex-wrap: wrap;
                    align-items: center;
                    box-shadow: inset -3px 3px 10px #00000026;
                    border-radius: 2rem;
                    td{
                        padding: 1rem;
                        white-space: nowrap;
                        img{
                            background: #eee;
                            border-radius: 100px;
                        }
                    }
                    .btn{
                        width: 100%;
                        background: #000;
                        color: #fff;
                        border-radius: .5rem;
                        padding: 0px 1rem;
                        height: 40px;
                        border: 2px solid #2b2b2b;
                        text-align: center;
                        margin: 20px auto !important;
                        cursor: pointer;
                    }
                }
                .allstudents::-webkit-scrollbar{
                    display: none;
                }
            }
        }
    </style>
</head>
<body>

    <section class="general">

        <nav class="sidebar">
            <div class="navbar-brand">PHP SCHOOL</div>
            <ul>
                <li class="active" id="home">Home</li>
                <li id="students">All Students</li>
                <li>Lorem</li>
                <li>Lorem</li>
                <li>Lorem</li>
            </ul>
            <form method="post">
                <button type="submit" name="logOut" class="btn">Logout</button>
            </form>
        </nav>

        <main class="main">
            <header>
                <h1>Welcome, Admin</h1>
                <div class="right">
                    <h5>&lt;&sol;Admin&gt;</h5>
                    <img src="uploads/IMG_20231113_103708.jpg" alt="...">
                </div>
            </header>
            <div class="main-content">
                <div class="home">
                    <h3>Coming Soon....</h3>
                </div>

                <div class="allstudents">
                    <h3 style="width: 100%; margin-bottom: 2rem;">All Students</h3>
                    <table border>
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Matric No</th>
                                <th>Level</th>
                                <th>DOB</th>
                                <th>Dp</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <?php
                            while($details = mysqli_fetch_assoc($selectAll)){   
                        ?>
                        <tbody>
                            <tr>
                                <td>
                                    <?php
                                        echo $details["id"];
                                    ?>
                                </td>
                                <td>
                                    <?php
                                        echo $details["fname"];
                                    ?>
                                </td>
                                <td>
                                    <?php
                                        echo $details["lname"];
                                    ?>
                                </td>
                                <td>
                                    <?php
                                        echo $details["email"];
                                    ?>
                                </td>
                                <td>
                                    <?php
                                        echo $details["mnum"];
                                    ?>
                                </td>
                                <td>
                                    <?php
                                        echo $details["lvl"];
                                    ?>
                                </td>
                                <td>
                                    <?php
                                        echo $details["dob"];
                                    ?>
                                </td>
                                <td>
                                    <img src="uploads/<?php echo $details["file"]?>" width="60px" alt="...">
                                </td>
                                <td>
                                    <a href="admin.php?delete=<?php echo $details["mnum"];?>"><button type="submit" class="btn" name="delete">Delete User</button></a>
                                </td>
                            </tr>
                        </tbody>
                        <?php
                            }
                        ?>
                    </table>
                </div>
                
            </div>
        </main>
    </section>

    <script src="admin.js"></script>
</body>
</html>