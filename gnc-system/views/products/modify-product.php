<?php

include_once '../../models/ProductModel.php';

$productModel = new ProductModel();

$id = $_GET['id'];

$product = $productModel->getProductById($id);

?>

<!DOCTYPE html>
<html>

<head>

    <title>Modificar Producto</title>

</head>

<body>

    <h1>Modificar Producto</h1>
       <a href="../home.php">

    <button>

        Inicio

    </button>

</a>

    <form
    action="../../controllers/ProductController.php"
    method="POST"
    enctype="multipart/form-data">

        <input 
        type="hidden"
        name="id"
        value="<?php echo $product['id']; ?>">

        <label>Nombre:</label>
        <br>

        <input
        type="text"
        name="name"
        value="<?php echo $product['name']; ?>">

        <br><br>

        <label>Descripción:</label>
        <br>

        <textarea
        name="description"><?php echo $product['description']; ?></textarea>

        <br><br>

        <label>Precio:</label>
        <br>

        <input
        type="number"
        name="price"
        value="<?php echo $product['price']; ?>">

        <br><br>

        <label>Stock:</label>
        <br>

        <input
        type="number"
        name="stock"
        value="<?php echo $product['stock']; ?>">

        <br><br>

        <label>Nueva Imagen:</label>
        <br>

        <input type="file" name="image">

        <br><br>

        <button type="submit" name="update">

            Actualizar Producto

        </button>

    </form>

</body>

</html>