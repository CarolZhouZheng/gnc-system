<?php

$host = "127.0.0.1";

$user = "root";

$password = "";

$database = "gncproyecto";

$conn = mysqli_connect(
    $host,
    $user,
    $password,
    $database
);

if(!$conn) {

    die("Error de conexión: " . mysqli_connect_error());

}

?>