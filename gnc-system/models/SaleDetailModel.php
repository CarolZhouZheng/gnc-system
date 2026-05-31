<?php

include_once __DIR__ . '/../config/database.php';
class SaleDetailModel {

    public function createSaleDetail(
        $sale_id,
        $product_id,
        $quantity,
        $subtotal
    ) {

        global $conn;

        $sql = "CALL register_sale_detail(
        
            '$sale_id',
            '$product_id',
            '$quantity',
            '$subtotal'
        
        )";

        return mysqli_query($conn, $sql);

    }

}

?>