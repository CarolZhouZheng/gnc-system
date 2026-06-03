<?php

include_once __DIR__ . '/../config/database.php';

class SaleModel {

    public function getConnection() {
        global $conn;
        return $conn;
    }

    public function getSales() {

        global $conn;

        $sql = "SELECT 
        
        sales.*,

        users.name AS user_name,

        products.name AS product_name,

        payment_methods.name AS payment_method,

        sale_details.quantity

        FROM sale_details

        INNER JOIN sales
        ON sale_details.sale_id = sales.id

        INNER JOIN products
        ON sale_details.product_id = products.id

        INNER JOIN users
        ON sales.user_id = users.id

        INNER JOIN payment_methods
        ON sales.payment_method_id = payment_methods.id";

        return mysqli_query($conn, $sql);

    }

    public function getProducts() {

        global $conn;

        $sql = "SELECT * FROM products";

        return mysqli_query($conn, $sql);

    }

    public function getPaymentMethods() {

        global $conn;

        $sql = "SELECT * FROM payment_methods";

        return mysqli_query($conn, $sql);

    }

    public function getProductStock($product_id) {

        global $conn;

        $sql = "SELECT * FROM products WHERE id = ?";

        $stmt = mysqli_prepare($conn, $sql);

        mysqli_stmt_bind_param($stmt, "i", $product_id);

        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);

        return mysqli_fetch_assoc($result);

    }

    public function getProductStockForUpdate($product_id) {

        global $conn;

        $sql = "SELECT * FROM products WHERE id = ? FOR UPDATE";

        $stmt = mysqli_prepare($conn, $sql);

        mysqli_stmt_bind_param($stmt, "i", $product_id);

        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);

        return mysqli_fetch_assoc($result);

    }

    public function createSale(
        $total,
        $user_id,
        $payment_method_id
    ) {

        global $conn;

        $sql = "INSERT INTO sales (
            user_id,
            payment_method_id,
            total,
            sale_date
        ) VALUES (?, ?, ?, NOW())";

        $stmt = mysqli_prepare($conn, $sql);

        mysqli_stmt_bind_param($stmt, "iid", $user_id, $payment_method_id, $total);

        if (mysqli_stmt_execute($stmt)) {
            return mysqli_insert_id($conn);
        }

        return false;

    }

    public function addSaleDetail(
        $sale_id,
        $product_id,
        $quantity,
        $subtotal
    ) {

        global $conn;

        $sql = "INSERT INTO sale_details (
            sale_id,
            product_id,
            quantity,
            subtotal
        ) VALUES (?, ?, ?, ?)";

        $stmt = mysqli_prepare($conn, $sql);

        mysqli_stmt_bind_param($stmt, "iiid", $sale_id, $product_id, $quantity, $subtotal);

        return mysqli_stmt_execute($stmt);

    }

}
?>
