<?php

session_start();

$inactive = 300;

if (isset($_SESSION['timeout'])) {

    $sessionLife = time() - $_SESSION['timeout'];

    if ($sessionLife > $inactive) {

        session_unset();

        session_destroy();

        header("Location: ../login.php");

        exit();
    }
}

$_SESSION['timeout'] = time();

if (!isset($_SESSION['user'])) {

    header("Location: ../login.php");

    exit();
}

include_once '../../models/ProductModel.php';

$productModel = new ProductModel();

$result = $productModel->getProducts();

?>

<!DOCTYPE html>
<html>

<head>
    <title>Productos</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
    <style>
        /* Estilo específico para las miniaturas de productos en la tabla */
        .product-img {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 8px;
            border: 1px solid var(--gnc-border);
        }
    </style>
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
        <h1 class="title">Inventario</h1>
        <p class="subtitle">Gestión centralizada de suplementos y stock disponible.</p>

        <div style="margin-bottom: 25px;">
            <a href="../home.php" class="btn">Volver</a>
            <a href="add-product.php" class="btn add-btn">Agregar Producto</a>
        </div>

        <table>

            <tr>

                <th>ID</th>
                <th>Imagen</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Acciones</th>

            </tr>

            <?php while ($row = mysqli_fetch_assoc($result)) { ?>

                <tr>

                    <td>

                        <?php echo $row['id']; ?>

                    </td>

                    <td>
                        <img src="../../assets/images/<?php echo $row['image']; ?>" class="product-img">
                    </td>

                    <td>

                        <?php echo $row['name']; ?>

                    </td>

                    <td>

                        <?php echo $row['description']; ?>

                    </td>

                    <td>

                        ₡<?php echo $row['price']; ?>

                    </td>

                    <td>

                        <?php echo $row['stock']; ?>

                    </td>

                    <td>
                        <a href="modify-product.php?id=<?php echo $row['id']; ?>">
                            <button class="btn">Editar</button>
                        </a>
                        <a href="../../controllers/ProductController.php?id=<?php echo $row['id']; ?>">
                            <button class="btn">Eliminar</button>
                        </a>

                    </td>

                </tr>

            <?php } ?>

        </table>

</body>

</html>