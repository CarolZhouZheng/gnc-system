<?php

include_once __DIR__ . '/../config/database.php';
class ProductModel {

    public function getProducts() {

        global $conn;

        $sql = "SELECT * FROM products";

        return mysqli_query($conn, $sql);
    }

    public function getProductById($id) {

        global $conn;

        $sql = "SELECT * FROM products
        WHERE id = '$id'";

        $result = mysqli_query($conn, $sql);

        return mysqli_fetch_assoc($result);
    }

    public function addProduct(
        $category_id,
        $name,
        $description,
        $price,
        $stock,
        $image
    ) {

        global $conn;

        $sql = "INSERT INTO products(
            category_id,
            name,
            description,
            price,
            stock,
            image
        )

        VALUES(
            '$category_id',
            '$name',
            '$description',
            '$price',
            '$stock',
            '$image'
        )";

        return mysqli_query($conn, $sql);

    }

    public function updateProduct(
        $id,
        $name,
        $description,
        $price,
        $stock,
        $image
    ) {

        global $conn;

        $sql = "UPDATE products SET

        name = '$name',
        description = '$description',
        price = '$price',
        stock = '$stock',
        image = '$image'

        WHERE id = '$id'";

        return mysqli_query($conn, $sql);

    }

    public function deleteProduct($id) {

        global $conn;

        $sql = "DELETE FROM products
        WHERE id = '$id'";

        return mysqli_query($conn, $sql);

    }

}

?>