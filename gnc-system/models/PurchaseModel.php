<?php

include_once __DIR__ . '/../config/database.php';

class PurchaseModel {

    public function getConnection() {
        global $conn;
        return $conn;
    }

    public function getPurchases() {

        global $conn;

        $sql = "SELECT purchases.*,
        
        suppliers.name AS supplier
        
        FROM purchases
        
        INNER JOIN suppliers
        
        ON purchases.supplier_id = suppliers.id";

        $result = mysqli_query($conn, $sql);

        return $result;

    }

    public function getSuppliers() {

        global $conn;

        $sql = "SELECT * FROM suppliers";

        $result = mysqli_query($conn, $sql);

        return $result;

    }

    public function addPurchase(
        $supplier_id,
        $product_name,
        $quantity_boxes,
        $total,
        $status
    ) {

        global $conn;

        $sql = "INSERT INTO purchases (
            supplier_id,
            product_name,
            quantity_boxes,
            total,
            status
        ) VALUES (?, ?, ?, ?, ?)";

        $stmt = mysqli_prepare($conn, $sql);

        mysqli_stmt_bind_param($stmt, "isids", $supplier_id, $product_name, $quantity_boxes, $total, $status);

        if (mysqli_stmt_execute($stmt)) {
            return mysqli_insert_id($conn);
        }

        return false;

    }

    public function addPurchaseDetail(
        $purchase_id,
        $product_id,
        $quantity,
        $subtotal
    ) {

        global $conn;

        $sql = "INSERT INTO purchase_details (
            purchase_id,
            product_id,
            quantity,
            subtotal
        ) VALUES (?, ?, ?, ?)";

        $stmt = mysqli_prepare($conn, $sql);

        mysqli_stmt_bind_param($stmt, "iiid", $purchase_id, $product_id, $quantity, $subtotal);

        return mysqli_stmt_execute($stmt);

    }

    public function updateStatus(
        $id,
        $status
    ) {

        global $conn;

        $sql = "UPDATE purchases SET status = ? WHERE id = ?";

        $stmt = mysqli_prepare($conn, $sql);

        mysqli_stmt_bind_param($stmt, "si", $status, $id);

        return mysqli_stmt_execute($stmt);

    }

}
?>