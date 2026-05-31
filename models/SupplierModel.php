<?php

include_once __DIR__ . '/../config/database.php';

class SupplierModel {

    public function getSuppliers() {

        global $conn;

        $sql = "SELECT * FROM suppliers";

        $result = mysqli_query($conn, $sql);

        return $result;

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

        VALUES(
        
            '$name',
            '$phone',
            '$email',
            '$address'
        
        )";

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