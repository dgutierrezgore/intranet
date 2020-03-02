<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <center>
            <a href="/home"><img src="img/logo.png" alt="Logo Gobierno Regional del Biobío"></a>
        </center>
        <ul class="sidebar-menu">
            <li class="active"><a href="{{ url('home') }}"><i class='fa fa-dashboard'></i> <span>Inicio Consola</span></a></li>
            <li class="header">- CORRESPONDENCIA DIGITAL -</li>
            <li class="treeview">
                <a href="#"><i class='fa fa-book'></i> <span>Mis Documentos</span> <i
                        class="fa fa-angle-down pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="/Partes"><i class="fa fa-building"></i> Oficina de Partes</a></li>
                    <li><a href="/XXX"><i class="fa fa-folder-open"></i> Central de Documentación</a></li>
                    <li><a href="/XXX"><i class="fa fa-archive"></i> Archivo Personal</a></li>
                </ul>
            </li>
            <li class="header">- UNIDADES TRANSVERSALES -</li>

            <li class="treeview">
                <a href="#"><i class='fa fa-users'></i> <span>Gest. de Personas</span> <i
                        class="fa fa-angle-down pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="/XXX"><i class="fa fa-file-pdf-o"></i> Cometidos</a></li>
                    <li><a href="/XXX"><i class="fa fa-plus-circle"></i> -</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class='fa fa-code'></i> <span>Unidad Informática</span> <i
                        class="fa fa-angle-down pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="/XXX"><i class="fa fa-codepen"></i> Solicitar Asistencia</a></li>
                    <li><a href="/XXX"><i class="fa fa-laptop"></i> Préstamo de Equipamiento</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#"><i class='fa fa-wrench'></i> <span>Unidad Operaciones</span> <i
                        class="fa fa-angle-down pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="/XXX"><i class="fa fa-codepen"></i> Solicitar Asistencia</a></li>
                    <li><a href="/XXX"><i class="fa fa-car"></i> Solicitud de Vehículos</a></li>
                    <li><a href="/XXX"><i class="fa fa-calendar"></i> Solicitud de Salones</a></li>
                </ul>
            </li>

            <li class="header">- OPCIONES DEL SISTEMA -</li>
            <li><a href="{{ url('/logout') }}"
                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                    <i class="fa fa-sign-out"></i> Cerrar Sesión
                </a></li>
            <form id="logout-form" action="{{ url('/logout') }}" method="POST"
                  style="display: none;">
                {{ csrf_field() }}
                <input type="submit" value="logout" style="display: none;">
            </form>
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
