<!DOCTYPE html>
<html>

<head>

    <title>Login</title>

</head>

<body>

    <h1>Iniciar Sesión</h1>

    <form
    action="../controllers/UserController.php"
    method="POST">

        <label>Correo:</label>

        <br>

        <input
        type="email"
        name="email">

        <br><br>

        <label>Contraseña:</label>

        <br>

        <input
        type="password"
        name="password">

        <br><br>

        <button type="submit">

            Ingresar

        </button>

    </form>

</body>

</html>