<?php

    include_once "connect.php";

    // Function to validate the token
    function isTokenValid($conn, $token) {
        $query_token_expiration = mysqli_query($conn, "SELECT `token_expiration` FROM `petal_power_users` WHERE `token`='$token'");
        
        if (mysqli_num_rows($query_token_expiration) === 1) {
            $result = mysqli_fetch_assoc($query_token_expiration);
            $expirationTime = $result['token_expiration'];

            // Check if the token is expired
            if (strtotime($expirationTime) > time()) {
                return true; // Token is still valid
            } else {
                // Token is expired, delete it from the database
                mysqli_query($conn, "UPDATE `petal_power_users` SET `token`=NULL, `token_expiration`=NULL WHERE `token`='$token'");
                return false; // Token has expired
            }
        }
        return false; // Token not found
    }

?>