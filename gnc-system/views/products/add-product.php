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
    <title>Agregar Producto</title>
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
        <h1 class="title">Nuevo Producto</h1>
        <p class="subtitle">Completa la información para dar de alta un nuevo suplemento en el inventario.</p>

        <div style="margin-bottom: 25px;">
            <a href="products.php" class="btn">Volver al Inventario</a>
        </div>

        <div style="max-width: 600px;">
            <form action="../../controllers/ProductController.php" method="POST" enctype="multipart/form-data">
                <div style="margin-bottom: 20px;">
                    <label>Categoría:</label>
                    <select name="category_id">
                        <option value="1">Proteínas</option>
                        <option value="2">Creatinas</option>
                        <option value="3">Pre-entrenos</option>
                        <option value="4">Vitaminas</option>
                        <option value="5">Accesorios</option>
                    </select>
                </div>

                <div style="margin-bottom: 20px;">
                    <label>Nombre del Producto:</label>
                    <input type="text" name="name" required placeholder="Ej. Whey Gold Standard">
                </div>

                <div style="margin-bottom: 20px;">
                    <label>Descripción:</label>
                    <textarea name="description" style="width: 100%; min-height: 100px; padding: 12px; border-radius: 8px; background: var(--gnc-bg-card); color: white; border: 1.5px solid var(--gnc-border); outline: none;"></textarea>
                </div>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px;">
                    <div>
                        <label>Precio (₡):</label>
                        <input type="number" name="price" required>
                    </div>
                    <div>
                        <label>Stock Inicial:</label>
                        <input type="number" name="stock" required>
                    </div>
                </div>

                <div style="margin-bottom: 30px;">
                    <label>Imagen del Producto:</label>
                    <input type="file" name="image" style="padding: 10px 0;" required>
                </div>

                <button type="submit" class="btn add-btn" style="width: 100%;">
                    Guardar Producto
                </button>
            </form>
        </div>
    </div>
</body>
</html>
