<?php
    $host = "localhost";
    $user = "root";
    $pass = "asda2019";
    $bd  = "usuario_bd";

    $con = mysqli_connect($host, $user, $pass, $bd);

    if(mysqli_connect_errno())
    {
        echo "Error en la conexion: " . mysqli_connect_error();
    }
    else
    {
        //echo "Conectado";
    }

?>    