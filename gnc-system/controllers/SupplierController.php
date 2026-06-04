<?php

include_once '../models/SupplierModel.php';

$supplierModel = new SupplierModel();

if($_SERVER['REQUEST_METHOD'] == 'POST' && !isset($_POST['update'])) {

    $name = trim($_POST['name']);

    $phone = trim($_POST['phone']);

    $email = trim($_POST['email']);

    $address = trim($_POST['address']);

    if(
        empty($name) ||
        empty($phone) ||
        empty($email) ||
        empty($address)
    ) {

        echo "

        <h1>

            Todos los campos son obligatorios

        </h1>

        <a href='../views/suppliers/add-supplier.php'>

            Volver

        </a>

        ";

        exit();

    }

    $supplierModel->addSupplier(
        $name,
        $phone,
        $email,
        $address
    );

    header("Location: ../views/suppliers/suppliers.php");

}

if(isset($_POST['update'])) {

    $id = $_POST['id'];
    $name = trim($_POST['name']);
    $phone = trim($_POST['phone']);
    $email = trim($_POST['email']);
    $address = trim($_POST['address']);

    if(
        empty($name) ||
        empty($phone) ||
        empty($email) ||
        empty($address)
    ) {

        echo "

        <h1>

            Todos los campos son obligatorios

        </h1>

        <a href='../views/suppliers/modify-supplier.php?id=$id'>

            Volver

        </a>

        ";

        exit();

    }

    $supplierModel->updateSupplier(
        $id,
        $name,
        $phone,
        $email,
        $address
    );

    header("Location: ../views/suppliers/suppliers.php");

}

if(isset($_GET['id'])) {

    $id = $_GET['id'];

    $supplierModel->deleteSupplier($id);

    header("Location: ../views/suppliers/suppliers.php");

}

?>