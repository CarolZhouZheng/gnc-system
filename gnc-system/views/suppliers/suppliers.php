<?php

session_start();

if(!isset($_SESSION['user'])) {

    header("Location: ../login.php");

    exit();

}

include_once '../../models/SupplierModel.php';

$supplierModel = new SupplierModel();

$result = $supplierModel->getSuppliers();

?>

<!DOCTYPE html>
<html>

<head>

    <title>Proveedores</title>

    <style>

        body{
            font-family: Arial;
            padding: 20px;
            background-color: #f4f4f4;
        }

        table{
            width: 100%;
            border-collapse: collapse;
            background: white;
        }

        th, td{
            border: 1px solid #ccc;
            padding: 10px;
            text-align: center;
        }

        th{
            background-color: black;
            color: white;
        }

        button{
            padding: 10px;
            border: none;
            color: white;
            cursor: pointer;
        }

        .add-btn{
            background-color: black;
        }

        .delete-btn{
            background-color: red;
        }

    </style>

</head>

<body>

<h1>Lista de Proveedores</h1>

<a href="../home.php">

    <button>

        Inicio

    </button>

</a>

<br><br>

<a href="add-supplier.php">

    <button class="add-btn">

        Agregar Proveedor

    </button>

</a>

<br><br>

<table>

    <tr>

        <th>ID</th>
        <th>Nombre</th>
        <th>Teléfono</th>
        <th>Email</th>
        <th>Dirección</th>
        <th>Acciones</th>

    </tr>

    <?php while($row = mysqli_fetch_assoc($result)) { ?>

    <tr>

        <td>

            <?php echo $row['id']; ?>

        </td>

        <td>

            <?php echo $row['name']; ?>

        </td>

        <td>

            <?php echo $row['phone']; ?>

        </td>

        <td>

            <?php echo $row['email']; ?>

        </td>

        <td>

            <?php echo $row['address']; ?>

        </td>

        <td>

            <a href="../../controllers/SupplierController.php?id=<?php echo $row['id']; ?>">

                <button class="delete-btn">

                    Eliminar

                </button>

            </a>

        </td>

    </tr>

    <?php } ?>

</table>

</body>

</html>