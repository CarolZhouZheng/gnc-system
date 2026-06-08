<?php

include_once __DIR__ . '/../config/database.php';

class UserModel {

    public function login(
        $email,
        $password
    ) {

        global $conn;

        $sql = "SELECT * FROM users

        WHERE email = ?

        AND password = ?";

        $stmt = mysqli_prepare($conn, $sql);

        mysqli_stmt_bind_param(
            $stmt,
            "ss",
            $email,
            $password
        );

        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);

        return mysqli_fetch_assoc($result);

    }

    public function register(
        $name,
        $email,
        $password
    ) {

        global $conn;

        $sql = "INSERT INTO users (
            name,
            email,
            password
        ) VALUES (?, ?, ?)";

        $stmt = mysqli_prepare($conn, $sql);

        mysqli_stmt_bind_param(
            $stmt,
            "sss",
            $name,
            $email,
            $password
        );

        return mysqli_stmt_execute($stmt);

    }

}

?>