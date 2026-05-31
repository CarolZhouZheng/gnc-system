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

$products = $saleModel->getProducts();

$paymentMethods = $saleModel->getPaymentMethods();

if(!isset($_SESSION['cart'])) {

    $_SESSION['cart'] = [];

}

?>

<!DOCTYPE html>

<html>

<head>


<title>Ventas</title>

<style>

    body{
        font-family: Arial;
        padding: 20px;
        background-color: #f4f4f4;
    }

    form{
        background: white;
        padding: 20px;
        width: 400px;
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

    .cart{
        background: white;
        padding: 20px;
        margin-top: 20px;
        width: 400px;
    }

</style>


</head>

<body>

<h1>Registrar Venta</h1>

<a href="../home.php">


<button>

    Inicio

</button>


</a>

<br><br>

<form
action="../../controllers/SaleController.php"
method="POST"
>


<label>Producto:</label>

<select name="product_id">

    <?php while($row = mysqli_fetch_assoc($products)) { ?>

    <option value="<?php echo $row['id']; ?>">

        <?php
        
        echo $row['name'];
        
        ?>

        -

        Stock:

        <?php
        
        echo $row['stock'];
        
        ?>

    </option>

    <?php } ?>

</select>

<label>Cantidad:</label>

<input
type="number"
name="quantity">

<button
type="submit"
name="add_to_cart"
>

    Añadir Producto

</button>


</form>

<div class="cart">

<h2>Carrito</h2>

<?php

$total = 0;

if(empty($_SESSION['cart'])) {

    echo "Carrito vacío";

} else {

    foreach($_SESSION['cart'] as $item) {

        echo "

        <p>

        {$item['product_name']}

        |

        Cantidad:
        {$item['quantity']}

        |

        Subtotal:
        ₡{$item['subtotal']}

        </p>

        ";

        $total += $item['subtotal'];

    }

}

?>

<h3>

Total:
₡<?php echo $total; ?>

</h3>

<form
action="../../controllers/SaleController.php"
method="POST"
>


<label>Método de Pago:</label>

<select name="payment_method_id">

    <?php while($method = mysqli_fetch_assoc($paymentMethods)) { ?>

    <option value="<?php echo $method['id']; ?>">

        <?php echo $method['name']; ?>

    </option>

    <?php } ?>

</select>

<button
type="submit"
name="finish_sale"
>

    Finalizar Venta

</button>


</form>

</div>

</body>

</html>
