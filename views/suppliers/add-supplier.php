<!DOCTYPE html>
<html>

<head>

    <title>Agregar Proveedor</title>

    <style>

        body{
            font-family: Arial;
            background-color: #f4f4f4;
            padding: 20px;
        }

        form{
            background: white;
            padding: 20px;
            width: 400px;
        }

        input{
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

<h1>Agregar Proveedor</h1>

<form
method="POST"
action="../../controllers/SupplierController.php"
>

    <input
    type="text"
    name="name"
    placeholder="Nombre">

    <input
    type="text"
    name="phone"
    placeholder="Teléfono">

    <input
    type="email"
    name="email"
    placeholder="Correo">

    <input
    type="text"
    name="address"
    placeholder="Dirección">

    <button type="submit">

        Guardar

    </button>

</form>

</body>

</html>