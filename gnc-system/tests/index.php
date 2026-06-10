<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de Pruebas - GNC System</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <style>
        .test-link {
            display: block;
            padding: 15px;
            margin-bottom: 10px;
            background: var(--gnc-bg-card);
            border: 1px solid var(--gnc-border);
            border-radius: 8px;
            text-decoration: none;
            color: white;
            transition: 0.3s;
        }
        .test-link:hover {
            border-color: var(--gnc-red);
            background: #222;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="title">Suite de Pruebas Internas</h1>
        <p class="subtitle">Ejecución de validaciones de conectividad y lógica de negocio.</p>
        
        <a href="audittest.php" class="test-link">🧪 Probar Módulo de Auditorías (Integridad de Triggers)</a>
        <a href="producttest.php" class="test-link">🧪 Probar Módulo de Productos (Consultas DQL)</a>
        <a href="usertest.php" class="test-link">🧪 Probar Módulo de Usuarios (Autenticación)</a>
        <br>
        <a href="../views/home.php" class="btn">Volver al Sistema</a>
    </div>
</body>
</html>
