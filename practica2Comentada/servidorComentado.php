<?php
    require "conectar/conexion.php";

    //capturamos la variable que almacena la data ersonas, enviada por
    //metodo open del index y lo guardamos en variable personas
    $personas = $_GET['personas'];

    //creamos variables tipo cadena para asignar un id a cada usuario
    //mostrado en cad columna de la tabla
    $nombreID   = "nombreID";
    $emailID    = "emailID";
    $actualizar = "actualizar";
    $borrar     = "borrar";
    //para que no me de indeinida la variable $table
    $table      = "";

    //evaluamos si la variable personas = a personas que viene de get $personas = $_GET['personas'];
    // es igual a a data personas enviadas de open
    //open("GET", "servidor.php?personas=" + personas, true);

    if($personas === "personas"){
        //si es cierto extraemos los datos deBD para mostrarlos en pantalla
        // que recibe dos parametros la coneccion y la consulta u insrt u delete
        $resultado = mysqli_query($con,"SELECT * FROM usuario");

        //pintamos el ecabezado de la tabla con .= concatenamos

        $table .= '<div class="container>';
        $table .= '<table class="table table-striped table-bordered" id="dataTable">';
        $table .= '<tr>';
        $table .= '<th>Usuario</th>';
        $table .= '<th>Nombre</th>';
        $table .= '<th>Email</th>';
        $table .= '<th>Editar usuario</th>';
        $table .= '<th>Borrar usuario</th>';
        $table .= '</tr>';

        //optenemos los valosres de la tabla usuarios
        while($fila = mysqli_fetch_assoc($resultado)){
            $table.='<tr>';
            $table.='<td>'.$fila['id'].'</td>';
            //le asigno a cada dato su id dado de la tabla usando las variables previamente
            //creadas arriba
            $table.='<td id= "'.$nombreID.$fila['id'].'">'.$fila['nombre'].'</td>';
            $table.='<td id= "'.$emailID.$fila['id'].'">'.$fila['email'].'</td>';
             //damos los id a los botones en el input
            //para editar solo el id
            //incluimos onclick en editar para ejecutar editarUsuario() que esta en el index
            //pasandole el id de la tabla
            $table.='<td><input id="'.$fila['id'].'" onclick="editarUsuario(this.id)"  type="button" value="Editar" class="btn btn-success" ></td>';
            //a los otros botones le colocamos la variable arriba definida y el id que viene de la tabla
            $table.='<td><input id="'.$borrar.$fila['id'].'" type="button" value="Borrar" class="btn btn-danger"></td>';
            //boton editar con display none para esconderlo
            $table.='<td><input id="'.$actualizar.$fila['id'].'"  type="button" value="Actualizar" class="btn btn-primary" style = "display:none"></td>';
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