<?php

session_start();

$inactive = 300;

if(isset($_SESSION['timeout'])) {

    $sessionLife = time() - $_SESSION['timeout'];

    if($sessionLife > $inactive) {

        session_unset();

        session_destroy();

        header("Location: ../login.php");

        exit();

    }

}

$_SESSION['timeout'] = time();

if(!isset($_SESSION['user'])) {

    header("Location: ../login.php");

    exit();

}

include_once '../../models/SaleModel.php';

$saleModel = new SaleModel();

$sales = $saleModel->getSales();

?>

<!DOCTYPE html>
<html>

<head>

    <title>Historial de Ventas</title>

    <style>

        body{
            font-family: Arial;
            background-color: #f4f4f4;
            padding: 20px;
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

    </style>

</head>

<body>

    <h1>Historial de Ventas</h1>
       <a href="../home.php">

    <button>

        Inicio

    </button>

</a>

    <table>

        <tr>

            <th>ID</th>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Total</th>
            <th>Usuario</th>

        </tr>

        <?php while($row = mysqli_fetch_assoc($sales)) { ?>

        <tr>

            <td>

                <?php echo $row['id']; ?>

            </td>

            <td>

                <?php echo $row['product_name']; ?>

            </td>

            <td>

                <?php echo $row['quantity']; ?>

            </td>

            <td>

                ₡<?php echo $row['total']; ?>

            </td>
            
            <td>

                <?php echo $row['user_name']; ?>

            </td>


        </tr>

        <?php } ?>

    </table>

</body>

</html>