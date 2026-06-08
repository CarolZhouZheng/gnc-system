<?php

session_start();

include_once '../models/UserModel.php';

$userModel = new UserModel();

if($_SERVER['REQUEST_METHOD'] == 'POST') {

    if(isset($_POST['action']) && $_POST['action'] == 'register') {

        $name = $_POST['name'];

        $email = $_POST['email'];

        $password = $_POST['password'];

        $register = $userModel->register(
            $name,
            $email,
            $password
        );

        if($register) {

            header("Location: ../views/login.php?success=1");

            exit();

        } else {

            header("Location: ../views/register.php?error=1");

            exit();

        }

    } else {

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

            exit();

        } else {

            header("Location: ../views/login.php?error=1");

            exit();

        }

    }

}

?>