<?php
    include "connect.php";

    // $selectAll = mysqli_query($conn, "SELECT * FROM `students`");

    // if (isset($_GET["delete"])) {
    //     $mnum = $_GET["delete"];
        
    //     $delete = mysqli_query($conn, "DELETE FROM `students` WHERE `mnum` = '$mnum'");
        
    //     if ($delete) {
    //         header("location: admin.php");
    //     };
    // }

    if (isset($_POST["uploadCourse"])) {
        
        $lectFName = $_POST["lectFName"];
        $lectLName = $_POST["lectLName"];

        $courseOne = $_POST["courseOne"];
        $courseTwo = $_POST["courseTwo"];
        $courseThree = $_POST["courseThree"];
        $courseFour = $_POST["courseFour"];
        $courseFive = $_POST["courseFive"];
        $courseSix = $_POST["courseSix"];
        $courseSeven = $_POST["courseSeven"];
        $courseEight = $_POST["courseEight"];

        $find_lecturer = mysqli_query($conn, "SELECT * FROM `lecturer_details` WHERE `fname` = '$lectFName' AND `lname` = '$lectLName'");
        $find_in_row = mysqli_num_rows($find_lecturer);

        if ($find_in_row) {
            $insert = mysqli_query($conn, "UPDATE `lecturer_details` SET `course1`='$courseOne',`course2`='$courseTwo',`course3`='$courseThree',`course4`='$courseFour',`course5`='$courseFive',`course6`='$courseSix',`course7`='$courseSeven',`course8`='$courseEight' WHERE `fname` = '$lectFName'");
            echo "Courses uploaded successfully";
        }
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
                    .courseUpload{
                        display: grid;
                        grid-template-columns: repeat(2, 1fr);
                        gap: 2rem;
                        input{
                            height: 30px;
                            text-indent: 10px;
                        } 
                        .btn{
                            width: 25%;
                            height: 30px;
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
                <li id="students">Update roles</li>
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
                    <h5>Admin</h5>
                </div>
            </header>
            <div class="main-content">
                <div class="home">
                    <form action="" method="post" class="courseUpload">
                        <input type="text" name="lectFName" class="form-control" placeholder="Lecturer First Name">
                        <input type="text" name="lectLName" class="form-control" placeholder="Lecturer Last Name">
                        <input type="text" name="courseOne" class="form-control" placeholder="Course 1">
                        <input type="text" name="courseTwo" class="form-control" placeholder="Course 2">
                        <input type="text" name="courseThree" class="form-control" placeholder="Course 3">
                        <input type="text" name="courseFour" class="form-control" placeholder="Course 4">
                        <input type="text" name="courseFive" class="form-control" placeholder="Course 5">
                        <input type="text" name="courseSix" class="form-control" placeholder="Course 6">
                        <input type="text" name="courseSeven" class="form-control" placeholder="Course 7">
                        <input type="text" name="courseEight" class="form-control" placeholder="Course 8">
                        <button class="btn" name="uploadCourse">Upload Course</button>
                    </form>
                </div>
                
            </div>
        </main>
    </section>

    <script src="admin.js"></script>
</body>
</html>