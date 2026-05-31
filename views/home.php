<?php

session_start();

if(!isset($_SESSION['user'])) {

    header("Location: login.php");

    exit();

}

header("Cache-Control: no-cache, no-store, must-revalidate");

header("Pragma: no-cache");

header("Expires: 0");

?>

<!DOCTYPE html>

<html lang="es">

<head>

```
<meta charset="UTF-8">

<title>GNC SYSTEM</title>

<link
rel="stylesheet"
href="../assets/css/style.css">
```

</head>

<body>

```
<a href="logout.php">

    <button>

        Cerrar Sesión

    </button>

</a>

<br><br>

<div class="navbar">

    <div class="logo">

        <img
        src="../assets/images/GNC_Logo.svg.png">

    </div>

</div>

<div class="container">

    <h1 class="title">

        GNC System

    </h1>

    <p class="subtitle">

        Administración premium de inventario,
        ventas y control de suplementos.

    </p>

    <div class="cards">

        <div class="card">

            <h2>

                Productos

            </h2>

            <p>

                Gestiona inventario.

            </p>

            <a href="products/products.php">

                <button class="btn">

                    Entrar

                </button>

            </a>

        </div>

        <div class="card">

            <h2>

                Ventas

            </h2>

            <p>

                Registra ventas
                con control de stock.

            </p>

            <a href="sales/sales.php">

                <button class="btn">

                    Entrar

                </button>

            </a>

        </div>

        <div class="card">

            <h2>

                Historial

            </h2>

            <p>

                Consulta ventas realizadas
                y detalles de transacciones.

            </p>

            <a href="sales/sales-history.php">

                <button class="btn">

                    Entrar

                </button>

            </a>

        </div>

        <div class="card">

            <h2>

                Proveedores

            </h2>

            <p>

                Gestiona proveedores
                del sistema.

            </p>

            <a href="suppliers/suppliers.php">

                <button class="btn">

                    Entrar

                </button>

            </a>

        </div>

        <div class="card">

            <h2>

                Métodos de Pago

            </h2>

            <p>

                Administra métodos
                de pago disponibles.

            </p>

            <a href="payment_methods/payment-methods.php">

                <button class="btn">

                    Entrar

                </button>

            </a>

        </div>

        <div class="card">

            <h2>

                Pedidos

            </h2>

            <p>

                Registra pedidos
                realizados a proveedores.

            </p>

            <a href="purchases/purchases.php">

                <button class="btn">

                    Entrar

                </button>

            </a>

        </div>

    </div>

</div>
```

</body>

</html>
