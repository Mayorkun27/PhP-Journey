<?php
    include "connect.php";
    // content type to json
    header('Content-Type: application/json');

    $select = mysqli_query($conn, "SELECT * FROM `with_c_r_u_d` WHERE `email` = 'davepeace004@gmail.com'");
    $details = mysqli_fetch_assoc($select);
    echo json_encode(["status" => "success", "data" => $details])
?>