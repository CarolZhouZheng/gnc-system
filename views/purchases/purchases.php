<?php

session_start();

if(!isset($_SESSION['user'])) {

    header("Location: ../login.php");

    exit();

}

include_once '../../models/PurchaseModel.php';

$purchaseModel = new PurchaseModel();

$result = $purchaseModel->getPurchases();

?>

<!DOCTYPE html>

<html>

<head>


<title>Pedidos a Proveedores</title>

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

    select{
        padding: 5px;
    }

</style>


</head>

<body>

<h1>Pedidos a Proveedores</h1>

<a href="../home.php">


<button>

    Inicio

</button>


</a>

<br><br>

<a href="add-purchase.php">


<button class="add-btn">

    Registrar Pedido

</button>


</a>

<br><br>

<table>


<tr>

    <th>ID</th>
    <th>Proveedor</th>
    <th>Producto</th>
    <th>Cajas</th>
    <th>Total</th>
    <th>Estado</th>
    <th>Fecha</th>

</tr>

<?php while($row = mysqli_fetch_assoc($result)) { ?>

<tr>

    <td>

        <?php echo $row['id']; ?>

    </td>

    <td>

        <?php echo $row['supplier']; ?>

    </td>

    <td>

        <?php echo $row['product_name']; ?>

    </td>

    <td>

        <?php echo $row['quantity_boxes']; ?>

    </td>

    <td>

        ₡<?php echo $row['total']; ?>

    </td>

    <td>

        <form
        method="POST"
        action="../../controllers/PurchaseController.php"
        >

            <input
            type="hidden"
            name="id"
            value="<?php echo $row['id']; ?>">

            <select
            name="status"
            onchange="this.form.submit()"
            >

                <option
                value="Pendiente"

                <?php
                
                if($row['status'] == 'Pendiente') {

                    echo 'selected';

                }
                
                ?>

                >

                    Pendiente

                </option>

                <option
                value="En camino"

                <?php
                
                if($row['status'] == 'En camino') {

                    echo 'selected';

                }
                
                ?>

                >

                    En camino

                </option>

                <option
                value="Recibido"

                <?php
                
                if($row['status'] == 'Recibido') {

                    echo 'selected';

                }
                
                ?>

                >

                    Recibido

                </option>

            </select>

            <input
            type="hidden"
            name="update_status"
            value="1">

        </form>

    </td>

    <td>

        <?php echo $row['purchase_date']; ?>

    </td>

</tr>

<?php } ?>


</table>

</body>

</html>
