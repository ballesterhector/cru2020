<?php
	require 'conectar/conexion.php';
	

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Aplicación para control de bienes y suministros">
	<meta name="keywords" content="asda">
	<meta name="author" content="Ballester Héctor @ballesterhector">
	<meta name="viewport" content="width=device-width, user-scalable=0,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ASDA On Line</title>
    <link rel="icon" type="image/png" href="imagenes/asda.png" sizes="32x32">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-submenu.min.css">
	<link rel="stylesheet" type="text/css" href="css/all.css">
	<link rel="stylesheet" type="text/css" href="css/datatables.css">
	<link rel="stylesheet" type="text/css" href="css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/sweetalert.css">
    <link rel="stylesheet" type="text/css" href="icon/fonts.css">
    <link rel="stylesheet" type="text/css" href="css/stylePaginas.css">
    <link href="https://fonts.googleapis.com/css?family=Bitter:400,400i&display=swap" rel="stylesheet">
    <body oncontextmenu="return false"><!--evitar que copien el codigo fuente de mi pagina, no permite boton derecho-->
   
</head>
<body class="fondo">
    <header class="header">
        <input type="hidden" id="propie" value="<?php echo $permiso  ?>">
        <input type="hidden" id="cedujs" value="<?php echo $cedula?>">
        <input type="hidden" id="juntasC" value="<?php echo $juntaCond?>">
        <input type="hidden" id="usuario" value="<?php echo $usuario ?>">
        <input type="hidden" id="residencia" value="<?php echo $residencias ?>">
        <div class=" logo-nav">
            <div class="menu-bar">
                <a href="#" class="btn-menu"><span class="icon-list2"></span></a>
            </div>
            <div id="header">
                <ul class="nav">
                    <img src="imagenes/asda.png" width="70" height="30" class="" alt="">
                    <li><a href="index_Entrada.php"><span class="icon-house"></span>Principal</a></li>

                    <li><a href=""><span class="icon-businessdomain"></span> Finca</a>
                        <ul>
                            <li><a href="residencia.php"><span class="icon-apartment"></span>Residencia</a></li>
                            <li><a href="apartamentos.php"><span class="icon-building-o"></span>Apartamentos</a></li>
                            <li><a href="propietarios.php"><span class="icon-wc"></span> Propietarios</a></li>
                        </ul>
                    </li>

                    <li><a href="#"><span class="icon-devices_other"></span> Gastos</a>
                        <ul>
                            <li><a href="#"><span class="icon-storefront"></span>Compras</a>
                                <ul>
                                    <li><a href="proveedores.php"><span class="icon-apartment"></span>Proveedores</a></li>
                                    <li><a href="productos.php"><span class="icon-post_add"></span>Productos</a></li>
                                    <li><a href="compras.php?factura=0"><span class="icon-add_shopping_cart"></span>Adquisiciones</a></li>
                                </ul>
                            </li>
                            <li><a href="#"><span class="icon-inventory"></span>Inventarios</a>
                                <ul>
                                    <li><a href="inventarios.php"><span class="icon-storage"></span> Resumen</a></li>
                                    <li><a href="inventariosRetiros.php"><span class="icon-transfer_within_a_station"></span> Retiros</a></li>
                                    <li>
                                        <li><a href="#"><span class="icon-inventory"></span>Consultas</a>
                                        <ul>
                                        <a href="inventariosDetalles.php?periodo=01/2016"><span class="icon-menu"></span> Por período</a>
                                            <li><a href="inventariosRetiros.php"><span class="icon-transfer_within_a_station"></span> Retiros</a></li>
                                            <li><a href="inventariosDetalles.php?periodo=01/2019"><span class="icon-menu"></span> Movimientos</a>
                                            
                                            
                                            </li>
                                        </ul>
                                    </li>
                                    
                                    </li>
                                </ul>
                            </li>
                        </ul>

                    </li>
                    <li style="float: right; margin: 5px 37px 0 0">
                        <form class="" action="cerrarSession.php">
                            <button id="iconSalida" type="submit" title="Salir"><span class="icon-close"></span></button>
                        </form>
                    </li>

                    <li class="fotos"  style="float: right; margin: 0px 17px 0 0">
                        <img src="fotos/<?php echo $cedula ?>.jpg" alt="" class="foto" >
                    </li>
                </ul>
            </div>
        </div>
    </header>    
