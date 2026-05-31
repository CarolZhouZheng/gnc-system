<?php

session_start();

include_once '../models/UserModel.php';

$userModel = new UserModel();

if($_SERVER['REQUEST_METHOD'] == 'POST') {

    $email = trim($_POST['email']);

    $password = trim($_POST['password']);

    if(empty($email) || empty($password)) {

        echo "

        <h1>

            Todos los campos son obligatorios

        </h1>

        <a href='../views/login.php'>

            Volver

        </a>

        ";

        exit();

    }

    $user = $userModel->login(
        $email,
        $password
    );

    if($user) {

        $_SESSION['user'] = $user;

        $_SESSION['timeout'] = time();

        header("Location: ../views/home.php");

        exit();

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