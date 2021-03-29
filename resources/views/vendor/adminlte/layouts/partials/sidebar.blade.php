<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <center>
            <a href="/home"><img src="../img/logo.png" alt="Logo Gobierno Regional del Biobío"></a>
        </center>
        <ul class="sidebar-menu">
            <li class="active"><a href="{{ url('home') }}"><i class='fa fa-home'></i> <span>Inicio Intranet</span></a>
            </li>
            <li class="header">- CORRESPONDENCIA DIGITAL -</li>
            <li class="treeview">
                <a href="#"><i class='fa fa-book'></i> <span>Oficina de Partes</span>
                    <span class="pull-right-container">
                    <small class="label bg-blue"><i class="fa fa-smile-o"> </i></small></span>
                    <ul class="treeview-menu">
                        <li><a href="/Partes"><i class="fa fa-file-pdf-o"></i> Documentos Internos</a></li>
                        <li><a href="/Documentos2020"><i class="fa fa-archive"></i> Documentos Internos 2020</a></li>
                        <li><a href="/DocsTags"><i class="fa fa-tags"></i> Búsqueda por Tags</a></li>
                    </ul>
            </li>
            <li class="header">- TRAMITACIÓN INTERNA DIGITAL -</li>

            <li class="header">- OPCIONES DEL SISTEMA -</li>
            <li class="treeview">
                <a href="#"><i class='fa fa-gears'></i> <span>Mi Perfil</span> <i
                            class="fa fa-angle-down pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="/Perfil"><i class="fa fa-user"></i> Mi Perfil</a></li>
                </ul>
            </li>
            <li><a href="/Versiones"><i class='fa fa-code'></i> <span>Control de Versiones</span> <small
                            class="label bg-blue"><i
                                class="fa fa-smile-o"> </i></small></a></li>
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
