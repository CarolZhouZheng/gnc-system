<?php

session_start();

include_once '../models/SaleModel.php';

$saleModel = new SaleModel();

if(!isset($_SESSION['cart'])) {

    $_SESSION['cart'] = [];

}

if(isset($_POST['add_to_cart'])) {

    $product_id = $_POST['product_id'];

    $quantity = $_POST['quantity'];

    if(empty($quantity) || $quantity <= 0) {

        echo "

        <h1>

            Cantidad inválida

        </h1>

        <a href='../views/sales/sales.php'>

            Volver

        </a>

        ";

        exit();

    }

    $product = $saleModel->getProductStock($product_id);

    if($quantity > $product['stock']) {

        echo "

        <h1>

            Stock insuficiente

        </h1>

        <a href='../views/sales/sales.php'>

            Volver

        </a>

        ";

        exit();

    }

    $subtotal = $product['price'] * $quantity;

    $_SESSION['cart'][] = [

        'product_id' => $product_id,

        'product_name' => $product['name'],

        'quantity' => $quantity,

        'subtotal' => $subtotal

    ];

    header("Location: ../views/sales/sales.php");

}

if(isset($_POST['finish_sale'])) {

    if(empty($_SESSION['cart'])) {

        echo "

        <h1>

            Carrito vacío

        </h1>

        ";

        exit();

    }

    $payment_method_id = $_POST['payment_method_id'];

    $total = 0;

    foreach($_SESSION['cart'] as $item) {

        $total += $item['subtotal'];

    }

    $user_id = $_SESSION['user']['id'];
    $conn = $saleModel->getConnection();

    // Iniciar transacción explícita
    mysqli_begin_transaction($conn);

    try {
        $sale_id = $saleModel->createSale(
            $total,
            $user_id,
            $payment_method_id
        );

        if (!$sale_id) {
            throw new Exception("No se pudo registrar la cabecera de la venta.");
        }

        foreach($_SESSION['cart'] as $item) {
            // Bloqueo de fila para evitar condiciones de carrera concurrentes (Aislamiento)
            $product = $saleModel->getProductStockForUpdate($item['product_id']);
            if (!$product) {
                throw new Exception("Producto no encontrado.");
            }

            if ($item['quantity'] > $product['stock']) {
                throw new Exception("Stock insuficiente para " . $product['name'] . ". Disponible: " . $product['stock']);
            }

            $detail_inserted = $saleModel->addSaleDetail(
                $sale_id,
                $item['product_id'],
                $item['quantity'],
                $item['subtotal']
            );

            if (!$detail_inserted) {
                throw new Exception("Error al insertar el detalle de la venta.");
            }
        }

        // Si todo va bien, confirmar la transacción (Commit)
        mysqli_commit($conn);

        $_SESSION['cart'] = [];

        header("Location: ../views/sales/sales-history.php");
        exit();

    } catch (Exception $e) {
        // Ante cualquier error, deshacer todos los cambios (Rollback)
        mysqli_rollback($conn);

        echo "
        <div style='font-family: sans-serif; padding: 20px; text-align: center;'>
            <h1 style='color: #d9534f;'>Error en la Transacción</h1>
            <p>" . htmlspecialchars($e->getMessage()) . "</p>
            <a href='../views/sales/sales.php' style='display: inline-block; padding: 10px 20px; background: #0275d8; color: white; text-decoration: none; border-radius: 4px;'>Volver al carrito</a>
        </div>
        ";
        exit();
    }

}

?>
