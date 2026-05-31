<?php

session_start();

if(!isset($_SESSION['user'])) {

    header("Location: ../login.php");

    exit();

}

include_once '../../models/PaymentMethodModel.php';

$paymentModel = new PaymentMethodModel();

$result = $paymentModel->getMethods();

?>

<!DOCTYPE html>
<html>

<head>

    <title>Métodos de Pago</title>

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

<h1>Métodos de Pago</h1>

<a href="../home.php">

    <button>

        Inicio

    </button>

</a>

<br><br>

<a href="add-method.php">

    <button class="add-btn">

        Agregar Método

    </button>

</a>

<br><br>

<table>

    <tr>

        <th>ID</th>
        <th>Nombre</th>
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

            <a href="../../controllers/PaymentMethodController.php?id=<?php echo $row['id']; ?>">

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