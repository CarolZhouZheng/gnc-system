<?php
session_start();
if(!isset($_SESSION['user'])) {
    header("Location: ../login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Método</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>
<body>
    <div class="navbar">
        <a href="../home.php" class="logo">
            <img src="../../assets/images/GNC_Logo.svg.png" alt="GNC Logo">
        </a>
        <div class="nav-actions">
            <a href="../logout.php" class="btn">Cerrar Sesión</a>
        </div>
    </div>

    <div class="container">
        <h1 class="title">Nuevo Método de Pago</h1>
        <p class="subtitle">Añade una nueva forma de recibir pagos en el sistema.</p>

        <div style="margin-bottom: 25px;">
            <a href="payment-methods.php" class="btn">Volver a Métodos</a>
        </div>

        <div style="max-width: 400px;">
            <form method="POST" action="../../controllers/PaymentMethodController.php">
                <div style="margin-bottom: 20px;">
                    <label>Nombre del Método:</label>
                    <input type="text" name="name" required placeholder="Ej. SINPE Móvil, Cripto...">
                </div>

                <button type="submit" class="btn add-btn" style="width: 100%;">Guardar Método</button>
            </form>
        </div>
    </div>
</body>
</html>