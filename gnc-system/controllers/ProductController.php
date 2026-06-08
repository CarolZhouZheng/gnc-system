<?php

include_once '../models/ProductModel.php';

$productModel = new ProductModel();

if($_SERVER['REQUEST_METHOD'] == 'POST' && !isset($_POST['update'])) {

    $category_id = $_POST['category_id'];

    $name = trim($_POST['name']);

    $description = trim($_POST['description']);

    $price = $_POST['price'];

    $stock = $_POST['stock'];

    if(
        empty($name) ||
        empty($description) ||
        empty($price) ||
        empty($stock)
    ) {

        echo "

        <h1>

            Todos los campos son obligatorios

        </h1>

        <a href='../views/products/add-product.php'>

            Volver

        </a>

        ";

        exit();

    }

    if($price <= 0) {

        echo "

        <h1>

            Precio inválido

        </h1>

        <a href='../views/products/add-product.php'>

            Volver

        </a>

        ";

        exit();

    }

    if($stock < 0) {

        echo "

        <h1>

            Stock inválido

        </h1>

        <a href='../views/products/add-product.php'>

            Volver

        </a>

        ";

        exit();

    }

    $imageName = $_FILES['image']['name'];

    $tempName = $_FILES['image']['tmp_name'];

    move_uploaded_file(
        $tempName,
        "../assets/images/" . $imageName
    );

    $productModel->addProduct(
        $category_id,
        $name,
        $description,
        $price,
        $stock,
        $imageName
    );

    header("Location: ../views/products/products.php");

}

if(isset($_POST['update'])) {

    $id = $_POST['id'];

    $name = trim($_POST['name']);

    $description = trim($_POST['description']);

    $price = $_POST['price'];

    $stock = $_POST['stock'];

    if(
        empty($name) ||
        empty($description) ||
        empty($price) ||
        empty($stock)
    ) {

        echo "

        <h1>

            Todos los campos son obligatorios

        </h1>

        <a href='../views/products/modify-product.php?id=$id'>

            Volver

        </a>

        ";

        exit();

    }

    if($price <= 0) {

        echo "

        <h1>

            Precio inválido

        </h1>

        <a href='../views/products/modify-product.php?id=$id'>

            Volver

        </a>

        ";

        exit();

    }

    if($stock < 0) {

        echo "

        <h1>

            Stock inválido

        </h1>

        <a href='../views/products/modify-product.php?id=$id'>

            Volver

        </a>

        ";

        exit();

    }

    $product = $productModel->getProductById($id);

    $imageName = $product['image'];

    if(!empty($_FILES['image']['name'])) {

        $imageName = $_FILES['image']['name'];

        $tempName = $_FILES['image']['tmp_name'];

        move_uploaded_file(
            $tempName,
            "../assets/images/" . $imageName
        );

    }

    $productModel->updateProduct(
        $id,
        $name,
        $description,
        $price,
        $stock,
        $imageName
    );

    header("Location: ../views/products/products.php");

}

if(isset($_GET['id'])) {

    $id = $_GET['id'];

    $productModel->deleteProduct($id);

    header("Location: ../views/products/products.php");

}

?>