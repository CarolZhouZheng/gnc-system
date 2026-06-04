<?php

include_once '../models/PaymentMethodModel.php';

$paymentModel = new PaymentMethodModel();

if($_SERVER['REQUEST_METHOD'] == 'POST') {

    $name = trim($_POST['name']);

    if(empty($name)) {

        echo "

        <h1>

            El nombre es obligatorio

        </h1>

        <a href='../views/payment_methods/add-method.php'>

            Volver

        </a>

        ";

        exit();

    }

    $paymentModel->addMethod($name);

    header("Location: ../views/payment_methods/payment-methods.php");

}

if(isset($_GET['id'])) {

    $id = $_GET['id'];

    $paymentModel->deleteMethod($id);

    header("Location: ../views/payment_methods/payment-methods.php");

}

?>