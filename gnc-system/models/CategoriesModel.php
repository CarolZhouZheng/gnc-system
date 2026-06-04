<?php

include_once __DIR__ . '/../config/database.php';
class ProductModel {

    public function getProducts() {

        global $conn;

        $sql = "SELECT * FROM products";

        $result = mysqli_query($conn, $sql);

        return $result;
    }

}

?>