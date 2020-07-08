@if(auth()->user()->role == 'Administrador')
    <li class="nav-item has-treeview">
        <a href="#" class="nav-link active">

            <i class="nav-icon fas fa-tools"></i>
            <p>
                Administracion
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{route ('users.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-users-cog"></i>
                    <p>Gestion de usuarios</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route ('customers.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>Gestion de clientes</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route ('businesses.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-building"></i>
                    <p>Gestion de empresas</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('equipments.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-desktop"></i>
                    <p>Gestion de equipos</p>
                </a>
            </li>
        </ul>
    </li>
    <li class="nav-item has-treeview">
        <a href="#" class="nav-link active">
            <i class="nav-icon fas fa-toolbox"></i>
            <p>
                Soporte
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{route ('work-orders.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-paste"></i>
                    <p>Gestion de ordenes</p>
                </a>
            </li>
        </ul>
    </li>
    <li class="nav-item has-treeview">
        <a href="#" class="nav-link active">
            <i class="nav-icon fas fa-align-justify"></i>
            <p>
                Mantenedores
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{ route('equipment-types.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-desktop"></i>
                    <p>tipos de equipo</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('actions.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-tasks"></i>
                    <p>Acciones OT</p>
                </a>
            </li>
        </ul>
    </li>
@elseif(auth()->user()->role == 'Técnico')
    <li class="nav-item has-treeview">
        <a href="#" class="nav-link active">

            <i class="nav-icon fas fa-tools"></i>
            <p>
                Administracion
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{route ('customers.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>Gestion de clientes</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('equipments.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-desktop"></i>
                    <p>Gestion de equipos</p>
                </a>
            </li>
        </ul>
    </li>
    <li class="nav-item has-treeview">
        <a href="#" class="nav-link active">
            <i class="nav-icon fas fa-toolbox"></i>
            <p>
                Soporte
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{route ('work-orders.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-paste"></i>
                    <p>Gestion de ordenes</p>
                </a>
            </li>
        </ul>
    </li>
    <li class="nav-item has-treeview">
        <a href="#" class="nav-link active">
            <i class="nav-icon fas fa-align-justify"></i>
            <p>
                Mantenedores
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{ route('equipment-types.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-desktop"></i>
                    <p>tipos de equipo</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('actions.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-tasks"></i>
                    <p>Acciones OT</p>
                </a>
            </li>
        </ul>
    </li>
@elseif(auth()->user()->role == 'Secretaría')
    <li class="nav-item has-treeview">
        <a href="#" class="nav-link active">

            <i class="nav-icon fas fa-tools"></i>
            <p>
                Administracion
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{route ('customers.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>Gestion de clientes</p>
                </a>
            </li>
        </ul>
    </li>
    <li class="nav-item has-treeview">
        <a href="#" class="nav-link active">
            <i class="nav-icon fas fa-toolbox"></i>
            <p>
                Soporte
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{route ('work-orders.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-paste"></i>
                    <p>Gestion de ordenes</p>
                </a>
            </li>
        </ul>
    </li>
@endif
