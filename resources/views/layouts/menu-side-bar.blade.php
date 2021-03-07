<nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
    <div class="container-fluid d-flex flex-column p-0">
        <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="{{ route('home') }}">
            <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-laugh-wink"></i></div>
            <div class="sidebar-brand-text mx-3" href=""><span>RR.HH.</span></div>
        </a>
        <hr class="sidebar-divider my-0">
        <ul class="nav navbar-nav text-light" id="accordionSidebar">
            <li class="nav-item">
                <a class="nav-link" style="color: rgba(0,1,1,0.8);font-size: 18px;">Administrar Personal</a>
                <a class="nav-link" style="padding-right: 16px;padding-left: 43px;">&gt; Gestionar Usuarios</a>
                @can('Gestionar Personal')
                    <a class="nav-link" href="{{ route('employees.index') }}" style="padding-right: 16px;padding-left: 43px;">&gt; Gestionar Personal</a>
                @endcan
                <a class="nav-link" style="padding-right: 16px;padding-left: 43px;">&gt; Gestionar Ordenes<br>&nbsp; &nbsp;de Trabajo</a>
                <a class="nav-link" style="padding-right: 16px;padding-left: 43px;">&gt; Gestionar<br>&nbsp;&nbsp;Departamentos</a>
                <a class="nav-link" style="padding-right: 16px;padding-left: 43px;">&gt; Administrar<br>&nbsp;
                &nbsp;Asistencias</a>
                <a class="nav-link" style="padding-right: 16px;padding-left: 43px;">&gt; Administrar<br>&nbsp;&nbsp;Ausencias</a>
                <a class="nav-link" style="padding-right: 16px;padding-left: 43px;">&gt;Gestionar Carrera<br>&nbsp; &nbsp;Administrativa</a>
                <a class="nav-link" style="padding-right: 16px;padding-left: 43px;">&gt; Gestionar Capacitación<br>&nbsp; &nbsp;Interna</a>
                <a class="nav-link" style="padding-right: 16px;padding-left: 43px;">&gt; Gestionar Contratos</a>
                <a class="nav-link" style="padding-right: 16px;padding-left: 43px;">&gt; Gestionar Cargos</a>
                <a class="nav-link" style="padding-right: 16px;padding-left: 43px;">&gt; Gestionar Planificaciones <br>&nbsp; &nbsp;Laborales</a>
                <a class="nav-link" style="padding-right: 16px;padding-left: 43px;">&gt; Gestionar Horarios<br></a>
                <a class="nav-link" href="{{ route('roles.index') }}" style="padding-right: 16px;padding-left: 43px;">&gt; Gestionar Roles<br></a>
                <a class="nav-link" href="{{ route('permissions.index') }}"
                   style="padding-right: 16px;padding-left: 43px;">&gt; Gestionar Permisos<br></a>
            </li>
            <li class="nav-item"><a class="nav-link" style="color: rgba(0,1,1,0.8);font-size: 18px;">Administrar Reportes</a>
                <a class="nav-link" style="padding-right: 16px;padding-left: 43px;">&gt; Administrar Reportes<br>&nbsp; &nbsp;del Personal</a>
                <a class="nav-link" style="padding-right: 16px;padding-left: 43px;">&gt; Administrar Planilla<br>&nbsp; &nbsp;de Sueldos</a>
            </li>
            <li class="nav-item"><a class="nav-link" style="color: rgba(0,1,1,0.8);font-size: 18px;">Administrar de Pagos</a>
                <a class="nav-link" style="padding-right: 16px;padding-left: 43px;">&gt; Administrar Salarios</a>
                <a class="nav-link" style="padding-right: 16px;padding-left: 43px;">&gt;Asignar Beneficio Prima</a>
                <a class="nav-link" style="padding-right: 16px;padding-left: 43px;">&gt; Aplicar Descuentos a<br>&nbsp; &nbsp;Empleados</a>
                <a class="nav-link" style="padding-right: 16px;padding-left: 43px;">&gt; Asignar Beneficios<br>&nbsp;&nbsp;Horas Extras</a>
            </li>
            <li class="nav-item"><a class="nav-link" style="color: rgba(0,1,1,0.8);font-size: 18px;">Administrar Seguridad</a>
                <a class="nav-link" style="padding-right: 16px;padding-left: 43px;">&gt; Gestionar Bitácora</a>
                <a class="nav-link" style="padding-right: 16px;padding-left: 43px;">&gt;Gestionar <br>&nbsp; &nbsp;Copias de Seguridad</a>
            </li>
            <li class="nav-item"><a class="nav-link" style="color: rgba(0,1,1,0.8);font-size: 17px;">Administrar Postulantes</a>
                <a class="nav-link" style="padding-right: 16px;padding-left: 43px;">&gt; Gestionar Reportes<br>&nbsp; &nbsp;de Postulantes</a>
                <a class="nav-link" style="padding-right: 16px;padding-left: 43px;">&gt; Gestionar Postulantes<br></a>
            </li>
        </ul>
        <div class="text-center d-none d-md-inline"></div>
    </div>
</nav>
