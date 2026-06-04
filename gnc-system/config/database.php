<?php

$host = "127.0.0.1";

$user = "root";

$password = "";

$database = "gncproyecto";

$port = 3306; // Puerto por defecto 

// Si existe un archivo de configuración local personalizado, sobreescribimos las variables.
if (file_exists(__DIR__ . '/database.local.php')) {
    include __DIR__ . '/database.local.php';
}

$conn = mysqli_connect(
    $host,
    $user,
    $password,
    $database,
    $port
);

if(!$conn) {

    die("Error de conexión: " . mysqli_connect_error());

}

?>