<?php

include_once '../../models/PurchaseModel.php';

$purchaseModel = new PurchaseModel();

$suppliers = $purchaseModel->getSuppliers();

?>

<!DOCTYPE html>

<html>

<head>


<title>Registrar Pedido</title>

<style>

    body{
        font-family: Arial;
        padding: 20px;
        background-color: #f4f4f4;
    }

    form{
        background: white;
        width: 400px;
        padding: 20px;
    }

    select, input{
        width: 100%;
        padding: 10px;
        margin-top: 10px;
    }

    button{
        margin-top: 15px;
        padding: 10px;
        background-color: black;
        color: white;
        border: none;
        cursor: pointer;
    }

</style>


</head>

<body>

<h1>Registrar Pedido</h1>

<form
method="POST"
action="../../controllers/PurchaseController.php"
>

<select name="supplier_id">

    <option value="">

        Seleccione proveedor

    </option>

    <?php while($row = mysqli_fetch_assoc($suppliers)) { ?>

    <option value="<?php echo $row['id']; ?>">

        <?php echo $row['name']; ?>

    </option>

    <?php } ?>

</select>

<input
type="text"
name="product_name"
placeholder="Producto solicitado">

<input
type="number"
name="quantity_boxes"
placeholder="Cantidad de cajas">

<input
type="number"
name="total"
placeholder="Costo total">

<select name="status">

    <option value="Pendiente">

        Pendiente

    </option>

    <option value="En camino">

        En camino

    </option>

    <option value="Recibido">

        Recibido

    </option>

</select>

<button type="submit">

    Registrar Pedido

</button>


</form>

</body>

</html>
