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

include_once '../../models/ProductModel.php';

$productModel = new ProductModel();

$result = $productModel->getProducts();

?>

<!DOCTYPE html>
<html>

<head>

    <title>Productos</title>

    <style>

        body{
            font-family: Arial;
            background-color: #f4f4f4;
            padding: 20px;
        }

        h1{
            color: #333;
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
            background-color: #222;
            color: white;
        }

        img{
            width: 80px;
            height: 80px;
            object-fit: cover;
        }

        button{
            padding: 10px;
            color: white;
            border: none;
            cursor: pointer;
        }

        .add-btn{
            background-color: black;
        }

        .edit-btn{
            background-color: orange;
        }

        .delete-btn{
            background-color: red;
        }

    </style>

</head>

<body>

    <h1>Lista de Productos</h1>

    <a href="../home.php">

        <button>

            Inicio

        </button>

    </a>

    <br><br>

    <a href="add-product.php">

        <button class="add-btn">

            Agregar Producto

        </button>

    </a>

    <br><br>

    <table>

        <tr>

            <th>ID</th>
            <th>Imagen</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Precio</th>
            <th>Stock</th>
            <th>Acciones</th>

        </tr>

        <?php while($row = mysqli_fetch_assoc($result)) { ?>

        <tr>

            <td>

                <?php echo $row['id']; ?>

            </td>

            <td>

                <img 
                src="../../assets/images/<?php echo $row['image']; ?>">

            </td>

            <td>

                <?php echo $row['name']; ?>

            </td>

            <td>

                <?php echo $row['description']; ?>

            </td>

            <td>

                ₡<?php echo $row['price']; ?>

            </td>

            <td>

                <?php echo $row['stock']; ?>

            </td>

            <td>

                <a href="modify-product.php?id=<?php echo $row['id']; ?>">

                    <button class="edit-btn">

                        Editar

                    </button>

                </a>

                <a href="../../controllers/ProductController.php?id=<?php echo $row['id']; ?>">

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