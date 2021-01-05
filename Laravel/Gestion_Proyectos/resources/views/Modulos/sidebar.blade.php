<aside class="main-sidebar sidebar-dark-primary elevation-4 bg-navy" >
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{url('/')}}/IMG/admin.png" class="img-circle elevation-4 nav-icon" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2" >
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-header">PANEL DE CONTROL</li>
                <li class="nav-item has-treeview">
                    <a href="{{url('/index')}}" class="nav-link">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Inicio
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{url('sms')}}" class="nav-link" >
                        <i class="nav-icon fas fa-comment"></i>
                        <p>
                            Mensajes
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview ">
                    <a href="{{url('/tareas')}}" class="nav-link">
                        <i class="nav-icon fas fa-clipboard"></i>
                        <p>
                            Tareas
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('subtareas.index')}}" class="nav-link">
                        <i class="nav-icon far fa-clipboard"></i>
                        <p>Subtareas</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('empleado.index')}}" class="nav-link">
                        <i class="nav-icon fab fa-black-tie nav-icon"></i>
                        <p>Empleados</p>
                    </a>
                </li>

                <li class="nav-header">RECURSOS</li>
                <li class="nav-item ">
                    <a href="{{url('/r_humano')}}" class="nav-link">
                        <i class="fas fa-brain nav-icon"></i>
                        <p>Humanos</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('r_tecnologico.index')}}" class="nav-link">
                        <i class="fas fa-atom nav-icon"></i>
                        <p>Tecnológicos</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
