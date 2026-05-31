<?php

session_start();

if(isset($_SESSION['user'])) {

    header("Location: home.php");

}

?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <title>GNC Login</title>

    <link
    rel="stylesheet"
    href="../assets/css/style.css">

    <style>

        body{

            display: flex;

            justify-content: center;

            align-items: center;

            height: 100vh;

            background:
            linear-gradient(
                135deg,
                #0f0f0f,
                #1a1a1a
            );

        }

        .login-box{

            width: 400px;

            background: rgba(25,25,25,0.95);

            padding: 45px;

            border-radius: 25px;

            box-shadow: 0 10px 35px rgba(0,0,0,0.5);

            border: 2px solid #d60000;

            text-align: center;

        }

        .login-box img{

            width: 180px;

            margin-bottom: 25px;

        }

        .login-box h1{

            margin-bottom: 30px;

            font-size: 30px;

        }

        .input-group{

            margin-bottom: 20px;

            text-align: left;

        }

        .input-group label{

            display: block;

            margin-bottom: 8px;

            color: #d9d9d9;

        }

        .input-group input{

            width: 100%;

            padding: 14px;

            border-radius: 12px;

            border: none;

            background-color: #2a2a2a;

            color: white;

            font-size: 15px;

        }

        .input-group input:focus{

            outline: 2px solid #d60000;

        }

        .login-btn{

            width: 100%;

            padding: 15px;

            border: none;

            border-radius: 12px;

            background-color: #d60000;

            color: white;

            font-size: 16px;

            font-weight: bold;

            cursor: pointer;

            transition: 0.3s;

        }

        .login-btn:hover{

            background-color: white;

            color: #d60000;

        }

    </style>

</head>

<body>

    <div class="login-box">

        <img
        src="../assets/images/GNC_Logo.svg.png">

        <h1>

            Iniciar Sesión

        </h1>

        <form
        action="../controllers/LoginController.php"
        method="POST">

            <div class="input-group">

                <label>

                    Usuario

                </label>

                <input
                type="text"
                name="username"
                required>

            </div>

            <div class="input-group">

                <label>

                    Contraseña

                </label>

                <input
                type="password"
                name="password"
                required>

            </div>

            <button
            type="submit"
            class="login-btn">

                Entrar al Sistema

            </button>

        </form>

    </div>

</body>

</html>