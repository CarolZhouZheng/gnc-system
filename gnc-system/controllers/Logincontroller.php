<?php

session_start();

include_once '../models/UserModel.php';

$userModel = new UserModel();

if($_SERVER['REQUEST_METHOD'] == 'POST') {

    $email = trim($_POST['email']);

    $password = trim($_POST['password']);

    if(empty($email) || empty($password)) {

        header("Location: ../views/login.php?error=2");

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

        header("Location: ../views/login.php?error=1");

        exit();

    }

}

?>