<?php

include_once __DIR__ . '/../config/database.php';

class PaymentMethodModel {

    public function getMethods() {

        global $conn;

        $sql = "SELECT * FROM payment_methods";

        $result = mysqli_query($conn, $sql);

        return $result;

    }

    public function addMethod($name) {

        global $conn;

        $sql = "INSERT INTO payment_methods(name)

        VALUES('$name')";

        return mysqli_query($conn, $sql);

    }

    public function deleteMethod($id) {

        global $conn;

        $sql = "DELETE FROM payment_methods

        WHERE id = '$id'";

        return mysqli_query($conn, $sql);

    }

}

?>