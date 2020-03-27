<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>proyecto_01</title>
    </head>
    <style>
        .miclase{
            color:blue;
        }

        button{
            padding: 15px;
            margin-left:42%;
            font-size: 14px;
            cursor: point;
        }

        div#overlay{
            display:none;
            z-index: 2;
            bacground-color: #000;
            position: fixed;
            width: 100%;
            hight:100%;
            top:0px;
            left:0px;
            text-align: center;
        }
        div#informacionDelUsuario{
            display: none;
            position:relative;
            z-index: 3;
            margin: 100% auto 0px auto;
            width: 400px;
            height: 250px;
            background-color:#fff;
            color: #000;
            border: 4px solid #ccc;
            font-size: 18px; 
        }

        div#wrapper{
            position: absolute;
            top: 40px;
        }

        #info{
            padding:20px;
        }

        #titulo{
            width: 100%;
            height: 12%;
            background-color: #e9e9e9;
            padding: -20px;
            text-align: center;
            font-family: arial;
            font-size: 18px;
            padding-top: 15px;
        }





    </style>
    <body>
        <form action="">
            Buscar cliente: <input type="text" id="texto" placeholder="Ingresar nombre" onkeyup="buscarUsuario(this.value)">
        </form>

        <div id="wrapper">
            <div id="mostrar"></div>
        </div>

        <div id="overlay"></div>

        <div id="informacionDelUsuario">
            <div id="titulo">Infomación personal</div>
            <p id="info"></p>
            <button onclick="toggleOverlay(this)">cerrar</button>
        </div>







    </body>


    <script type="text/javascript">
        var resultado = document.getElementById('mostrar');

        function buscarUsuario(nombre){
            var xmlhttp;

            if(window.XMLHttpRequest){
                xmlhttp = new XMLHttpRequest();
            }else{
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }

            xmlhttp.onreadystatechange = function(){
                if(xmlhttp.readyState===4 && xmlhttp.status===200){
                    resultado.innerHTML = xmlhttp.responseText;

                }
            }
            xmlhttp.open("GET", "servidor.php?nombre=" + nombre, true);
            xmlhttp.send();
        }

        function toggleOverlay(elemento){
            var overlay = document.getElementById("overlay");
            var informacionDelUsuario = document.getElementById("informacionDelUsuario");
            var info = document.getElementById("info");

            overlay.style.opacity = .6;
            //si existe no la mustro
            if(overlay.style.display== "block"){
                overlay.style.display = "none";
                informacionDelUsuario.style.display = "none";
            }else{
                //lamustro
                overlay.style.display = "block";
                informacionDelUsuario.style.display = "block";
            }

        }
    </script>
</html>