<?php

include_once '../config/database.php';

echo "<h1>Prueba Unitaria - Auditorías</h1>";

$sql = "SELECT * FROM audit_logs";

$result = mysqli_query($conn, $sql);

if($result) {

    echo "

    <h2 style='color: green;'>

        TEST EXITOSO

    </h2>

    <p>

        La tabla de auditorías es accesible y la consulta fue exitosa. Registros encontrados: " . mysqli_num_rows($result) . "

    </p>

    ";

} else {

    echo "

    <h2 style='color: red;'>

        TEST FALLIDO

    </h2>

    <p>

        No existen auditorías registradas.

    </p>

    ";

}

?>