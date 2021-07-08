<div class="bg-dark">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container-xl px-4 mt-5">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <!-- Basic login form-->
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header justify-content-center">
                                    <h4 class="text-center">Sistema de Gestion y Seguimiento de Sorteos SIGES</h4>
                                </div>
                                <div class="card-body">
                                    <!-- Login form-->
                                    <form class="mt-0" method="POST">

                                        <!-- Form Group (email address)-->
                                        <div class="mb-3">
                                            <label class="small mb-1" for="inputEmailAddress">Usuario</label>
                                            <input class="form-control shadow-none border" name="ingUsuario" id="inputEmailAddress" type="text" placeholder="Escriba su Usuario" />
                                        </div>

                                        <!-- Form Group (password)-->
                                        <div class="mb-3">
                                            <label class="small mb-1" for="inputPassword">Contraseña</label>
                                            <input class="form-control shadow-none border" name="ingPassword" id="inputPassword" type="password" placeholder="Escriba su Contraseña" />
                                        </div>

                                        <!-- Form Group (login box)-->
                                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <button class="btn btn-primary" type="submit">Acceder</button>
                                        </div>
                                            <?php
                                                $login = new ControladorUsuarios();
                                                $login->ctrIngresoUsuario();
                                            ?>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutAuthentication_footer">
            <footer class="footer-admin mt-auto footer-dark">
                <div class="container-xl px-4">
                    <div class="row">
                        <div class="col-md-6 small">Copyright &copy; Derechos de Autor</div>
                        <div class="col-md-6 text-md-end small">
                            <a href="#!">Política de Privacidad</a>
                            &middot;
                            <a href="#!">Obed Navarrete</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

</div>