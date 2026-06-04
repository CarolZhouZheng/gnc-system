<?php
session_start();
// Si ya existe una sesión, redirigir al home directamente
if(isset($_SESSION['user'])) {
    header("Location: home.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>GNC Login</title>
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
        <img src="../assets/images/GNC_Logo.svg.png" alt="GNC Logo">
        <h1>Iniciar Sesión</h1>
        <form action="../controllers/LoginController.php" method="POST">
            <div class="input-group">
                <label for="email">Correo Electrónico</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="input-group">
                <label for="password">Contraseña</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" class="login-btn btn add-btn">Entrar al Sistema</button>
        </form>
    </div>
</body>
</html>