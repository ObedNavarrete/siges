<?php

class ControladorUsuarios{
    public function ctrIngresoUsuario(){
        if (isset($_POST["ingUsuario"])) {
            if (preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingUsuario"]) ||
                preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingPassword"])) {
                
                    $tabla = 'usuarios';
                    $tabla2 = 'roles';
                    $item = 'usuario';
                    $valor = $_POST["ingUsuario"];
                    $respuesta = ModeloUsuarios::mdlMostrarUsuarios($tabla, $tabla2, $item, $valor);

                    if(($respuesta["usuario"] == $_POST["ingUsuario"] && 
                        $respuesta["password"] == $_POST["ingPassword"])){

                        $_SESSION["iniciarSesion"] = "ok";
                        $_SESSION["idSesion"] = $respuesta["id"];
                        
                        echo "<script>
                                    window.location='inicio';
                               </script>";
                        
                    }else{
                        echo "<script>
                                    Swal.fire({
                                        position: 'center',
                                        icon: 'error',
                                        title: 'Acceso denegado!',
                                        showConfirmButton: false,
                                        timer: 1300
                                    });
                               </script>";
                    }
            }
        }
    }


    //MOSTRAR USUARIOS
    //Este metodo es para mostrar los usuarios en la tabla con ajax, se relaciona con ajax/tablaUsuarios.ajax
    static public function ctrMostrarUsuarios($item, $valor)
    {
        $tabla1 = 'usuarios';
        $tabla2 = 'roles';
        $respuesta = ModeloUsuarios::mdlMostrarUsuarios($tabla1, $tabla2, $item, $valor);

        return $respuesta; //Para devolver la informacion de nuevo a tablaUsuarios.ajax
    }

    //Registro de Usuarios
    //Se ejecuta antes de cerrar el form del modal registro de usuarios
    public function ctrRegistroUsuario(){
        if (isset($_POST["registroNombre"])) {
            # Validamos que no traiga el nombre caracteres especiales
            if(preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚñÑ ]+$/', $_POST["registroNombre"]) &&
			   preg_match('/^[a-zA-Z0-9]+$/', $_POST["registroUsuario"]) &&
			   preg_match('/^[a-zA-Z0-9]+$/', $_POST["registroPassword"])){

                $tabla = 'usuarios';
                //Vamos a almacenar los datos en un array para poder enviarlos al modelo
                $datos = array("nombre" => $_POST["registroNombre"],
                                "usuario" => $_POST["registroUsuario"],
                                "password" => $_POST["registroPassword"],
                                "idRol" => $_POST["registroRol"], //Como sale en el modelo
                                );
                //Pedimos una respuesta de usuarios.modelo
                $respuesta = ModeloUsuarios::mdlRegistroUsuarios($tabla, $datos);
                // echo '<pre>'; print_r($respuesta); echo '</pre>';

                if($respuesta == "ok"){

					echo "
                    <script>
                        Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Registro Exitoso!',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    </script>
                    ";

				}
            }else{
                    echo "
                    <script>
                        Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'ERROR: NO se permiten caracteres especiales',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    </script>
                    ";
            }
        }
    }

    public function ctrEditarUsuario(){
        if (isset($_POST["editarId"])) {
            # Validamos que no traiga el nombre caracteres especiales
            if(preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚñÑ ]+$/', $_POST["editarNombre"]) &&
			   preg_match('/^[a-zA-Z0-9]+$/', $_POST["editarUsuario"]) &&
			   preg_match('/^[a-zA-Z0-9]+$/', $_POST["editarPassword"])){

                $tabla = 'usuarios';
                //Vamos a almacenar los datos en un array para poder enviarlos al modelo
                $datos =  array("id"=> $_POST["editarId"],
                                "nombre" => $_POST["editarNombre"],
                                "usuario" => $_POST["editarUsuario"],
                                "password" => $_POST["editarPassword"],
                                "idRol" => $_POST["editarRol"], //Como sale en el modelo
                                );
                //Pedimos una respuesta de usuarios.modelo
                $respuesta = ModeloUsuarios::mdlEditarUsuario($tabla, $datos);
                // echo '<pre>'; print_r($respuesta); echo '</pre>';

                if($respuesta == "ok"){

					echo "
                    <script>
                        Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Registro Exitoso!',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    </script>
                    ";

				}
            }else{
                    echo "
                    <script>
                        Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'ERROR: NO se permiten caracteres especiales',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    </script>
                    ";
            }
        }
    }

    static public function ctrEliminarUsuarios($id){
        $tabla = "usuarios";
        $datos = array(
            "id" => $id
        );

        $respuesta = ModeloUsuarios::mdlEliminarUsuarios($tabla, $datos);
        
        return $respuesta;
    }
    
}