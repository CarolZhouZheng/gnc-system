<?php

include_once __DIR__ . '/../config/database.php';
class UserModel {

    public function login(
        $email,
        $password
    ) {

        global $conn;

        $sql = "SELECT * FROM users

        WHERE email = '$email'

        AND password = '$password'";

        $result = mysqli_query($conn, $sql);

        return mysqli_fetch_assoc($result);

    }

}

?>