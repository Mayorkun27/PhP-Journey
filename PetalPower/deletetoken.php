<?php

    include_once "connect.php";

    // Delete expired tokens
    mysqli_query($conn, "UPDATE `petal_power_users` SET `token`=NULL, `token_expiration`=NULL WHERE `token_expiration` < NOW()");

    // Close the database connection
    mysqli_close($conn);
?>