<?php

include_once '../config/database.php';

echo "<h1>Prueba Unitaria - Auditorías</h1>";

$sql = "SELECT * FROM audit_logs";

$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0) {

    echo "

    <h2 style='color: green;'>

        TEST EXITOSO

    </h2>

    <p>

        Las auditorías fueron obtenidas correctamente.

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