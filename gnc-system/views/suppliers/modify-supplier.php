<?php
session_start();
if(!isset($_SESSION['user'])) {
    header("Location: ../login.php");
    exit();
}
include_once '../../models/SupplierModel.php';
$supplierModel = new SupplierModel();
$id = $_GET['id'];
$supplier = $supplierModel->getSupplierById($id);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Modificar Proveedor</title>
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
        <h1 class="title">Modificar Proveedor</h1>
        <p class="subtitle">Actualiza los datos de contacto o ubicación de tu socio comercial.</p>

        <div style="margin-bottom: 25px;">
            <a href="suppliers.php" class="btn">Volver a Proveedores</a>
        </div>

        <div style="max-width: 500px;">
            <form method="POST" action="../../controllers/SupplierController.php">
                <input type="hidden" name="id" value="<?php echo $supplier['id']; ?>">
                
                <div style="margin-bottom: 15px;">
                    <label>Nombre Comercial:</label>
                    <input type="text" name="name" value="<?php echo $supplier['name']; ?>" required>
                </div>

                <div style="margin-bottom: 15px;">
                    <label>Teléfono de Contacto:</label>
                    <input type="text" name="phone" value="<?php echo $supplier['phone']; ?>" required>
                </div>

                <div style="margin-bottom: 15px;">
                    <label>Correo Electrónico:</label>
                    <input type="email" name="email" value="<?php echo $supplier['email']; ?>" required>
                </div>

                <div style="margin-bottom: 25px;">
                    <label>Dirección Física:</label>
                    <input type="text" name="address" value="<?php echo $supplier['address']; ?>" required>
                </div>

                <button type="submit" name="update" class="btn add-btn" style="width: 100%;">Actualizar Proveedor</button>
            </form>
        </div>
    </div>
</body>
</html>
