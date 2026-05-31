<!DOCTYPE html>
<html>

<head>

    <title>Agregar Método</title>

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

<h1>Agregar Método de Pago</h1>

<form
method="POST"
action="../../controllers/PaymentMethodController.php"
>

    <input
    type="text"
    name="name"
    placeholder="Nombre">

    <button type="submit">

        Guardar

    </button>

</form>

</body>

</html>