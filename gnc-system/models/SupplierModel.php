<?php

include_once __DIR__ . '/../config/database.php';

class SupplierModel {

    public function getSuppliers() {

        global $conn;

        $sql = "SELECT * FROM suppliers";

        $result = mysqli_query($conn, $sql);

        return $result;

    }

    public function getSupplierById($id) {

        global $conn;

        $sql = "SELECT * FROM suppliers WHERE id = '$id'";

        $result = mysqli_query($conn, $sql);

        $sql = "SELECT * FROM suppliers WHERE id = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        return mysqli_fetch_assoc($result);
    }

    public function addSupplier(
        $name,
        $phone,
        $email,
        $address
    ) {

        global $conn;

        $sql = "INSERT INTO suppliers(
        
            name,
            phone,
            email,
            address
        
        )
        $sql = "INSERT INTO suppliers (name, phone, email, address) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "ssss", $name, $phone, $email, $address);
        return mysqli_stmt_execute($stmt);

        VALUES(
        
            '$name',
            '$phone',
            '$email',
            '$address'
        
        )";

        return mysqli_query($conn, $sql);

    }

    public function updateSupplier(
        $id,
        $name,
        $phone,
        $email,
        $address
    ) {

        global $conn;

        $sql = "UPDATE suppliers SET 
                name = '$name', 
                phone = '$phone', 
                email = '$email', 
                address = '$address' 
                WHERE id = '$id'";

        return mysqli_query($conn, $sql);

    }

    public function deleteSupplier($id) {

        global $conn;

        $sql = "DELETE FROM suppliers
        
        WHERE id = '$id'";

        return mysqli_query($conn, $sql);

    }

}
?>