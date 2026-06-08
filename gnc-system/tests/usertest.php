<?php

include_once '../models/UserModel.php';

echo "<h1>Prueba Unitaria - Login</h1>";

$userModel = new UserModel();

$user = $userModel->login(
    "pancho@gmail.com",
    "pancho1234"
);

if($user) {

    echo "

    <h2 style='color: green;'>

        TEST EXITOSO

    </h2>

    <p>

        El usuario inició sesión correctamente.

    </p>

    ";

} else {

    echo "

    <h2 style='color: red;'>

        TEST FALLIDO

    </h2>

    <p>

        El login no funcionó.

    </p>

    ";

}

?>  