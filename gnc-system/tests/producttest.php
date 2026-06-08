<?php

include_once '../models/ProductModel.php';

echo "<h1>Prueba Unitaria - Productos</h1>";

$productModel = new ProductModel();

$products = $productModel->getProducts();

if(is_array($products) || mysqli_num_rows($products) > 0) {

    echo "

    <h2 style='color: green;'>

        TEST EXITOSO

    </h2>

    <p>

        Los productos fueron obtenidos correctamente desde la base de datos.

    </p>

    ";

} else {

    echo "

    <h2 style='color: red;'>

        TEST FALLIDO

    </h2>

    <p>

        No se pudieron obtener productos.

    </p>

    ";

}

?>