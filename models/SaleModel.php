<?php

include_once __DIR__ . '/../config/database.php';

class SaleModel {

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

        $sql = "SELECT * FROM products
        
        WHERE id = '$product_id'";

        $result = mysqli_query($conn, $sql);

        return mysqli_fetch_assoc($result);

    }

    public function createSale(
        $total,
        $user_id,
        $payment_method_id
    ) {

        global $conn;

        $sql = "INSERT INTO sales(
        
            user_id,
            payment_method_id,
            total,
            sale_date
        
        )

        VALUES(
        
            '$user_id',
            '$payment_method_id',
            '$total',
            NOW()
        
        )";

        mysqli_query($conn, $sql);

        return mysqli_insert_id($conn);

    }

 public function addSaleDetail(
$sale_id,
$product_id,
$quantity,
$subtotal
) {

$conn = $this->getConnection();

$sql = "INSERT INTO sale_details(

    sale_id,
    product_id,
    quantity,
    subtotal

)

VALUES(

    ?,
    ?,
    ?,
    ?

)";

$stmt = mysqli_prepare($conn, $sql);

if (!$stmt) {

    return false;

}

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