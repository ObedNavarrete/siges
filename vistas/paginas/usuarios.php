<?php
$roles = ControladorRoles::ctrMostrarRoles();

    if($usuarioIngreso['rol'] != 'Administrador') {
        echo "<script>
            window.location = 'inicio';
        </script>";
        return;
    }
?>

<div id="layoutSidenav_content">
    <main>
        <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
            <div class="container-xl px-4">
                <div class="page-header-content pt-4">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-auto mt-4">
                            <h1 class="page-header-title">
                                <div class="page-header-icon"><i data-feather="filter"></i></div>
                                Lista de Usuarios
                            </h1>
                            <div class="page-header-subtitle">Información y registro de los usuarios con acceso al sistema</div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Main page content-->
        <div class="container-xl px-4 mt-n10">
            <div class="card mb-4">
                <button class="btn btn-primary m-1" type="button" data-bs-toggle="modal" data-bs-target="#agregarUsuario">
                    Nuevo Usuario
                </button>
                <div class="card-body">
                    <table class="table dt-responsive tablaUsuarios table-striped" width="100%">
                        <thead class="table-bordered">
                            <tr>
                                <th>Nombre</th>
                                <th>Usuario</th>
                                <th>Password</th>
                                <th>Rol</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="table-bordered">

                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </main>

    <!-- Incluyendo el Footer en la parte del inicio -->
    <?php include 'modulos/footer.php' ?>
</div>



<!--MODAL CREAR USUARIO-->
<div class="modal fade" id="agregarUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title col-12 text-center" id="exampleModalLabel">Nuevo Usuario</h5>
                </div>
                <div class="modal-body">

                    <!-- Nombre -->
                    <div class="input-group mb-3">
                        <div class="input-gruop-append input-group-text bg-dark">
                            <span class="far fa-check-circle"></span>
                        </div>
                        <input type="text" class="form-control shadow-none border" name="registroNombre" placeholder="Ingresa el nombre" require>
                    </div>

                    <!-- Usuario -->
                    <div class="input-group mb-3">
                        <div class="input-gruop-append input-group-text">
                            <span class="far fa-check-circle"></span>
                        </div>
                        <input type="text" class="form-control shadow-none border" name="registroUsuario" placeholder="Ingresa el usuario" require>
                    </div>

                    <!-- Password -->
                    <div class="input-group mb-3">
                        <div class="input-gruop-append input-group-text">
                            <span class="far fa-check-circle"></span>
                        </div>
                        <input type="password" class="form-control shadow-none border" name="registroPassword" placeholder="Ingresa la contraseña" require>
                    </div>

                    <!-- //LLevando datos desde la consulta de la base de datos en la tabla foranea -->
                    <div class="input-group mb-3">
                        <div class="input-group-append input-group-text">
                            <span class="far fa-check-circle"></span>
                        </div>
                        <select class="form-control shadow-none border" name="registroRol" required>
                            <option value="default" selected="selected">Seleccione el rol de usuario</option>
                            <?php foreach ($roles as $key => $valueRoles) : ?>
                                <option value="<?php echo $valueRoles['id']; ?>"><?php echo $valueRoles['nombre']; ?>
                                </option>
                            <?php endforeach ?>
                        </select>
                    </div>

                </div>
                <div class="modal-footer d-flex justify-content-between">
                    <div>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                    <div>
                        <button type="submit" id="guardar-Usuario" class="btn btn-dark">Guardar</button>
                    </div>
                </div>
            </div>

            <?php
            $registroUsuario = new ControladorUsuarios;
            $registroUsuario->ctrRegistroUsuario();
            ?>
        </form>
    </div>
</div>


<!--MODAL EDITAR USUARIO-->
<div class="modal fade" id="editarUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form method="post">
            <div class="modal-content">
                <div class="modal-header barra-header-adminlte">
                    <h5 class="modal-title col-12 text-center" id="exampleModalLabel">Editar Usuario</h5>
                </div>
                <div class="modal-body">

                    <input type="hidden" name="editarId">

                    <!-- Nombre -->
                    <div class="input-group mb-3">
                        <div class="input-gruop-append input-group-text">
                            <span class="fas fa-signature"></span>
                        </div>
                        <input type="text" class="form-control shadow-none border" name="editarNombre" require>
                    </div>

                    <!-- Usuario -->
                    <div class="input-group mb-3">
                        <div class="input-gruop-append input-group-text">
                            <span class="fas fa-file-signature"></span>
                        </div>
                        <input type="text" class="form-control shadow-none border" name="editarUsuario" require>
                    </div>

                    <!-- Password -->
                    <div class="input-group mb-3">
                        <div class="input-gruop-append input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                        <input type="text" class="form-control shadow-none border" name="editarPassword" require>
                    </div>

                    <div class="input-group mb-3">
                        <!-- ROL -->
                        <div class="input-gruop-append input-group-text">
                            <span class="fab fa-gg-circle"></span>
                        </div>
                        <select class="form-control shadow-none border" name="editarRol" require>
                            <option value="" class="editarPerfilOption"></option>
                            <?php foreach ($roles as $key => $valueRoles) : ?>
                                <option value="<?php echo $valueRoles['id']; ?>"><?php echo $valueRoles['nombre']; ?>
                                </option>
                            <?php endforeach ?>
                        </select>
                    </div>

                </div>
                <div class="modal-footer d-flex justify-content-between">
                    <div>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </div>
            </div>

            <?php
                $registroUsuario = new ControladorUsuarios;
                $registroUsuario -> ctrEditarUsuario();
            ?>
        </form>
    </div>
</div>