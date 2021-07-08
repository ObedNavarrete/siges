<div id="layoutSidenav_nav">
    <nav class="sidenav shadow-right sidenav-light">
        <div class="sidenav-menu">
            <div class="nav accordion" id="accordionSidenav">
                
                <!-- Area de Inicio-->
                <div class="sidenav-menu-heading">Inicio</div>
                <!-- Inicio -->
                <a class="nav-link" href="inicio">
                    <div class="nav-link-icon"><i data-feather="activity"></i></div>
                    Inicio
                </a>

                <!-- Area del Menu Administrador-->
                <div class="sidenav-menu-heading">Administrador</div>
                <!-- Usuarios -->
                <a class="nav-link" href="usuarios">
                    <div class="nav-link-icon"><i data-feather="activity"></i></div>
                    Usuarios
                </a>
                <!-- Usuarios -->
                <a class="nav-link" href="usuarios">
                    <div class="nav-link-icon"><i data-feather="activity"></i></div>
                    Ventas Actuales
                </a>
                <a class="nav-link" href="charts.html">
                    <div class="nav-link-icon"><i data-feather="activity"></i></div>
                    Sorteos
                </a>
                <a class="nav-link" href="charts.html">
                    <div class="nav-link-icon"><i data-feather="activity"></i></div>
                    Tabla de Premios
                </a>
                <a class="nav-link" href="charts.html">
                    <div class="nav-link-icon"><i data-feather="activity"></i></div>
                    Salarios
                </a>
                <!-- Acordeon de Reportes-->
                <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapseDashboards" aria-expanded="false" aria-controls="collapseDashboards">
                    <div class="nav-link-icon"><i data-feather="activity"></i></div>
                    Reportes
                    <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseDashboards" data-bs-parent="#accordionSidenav">
                    <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPages">
                        <a class="nav-link" href="dashboard-1.html">Ventas</a>
                        <a class="nav-link" href="dashboard-2.html">Números</a>
                        <a class="nav-link" href="dashboard-3.html">Vendedores</a>
                    </nav>
                </div>

                
                <!-- VENDEDOR-->
                <div class="sidenav-menu-heading">Vendedor</div>
                <!-- Sidenav Accordion (Pages)-->
                <!-- Acordeon de Reportes-->
                <a class="nav-link" href="charts.html">
                    <div class="nav-link-icon"><i data-feather="activity"></i></div>
                    Vender
                </a>


                <!-- SUPERVISOR -->
                <div class="sidenav-menu-heading">Supervisor</div>
                <!-- Sidenav Accordion (Layout)-->
                <a class="nav-link" href="charts.html">
                    <div class="nav-link-icon"><i data-feather="activity"></i></div>
                    Actual
                </a>

            </div>
        </div>

        <!-- Sidenav Footer-->
        <div class="sidenav-footer">
            <div class="sidenav-footer-content">
                <div class="sidenav-footer-subtitle">Sesión: :</div>
                <div class="sidenav-footer-title"><?php echo $usuarioIngreso["nombre"]?></div>
            </div>
        </div>
        
    </nav>
</div>