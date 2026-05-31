<?php

include_once __DIR__ . '/../config/database.php';

class PurchaseModel {

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

        $sql = "INSERT INTO purchases(
        
            supplier_id,
            product_name,
            quantity_boxes,
            total,
            status
        
        )

        VALUES(
        
            '$supplier_id',
            '$product_name',
            '$quantity_boxes',
            '$total',
            '$status'
        
        )";

        return mysqli_query($conn, $sql);

    }

    public function updateStatus(
        $id,
        $status
    ) {

        global $conn;

        $sql = "UPDATE purchases
        
        SET status = '$status'
        
        WHERE id = '$id'";

        return mysqli_query($conn, $sql);

    }

}
?>