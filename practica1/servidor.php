<?php
    require "conectar/conexion.php";

    $nombre = $_GET['nombre'];

    if (!empty($nombre)) {
        $cliente = mysqli_real_escape_string($con,$nombre);
        $resultado = mysqli_query($con,"SELECT * FROM usuario WHERE nombre LIKE '%".$cliente."%' ");
        
        while($fila = mysqli_fetch_assoc($resultado)){
            echo '<div class="miclase" onclick="toggleOverlay(this)">'.$fila['nombre'].'</div>';
            echo '<input type="hidden" value="'.$fila['pais'].'">';
        }
        mysqli_close($con);
    }else{
        mostrarUsuarios();
    }

    function mostrarUsuarios(){
        require "conectar/conexion.php";
        $resultado = mysqli_query($con,"SELECT * FROM usuario");

        while($fila = mysqli_fetch_assoc($resultado)){
            echo '<div class="miclase" onclick="toggleOverlay(this)">'.$fila['nombre'].'</div>';
            echo '<input type="hidden" value="'.$fila['pais'].'">';
        }
        mysqli_close($con);
    }

    

?>