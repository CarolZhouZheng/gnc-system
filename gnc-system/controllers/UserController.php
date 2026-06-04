<?php

session_start();

include_once '../models/UserModel.php';

$userModel = new UserModel();

if($_SERVER['REQUEST_METHOD'] == 'POST') {

    $email = $_POST['email'];

    $password = $_POST['password'];

    $user = $userModel->login(
        $email,
        $password
    );

    if($user) {

        $_SESSION['user'] = $user;

        $_SESSION['timeout'] = time();

        header("Location: ../views/home.php");

    } else {

        echo "

        <h1>

            Correo o contraseña incorrectos

        </h1>

        <a href='../views/login.php'>

            Volver

        </a>

        ";

    }

}

?>