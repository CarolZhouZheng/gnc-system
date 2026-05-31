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

    $sale_id = $saleModel->createSale(
        $total,
        $user_id,
        $payment_method_id
    );

    foreach($_SESSION['cart'] as $item) {

        $saleModel->addSaleDetail(
            $sale_id,
            $item['product_id'],
            $item['quantity'],
            $item['subtotal']
        );

    }

    $_SESSION['cart'] = [];

    header("Location: ../views/sales/sales-history.php");

}

?>
