<?php

session_start();

session_destroy();

?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <title>Registrar Usuario</title>

    <link rel="stylesheet" href="../assets/css/style.css">

    <style>

        body {

            display: flex;

            justify-content: center;

            align-items: center;

            height: 100vh;

            background-color: var(--gnc-bg-main);

            padding: 0;

            margin: 0;

        }

        .login-box {

            width: 100%;

            max-width: 420px;

            background-color: var(--gnc-bg-card);

            padding: 40px;

            border-radius: 16px;

            box-shadow: var(--shadow);

            border: 1px solid var(--gnc-border);

            text-align: center;

        }

        .login-box img {

            width: 180px;

            margin-bottom: 25px;

        }

        .login-box h1 {

            border-left: none;

            padding-left: 0;

            margin-bottom: 30px;

            font-size: 28px;

            text-align: center;

        }

        .input-group {

            margin-bottom: 20px;

            text-align: left;

        }

        .input-group label {

            display: block;

            margin-bottom: 8px;

            color: var(--gnc-text-secondary);

            font-weight: 600;

            font-size: 14px;

        }

        .login-btn {

            width: 100%;

            margin-top: 10px;

        }

    </style>

</head>

<body>

    <div class="login-box">

        <img
        src="../assets/images/GNC_Logo.svg.png"
        alt="GNC Logo">

        <h1>

            Registrar Usuario

        </h1>

        <form
        action="../controllers/UserController.php"
        method="POST">

            <input
            type="hidden"
            name="action"
            value="register">

            <div class="input-group">

                <label>

                    Nombre

                </label>

                <input
                type="text"
                name="name"
                required>

            </div>

            <div class="input-group">

                <label>

                    Correo Electrónico

                </label>

                <input
                type="email"
                name="email"
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
            class="login-btn btn add-btn">

                Registrar Usuario

            </button>

        </form>

        <br>

        <a href="login.php">

            Volver al login

        </a>

    </div>

</body>

</html>