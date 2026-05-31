<?php

include_once '../models/PurchaseModel.php';

$purchaseModel = new PurchaseModel();

if($_SERVER['REQUEST_METHOD'] == 'POST' && !isset($_POST['update_status'])) {

    $supplier_id = $_POST['supplier_id'];

    $product_name = trim($_POST['product_name']);

    $quantity_boxes = $_POST['quantity_boxes'];

    $total = $_POST['total'];

    $status = $_POST['status'];

    if(
        empty($supplier_id) ||
        empty($product_name) ||
        empty($quantity_boxes) ||
        empty($total) ||
        empty($status)
    ) {

        echo "

        <h1>

            Todos los campos son obligatorios

        </h1>

        <a href='../views/purchases/add-purchase.php'>

            Volver

        </a>

        ";

        exit();

    }

    if($quantity_boxes <= 0) {

        echo "

        <h1>

            Cantidad inválida

        </h1>

        ";

        exit();

    }

    if($total <= 0) {

        echo "

        <h1>

            Total inválido

        </h1>

        ";

        exit();

    }

    $purchaseModel->addPurchase(
        $supplier_id,
        $product_name,
        $quantity_boxes,
        $total,
        $status
    );

    header("Location: ../views/purchases/purchases.php");

}

if(isset($_POST['update_status'])) {

    $id = $_POST['id'];

    $status = $_POST['status'];

    $purchaseModel->updateStatus(
        $id,
        $status
    );

    header("Location: ../views/purchases/purchases.php");

}

?>
