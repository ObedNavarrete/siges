<?php

require_once "controladores/plantilla.controlador.php";
require_once "controladores/usuarios.controlador.php";
require_once "controladores/roles.controlador.php";

require_once "modelos/conexion.php";
require_once "modelos/usuarios.modelo.php";
require_once "modelos/roles.modelo.php";

/* require_once "controladores/ruta.controlador.php"; */

$plantilla = new ControladorPlantilla();
$plantilla -> ctrPlantilla();

