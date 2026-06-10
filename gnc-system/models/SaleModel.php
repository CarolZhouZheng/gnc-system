<?php

include_once __DIR__ . '/../config/database.php';

class SaleModel {

    public function getConnection() {

        global $conn;

        return $conn;

    }

    public function getSales() {

        global $conn;

        $sql = "SELECT * FROM view_sales_history";

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
        $product = mysqli_fetch_assoc($result);
        
        mysqli_stmt_close($stmt);
        return $product;

    }

    public function getProductStockForUpdate($product_id) {

        global $conn;

        $sql = "SELECT * FROM products WHERE id = ? FOR UPDATE";

        $stmt = mysqli_prepare($conn, $sql);

        mysqli_stmt_bind_param($stmt, "i", $product_id);

        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);
        $product = mysqli_fetch_assoc($result);

        mysqli_stmt_close($stmt);
        return $product;

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

        mysqli_stmt_bind_param(
            $stmt,
            "iid",
            $user_id,
            $payment_method_id,
            $total
        );

        if (mysqli_stmt_execute($stmt)) {
            $id = mysqli_insert_id($conn);
            mysqli_stmt_close($stmt);
            return $id;
        }

        mysqli_stmt_close($stmt);
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

        mysqli_stmt_bind_param(
            $stmt,
            "iiid",
            $sale_id,
            $product_id,
            $quantity,
            $subtotal
        );

        $result = mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        
        return $result;

    }

}

?>