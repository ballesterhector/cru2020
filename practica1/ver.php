<?php
    require "conectar/conexion.php";

    $resultado = mysqli_query($con, "select * from usuario");
    $userDB = "";

    $userDB .= "<table>";
    $userDB .= "<tr>";
    $userDB .= "<th>Nombre</th>";
    $userDB .= "<th>pais</th>";
    $userDB .= "</tr>";

    while($filas = mysqli_fetch_assoc($userDB));
    {
        $userDB .= "<tr>";
        $userDB .= "<td>Nombre</td>";
        $userDB .= "<td>pais</td>";
        $userDB .= "</tr>";
    }
    $userDB .= "</table>";

    echo $userDB;

    $mysqli_close($con);



?>
