<?php
    include "connectday12.php";

    $selectAll = mysqli_query($conn, "SELECT * FROM `day_12`");

    // print_r($selectAll);
    echo "<br>";
    
    echo "<br>";

    if (isset($_GET["delete"])) {
        $email = $_GET["delete"];
        // echo $delete;
        
        $delete = mysqli_query($conn, "DELETE FROM `day_12` WHERE `email` = '$email'");
        
        if ($delete) {
            header("location: read.php");
        };
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border="1">
        <thead>
            <tr>
                <th>S/N</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
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
                    <img src="uploads/<?php echo $details["file"]?>" width="50px" alt="...">
                </td>
                <td>
                    <a href="read.php?delete=<?php echo $details["email"];?>"><button type="submit" name="delete">Delete User</button></a>
                </td>
            </tr>
        </tbody>
        <?php
            }
        ?>
    </table>


    <!-- Assignment 
            Create a form with product name, image,  details, price
    -->
</body>
</html>