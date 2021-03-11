<div class="container body " style="width:230px; background: #4e73df;">
    <div class="main_container fullHeight">
        <div class="col-md-13 left_col">
            <div class="left_col scroll-view" style="background: #4e73df;">
                <div class="navbar nav_title justify-content-center" style="background: #4e73df;">
                <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="/" style="font-size: 30px;">
                    <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-laugh-wink"></i></div>
                    <div class="sidebar-brand-text mx-3"><span>RR.HH.</span></div>
                </a>
                </div>

                <div class="clearfix"></div>

                <!-- menu profile quick info -->
                <div class="profile clearfix" style="margin-bottom: 25px;">
                    <div class="profile_pic">
                        <img src="{{ asset('assets/img/dogs/image3.jpeg') }}" width="60" height="60" alt="..." class="img-circle profile_img">
                    </div>
                    <div class="profile_info">
                        <span>Bienvenido,</span>
                        <h2></h2>
                    </div>
                </div>
                <!-- /menu profile quick info -->


                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <div class="menu_section">

                        <ul class="nav side-menu">
                            <li><a><i class="fa fa-users"></i>Administrar Personal<span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li>
                                        @canany(['Gestionar Usuarios'])
                                            <a href="#">&gt; Gestionar Usuarios</a>
                                        @endcanany
                                    </li>

                                    <li>
                                        @canany(['Gestionar Personal', 'Listar Personal'])
                                            <a href="{{ route('employees.index') }}">&gt;Gestionar Personal</a>
                                        @endcanany
                                    </li>
                                    <li>
                                        @canany(['Gestionar Ordenes'])
                                            <a href="{{ route('orders.index') }}">&gt; Gestionar Ordenes<br>&nbsp; &nbsp;de Trabajo</a>
                                        @endcanany
                                    </li>
                                    <li>
                                        @canany(['Gestionar Departamentos'])
                                            <a href="{{ route('departments.index') }}">&gt; Gestionar<br>&nbsp;&nbsp;Departamentos</a>
                                        @endcanany
                                    </li>
                                    <li>
                                        @canany(['Gestionar Asistencias'])
                                            <a href="{{ route('workdays')}}">&gt; Administrar<br>&nbsp;
                                                &nbsp;Asistencias</a>
                                        @endcanany
                                    </li>
                                    <li>
                                        @canany(['Gestionar Ausencias'])
                                            <a href="{{ route('absences.index') }}">&gt; Administrar<br>&nbsp;&nbsp;Ausencias</a>
                                        @endcanany
                                    </li>
                                    <li>
                                        @canany(['Gestionar Carreras'])
                                            <a href="{{ route('administrative-careers.index') }}">&gt;Gestionar Carrera<br>&nbsp; &nbsp;Administrativa</a>
                                        @endcanany
                                    </li>
                                    <li>
                                        @canany(['Gestionar Capacitaciones'])
                                            <a href="#">&gt; Gestionar Capacitación<br>&nbsp; &nbsp;Interna</a>
                                        @endcanany
                                    </li>
                                    <li>
                                        @canany(['Gestionar Contratos'])
                                            <a href="{{ route('contracts.index') }}">&gt; Gestionar Contratos</a>
                                        @endcanany
                                    </li>
                                    <li>
                                        @canany(['Gestionar Cargos'])
                                            <a href="#">&gt; Gestionar Cargos</a>
                                        @endcanany
                                    </li>
                                    <li>
                                        @canany(['Gestionar Planificaciones'])
                                            <a href="{{ route('plannings.index') }}">&gt; Gestionar Planificaciones <br>&nbsp; &nbsp;Laborales</a>
                                        @endcanany
                                    </li>
                                    <li>
                                        @canany(['Gestionar Horarios'])
                                            <a href="#">&gt; Gestionar Horarios<br></a>
                                        @endcanany
                                    </li>
                                    <li>
                                        @canany(['Gestionar Roles'])
                                            <a href="{{ route('roles.index') }}">&gt; Gestionar Roles<br></a>
                                        @endcanany
                                    </li>
                                    <li>
                                        @canany(['Gestionar Permisos'])
                                            <a href="{{ route('permissions.index') }}">&gt; Gestionar Permisos<br></a>
                                        @endcanany
                                    </li>
                                </ul>
                            </li>
                            @canany(['Gestionar Reportes'])
                                <li>
                                    <a><i class="fa fa-clipboard"></i>Administrar Reportes
                                        <span class="fa fa-chevron-down"></span>
                                    </a>
                                    <ul class="nav child_menu">
                                        <li>
                                            <a href="#">&gt; Administrar Reportes<br>&nbsp; &nbsp;del Personal</a>
                                        </li>
                                        <li>
                                            <a href="#">&gt; Administrar Planilla<br>&nbsp; &nbsp;de Sueldos</a>
                                        </li>
                                    </ul>
                                </li>
                            @endcanany

                            @canany(['Gestionar Sueldos'])
                                <li>
                                    <a><i class="fa fa-money"></i>Administrar Pagos<span class="fa fa-chevron-down"></span>
                                    </a>
                                    <ul class="nav child_menu">
                                        <li><a href="#">&gt; Administrar Salarios</a></li>
                                        <li><a href="#">&gt; Asignar Beneficio Prima</a></li>
                                        <li><a href="#">&gt; Aplicar Descuentos a<br>&nbsp; &nbsp;Empleados</a></li>
                                        <li><a href="#">&gt; Asignar Beneficios<br>&nbsp; &nbsp;Horas Extras</a></li>
                                    </ul>
                                </li>
                            @endcanany

                            @canany(['Gestionar Seguridad', 'Gestionar Bitacora'])
                                <li>
                                    <a><i class="fa fa-shield"></i>Administrar Seguridad
                                        <span class="fa fa-chevron-down"></span>
                                    </a>
                                    <ul class="nav child_menu">
                                        <li>
                                            @canany(['Gestionar Bitacora'])
                                                <a href="#">&gt; Gestionar Bitácora</a>
                                            @endcanany
                                        </li>
                                        <li>
                                            @canany(['Gestionar Seguridad'])
                                                <a href="#">&gt;Gestionar <br>&nbsp; &nbsp;Copias de Seguridad</a>
                                            @endcanany
                                        </li>
                                    </ul>
                                </li>
                            @endcanany

                            @hasanyrole('Administrador del Sistema|Administrador de RRHH')
                                <li>
                                    <a><i class="fa fa-child"></i>Administrar Postulantes
                                        <span class="fa fa-chevron-down"></span>
                                    </a>
                                    <ul class="nav child_menu">
                                        <li><a href="#">&gt; Gestionar Reportes<br>&nbsp; &nbsp;de Postulantes</a></li>
                                        <li><a href="{{ route('applicants.index') }}">&gt; {{ 'Gestionar Postulantes'}}</a></li>
                                    </ul>
                                </li>
                            @endhasanyrole
                        </ul>
                    </div>
                </div>
                <!-- /sidebar menu -->
            </div>
        </div>
    </div>
</div>
