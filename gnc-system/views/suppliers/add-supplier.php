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
    <title>Agregar Proveedor</title>
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
        <h1 class="title">Nuevo Proveedor</h1>
        <p class="subtitle">Registra un nuevo aliado comercial para el abastecimiento.</p>

        <div style="margin-bottom: 25px;">
            <a href="suppliers.php" class="btn">Volver a Proveedores</a>
        </div>

        <div style="max-width: 500px;">
            <form method="POST" action="../../controllers/SupplierController.php">
                <div style="margin-bottom: 15px;">
                    <label>Nombre Comercial:</label>
                    <input type="text" name="name" required placeholder="Nombre de la empresa">
                </div>

                <div style="margin-bottom: 15px;">
                    <label>Teléfono de Contacto:</label>
                    <input type="text" name="phone" required placeholder="Ej. 8888-8888">
                </div>

                <div style="margin-bottom: 15px;">
                    <label>Correo Electrónico:</label>
                    <input type="email" name="email" required placeholder="contacto@empresa.com">
                </div>

                <div style="margin-bottom: 25px;">
                    <label>Dirección Física:</label>
                    <input type="text" name="address" required placeholder="Ciudad, Provincia...">
                </div>

                <button type="submit" class="btn add-btn" style="width: 100%;">Guardar Proveedor</button>
            </form>
        </div>
    </div>
</body>
</html>