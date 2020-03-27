<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    
     <div id="wrapper">
        <div id="info"></div>
    </div>






    <script type="text/javascript">
       
        //tomo el valor del info y lo guardo en resultado
        var resultado = document.getElementById("info");

        //creo la funcion para mostrar usuario, validando el navegador

        function mostrarUsuarios(){
            var xmlhttp;

            if(window.XMLHttpRequest){
                xmlhttp = new XMLHttpRequest();
            }else{
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
           
            xmlhttp.onreadystatechange = function(){
                if(xmlhttp.readyState===4 && xmlhttp.status===200){
                    //si cumple con lo anterior resive la informacion de la data desde el servidor
                    //y para poder ver la informacion resultado.innerHTML = xmlhttp.responseText;
                    //con lo que se pasa la data a id="info incluida en var resultado con get ElementById
                    resultado.innerHTML = xmlhttp.responseText;
                }
            }
            //con open mandamos la peticion a servidor.php que es donde se ejecutan las
            //peticiones al servidor. el true es por asincrono
            xmlhttp.open("GET", "servidor.php?personas=" + "personas", true);
            //con send ejecutamos la peticion a servidor.php
            xmlhttp.send();
        }
          //mandamos a ejecutar la funcion
          mostrarUsuarios();  

          //Creamos la funcion editarUsuario para enviar los valores a las 
        //variables en servidor.php
        //la varible nombreID contiene el id de cada usuario
        function editarUsuario(usuarioID){
           var nombreID       = "nombreID"   + usuarioID;
           var emailID        = "emailID"    + usuarioID;
           var borrar         = "borrar"     + usuarioID;
           var actualizar     = "actualizar" + usuarioID;
           var editarNombreID =  nombreID    + "-editar"; 
           
            //capturamos el id de cada usuario por nombreID
            //y con innerHTML optnemos el nombre del usuario ver ispeccionar elemento
            //<td id="nombreID2">lucas</td>
            var nombreDelUsuario = document.getElementById(nombreID).innerHTML;  
            
            //en la tabla el nombre del usuario es el elemento padre y al dar click en editaar
            //se muestra el hojo en un <div class=""></div>
            var parent = document.querySelector("#" + nombreID);

            if(parent.querySelector("#" + editarNombreID)===null){
              //  reemplazamos nombreID por el input hijo conctenado con el nombre del usuario optenodo en la variable anterior
              // de etsa manera vemos el nombre del usuario al dar click en editar
              document.getElementById(nombreID).innerHTML = '<input type="text" id="'+editarNombreID+'"  value="'+nombreDelUsuario+'" >';
              // ocultamos el boton borrar que esta en var borrar
              document.getElementById(borrar).disabled = true;
              //mostramos el actualizar y pasaos el id del usuario
              document.getElementById(actualizar).style.display = "block";
            }
        }

    </script>

    </body>
</html>