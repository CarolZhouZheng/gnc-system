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
<link rel="stylesheet" href="../../assets/css/style.css">
<style>
    .sale-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 40px;
        margin-top: 20px;
    }
    .cart-box {
        background-color: var(--gnc-bg-card);
        padding: 30px;
        border-radius: 16px;
        border: 1px solid var(--gnc-border);
    }
    .item-row {
        padding: 10px 0;
        border-bottom: 1px solid var(--gnc-border);
        display: flex;
        justify-content: space-between;
    }
    label {
        display: block;
        margin-bottom: 8px;
        color: var(--gnc-text-secondary);
        font-weight: 600;
    }
</style>
</head>
<body>
    <div class="navbar">
        <a href="../home.php" class="logo">
            <img src="../../assets/images/GNC_Logo.svg.png" alt="GNC Logo">
        </a>
        <div class="nav-actions">
            <a href="../logout.php" class="btn">Cerrar Sesión</a>
        </div>
    </div>

    <div class="container">
        <h1 class="title">Nueva Venta</h1>
        <p class="subtitle">Registra transacciones y actualiza el stock en tiempo real.</p>

        <div class="sale-grid">
            <div>
                <form action="../../controllers/SaleController.php" method="POST">
                    <div style="margin-bottom: 20px;">
                        <label>Producto:</label>
                        <select name="product_id">
                            <?php while($row = mysqli_fetch_assoc($products)) { ?>
                            <option value="<?php echo $row['id']; ?>">
                                <?php echo $row['name']; ?> - Stock: <?php echo $row['stock']; ?>
                            </option>
                            <?php } ?>
                        </select>
                    </div>

                    <div style="margin-bottom: 20px;">
                        <label>Cantidad:</label>
                        <input type="number" name="quantity" required>
                    </div>

                    <button type="submit" name="add_to_cart" class="btn add-btn" style="width: 100%;">
                        Añadir Producto
                    </button>
                </form>
            </div>

            <div class="cart-box">
                <h2>Carrito de Compras</h2>
                <div style="margin: 20px 0;">
                    <?php
                    $total = 0;
                    if(empty($_SESSION['cart'])) {
                        echo "<p style='color: var(--gnc-text-secondary);'>El carrito está vacío.</p>";
                    } else {
                        foreach($_SESSION['cart'] as $item) {
                            echo "
                            <div class='item-row'>
                                <span>{$item['product_name']} (x{$item['quantity']})</span>
                                <span style='color: var(--gnc-red); font-weight: bold;'>₡{$item['subtotal']}</span>
                            </div>";
                            $total += $item['subtotal'];
                        }
                    }
                    ?>
                </div>

                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
                    <h3>Total a Pagar:</h3>
                    <h2 style="color: var(--gnc-red);">₡<?php echo $total; ?></h2>
                </div>

                <form action="../../controllers/SaleController.php" method="POST">
                    <label>Método de Pago:</label>
                    <select name="payment_method_id" style="margin-bottom: 20px;">
                        <?php while($method = mysqli_fetch_assoc($paymentMethods)) { ?>
                        <option value="<?php echo $method['id']; ?>"><?php echo $method['name']; ?></option>
                        <?php } ?>
                    </select>
                    <button type="submit" name="finish_sale" class="btn" style="width: 100%; background: var(--gnc-red);">
                        Finalizar Venta
                    </button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

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
