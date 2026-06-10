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

        $sql = "SELECT * FROM products WHERE id = ?";

        $stmt = mysqli_prepare($conn, $sql);

        mysqli_stmt_bind_param($stmt, "i", $id);

        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);

        return mysqli_fetch_assoc($result);

    }

   public function getLowStockProducts() {

global $conn;

$sql = "SELECT * FROM products
        WHERE stock < 5
        AND stock > 0";

return mysqli_query($conn, $sql);


}


    public function getOutOfStockProducts() {

        global $conn;

        $sql = "SELECT * FROM view_out_of_stock_products";

        return mysqli_query($conn, $sql);

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

        $sql = "INSERT INTO products (
            category_id,
            name,
            description,
            price,
            stock,
            image
        ) VALUES (?, ?, ?, ?, ?, ?)";

        $stmt = mysqli_prepare($conn, $sql);

        mysqli_stmt_bind_param(
            $stmt,
            "issdis",
            $category_id,
            $name,
            $description,
            $price,
            $stock,
            $image
        );

        return mysqli_stmt_execute($stmt);

    }

    public function updateProduct(
        $id,
        $category_id,
        $name,
        $description,
        $price,
        $stock,
        $image
    ) {

        global $conn;

        $sql = "UPDATE products SET
            category_id = ?,
            name = ?,
            description = ?,
            price = ?,
            stock = ?,
            image = ?
        WHERE id = ?";

        $stmt = mysqli_prepare($conn, $sql);

        mysqli_stmt_bind_param(
            $stmt,
            "issdisi",
            $category_id,
            $name,
            $description,
            $price,
            $stock,
            $image,
            $id
        );

        return mysqli_stmt_execute($stmt);

    }

    public function deleteProduct($id) {

        global $conn;

        $sql = "DELETE FROM products WHERE id = ?";

        $stmt = mysqli_prepare($conn, $sql);

        mysqli_stmt_bind_param($stmt, "i", $id);

        return mysqli_stmt_execute($stmt);

    }

    public function getCategories() {

        global $conn;

        $sql = "SELECT * FROM categories";

        return mysqli_query($conn, $sql);

    }

    public function getProductsByCategory($category_id) {

        global $conn;

        $sql = "SELECT * FROM products
                WHERE category_id = '$category_id'";

        return mysqli_query($conn, $sql);

    }

}

?>
