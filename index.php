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




    <?php
        require "html/footer.php";
    ?>

    <script type="text/javascript">
        var resultado = document.getElementById("info");

        function mostrarUsuarios(){
            var xmlhttp;

            if(window.XMLHttpRequest){
                xmlhttp = new XMLHttpRequest();
            }else{
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
           
            xmlhttp.onreadystatechange = function(){
                if(xmlhttp.readyState === 4 && this.status === 200){
                    resultado.innerHTML = xmlhttp.responseText;
                }
            }

            xmlhttp.open("GET", "servidor.php?personas=" + "personas" + "&usuarioIDActualizado=" +0 + "&nombreActualizado=" + "nomo"  , true);
            xmlhttp.send();
        }
        
        mostrarUsuarios();  

        function editarUsuario(usuarioID){
           var nombreID       = "nombreID"   + usuarioID;
           var emailID        = "emailID"    + usuarioID;
           var borrar         = "borrar"     + usuarioID;
           var actualizar     = "actualizar" + usuarioID;
           var editarNombreID =  nombreID    + "-editar"; 

           var nombreDelUsuario = document.getElementById(nombreID).innerHTML;
           var parent = document.querySelector("#" + nombreID);

           if(parent.querySelector("#" + editarNombreID)===null){
                document.getElementById(nombreID).innerHTML = '<input type="text" id="'+editarNombreID+'"  value="'+nombreDelUsuario+'" >';
                document.getElementById(borrar).disabled = true;
                document.getElementById(actualizar).style.display = "block";
           }

        }

        function actualizarUsuario(usuarioID){
            var xmlhttp;

            if(window.XMLHttpRequest){
                xmlhttp = new XMLHttpRequest();
            }else{
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
           //optenemos el id del input <input type="text" id="nombreID1-editar" value="Amon">
           var nombreActualizado =  document.getElementById("nombreID" + usuarioID + "-editar").value;
           
           xmlhttp.onreadystatechange = function(){
                if(this.readyState === 4 && this.status === 200){
                    mostrarUsuarios();
                }
            }

            //hacemos la peticion a servidor.php enviando el id y el nuevo nombre
            xmlhttp.open("GET", "servidor.php?usuarioIDActualizado=" + usuarioID + "&nombreActualizado=" + nombreActualizado + "&personas=" + "personas" , true);
            xmlhttp.send();
        }
    

        


    </script>

    </body>
</html>