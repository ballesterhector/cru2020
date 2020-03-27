<?php
    require "conectar/conexion.php";

    $personas = $_GET['personas'];

    $usuarioIDActualizados = $_GET['usuarioIDActualizado'];
    $nombreActualizados = $_GET['nombreActualizado'];

    $nombreID   = "nombreID";
    $emailID    = "emailID";
    $actualizar = "actualizar";
    $borrar     = "borrar";
    $table="";
    if($personas === "personas"){
        $resultado = mysqli_query($con,"SELECT * FROM usuario");
    
        $table.='<div class="container">';
        $table.='<table class="table table-striped table-bordered" id="dataTables">';
        
        $table.='<tr>';
        $table.='<th>Usuario</th>';
        $table.='<th>Nombre</th>';
        $table.='<th>Email</th>';
        $table.='<th>Editar usuario</th>';
        $table.='<th>Borrar usuario</th>';
        $table.='</tr>';
        
        while($fila = mysqli_fetch_assoc($resultado)){
            $table.='<tr>';
            $table.='<td>'.$fila['id'].'</td>';
            $table.='<td id= "'.$nombreID.$fila['id'].'">'.$fila['nombre'].'</td>';
            $table.='<td id= "'.$emailID.$fila['id'].'">'.$fila['email'].'</td>';
            $table.='<td><input id="'.$fila['id'].'" onclick="editarUsuario(this.id)"  type="button" value="Editar" class="btn btn-success" ></td>';
            $table.='<td><input id="'.$borrar.$fila['id'].'" type="button" value="Borrar" class="btn btn-danger"></td>';
            //ejecutamos actualizarUsuario() pasando el id de la tablaen el index al dar click
            $table.='<td><input id="'.$actualizar.$fila['id'].'" onclick = "actualizarUsuario('.$fila['id'].')"  type="button" value="Actualizar" class="btn btn-primary" style = "display:none"></td>';
            $table.='</tr>';

        }

        $table.='</table>'; 
        $table.='</div>';   
        echo $table;
     
    }

    //si el nombreActualizado no esta vacio
    if(!empty($nombreActualizados)){
        $cliente = mysqli_real_escape_string($con, $nombreActualizados);
        $resultado = mysqli_query($con, "UPDATE usuario SET nombre = '$cliente' WHERE id = $usuarioIDActualizados");
    }
    mysqli_close($con);

?>