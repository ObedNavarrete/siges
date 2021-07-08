<?php
    session_start();

    if(isset($_SESSION["idSesion"])) {
        $usuarioIngreso = ControladorUsuarios::ctrMostrarUsuarios("id", $_SESSION["idSesion"]);
    }
?>

<html lang="es">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />

        <title>Obed</title>

        <!-- DataTables -->
        <link rel="stylesheet" href="vistas/css/plugins/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="vistas/css/plugins/responsive.bootstrap.min.css">
        <link href="vistas/css/styles.css" rel="stylesheet" />
        <link href="vistas/css/main.css" rel="stylesheet" />
        <link rel="icon" type="image/x-icon" href="vistas/assets/img/favicon.png" />

        <!-- DataTables https://datatables.net/-->
        <script src="vistas/js/plugins/jquery.dataTables.min.js"></script>
        <script src="vistas/js/plugins/dataTables.bootstrap4.min.js"></script>
        <script data-search-pseudo-elements defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="vistas/js/scripts.js"></script>
        <!-- jQuery 3 -->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <!-- overlayScrollbars -->
        <script src="vistas/js/plugins/jquery.overlayScrollbars.min.js"></script>
        <script src="vistas/js/usuarios.js"></script>
        <!-- InputMask -->
        <script src="vistas/js/plugins/jquery.inputmask.bundle.js"></script>
        <!-- SweetAlert -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.0.18/sweetalert2.all.min.js" integrity="sha512-kW/Di7T8diljfKY9/VU2ybQZSQrbClTiUuk13fK/TIvlEB1XqEdhlUp9D+BHGYuEoS9ZQTd3D8fr9iE74LvCkA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.0.18/sweetalert2.css" integrity="sha512-DYOwgMAsSbNzrSwEU3nQ7bcYo5aEqpIq1lOe5doeuUwXjuFYjIPvIZDZrEOH+QMIXvRpqcc8gPKcoIMIyAZMCg==" crossorigin="anonymous" referrerpolicy="no-referrer" />



        <!--====================================================
        VINCULOS CSS
    =====================================================-->
    <!-- Estilos CSS Originales -->
    <link rel="stylesheet" href="vistas/css/main.css">
    <!--=====================================
	VÍNCULOS JAVASCRIPT
	======================================-->
    <!-- Select2 -->
    <script src="vistas/js/plugins/select2.full.min.js"></script>
    <!-- Datepicker -->
    <script src="vistas/js/plugins/bootstrap-datepicker.min.js"></script>
    <script src="vistas/js/plugins/bootstrap-datepicker.es.min.js"></script>
    <!-- DataTables https://datatables.net/-->
    <script src="vistas/js/plugins/jquery.dataTables.min.js"></script>
    <script src="vistas/js/plugins/dataTables.bootstrap4.min.js"></script>
    <script src="vistas/js/plugins/dataTables.responsive.min.js"></script>
    <script src="vistas/js/plugins/responsive.bootstrap.min.js"></script>

    </head>

    <body class="nav-fixed">
        
    <?php

    if (isset($_SESSION["iniciarSesion"]) && ($_SESSION["iniciarSesion"])=="ok") {

        include 'paginas/modulos/header.php';

        echo '<div id="layoutSidenav">';

        include 'paginas/modulos/menu.php';

        if (isset($_GET["ruta"])) {
            if ($_GET["ruta"] == "inicio") {
                include 'paginas/inicio.php';
            }
            else if ($_GET["ruta"] == "salir") {
                include 'paginas/salir.php';
            } 
            else if ($_GET["ruta"] == "usuarios") {
                include 'paginas/usuarios.php';
            } 
            else {
            include 'paginas/404.php';
            }
        } else {
            include 'paginas/inicio.php';
        } 

    echo '</div>';
    }else{
        include 'paginas/login.php';
    }


    ?>


        
    </body>
</html>