<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <center>
            <a href="/home"><img src="img/logo.png" alt="Logo Gobierno Regional del Biobío"></a>
        </center>
        <ul class="sidebar-menu">
            <li class="active"><a href="{{ url('home') }}"><i class='fa fa-dashboard'></i> <span>Home Consola</span></a></li>
            <li class="header">- CORRESPONDENCIA DIGITAL -</li>
            <li class="treeview">
                <a href="#"><i class='fa fa-book'></i> <span>Mis Documentos</span> <i
                        class="fa fa-angle-down pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="/Partes"><i class="fa fa-building"></i> Oficina de Partes</a></li>
                    <li><a href="/CentralDocumentacion"><i class="fa fa-folder-open"></i> Central de Documentación</a></li>
                    <li><a href="/"><i class="fa fa-archive"></i> Archivo Personal</a></li>
                </ul>
            </li>
            <li class="header">- TRAMITACIÓN DIGITAL -</li>

            <li class="treeview">
                <a href="#"><i class='fa fa-dollar'></i> <span>DEPTO. FAO</span> <i
                            class="fa fa-angle-down pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="/"><i class="fa fa-file-pdf-o"></i> Próximamente</a></li>
                    <li><a href="/"><i class="fa fa-plus-circle"></i> -</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class='fa fa-users'></i> <span>DEPTO. DGDP</span> <i
                        class="fa fa-angle-down pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="/"><i class="fa fa-file-pdf-o"></i> Próximamente</a></li>
                    <li><a href="/"><i class="fa fa-plus-circle"></i> -</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class='fa fa-keyboard-o'></i> <span>UNID. INFORMÁTICA</span> <i
                        class="fa fa-angle-down pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="/"><i class="fa fa-file-pdf-o"></i> Próximamente</a></li>
                    <li><a href="/"><i class="fa fa-plus-circle"></i> -</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#"><i class='fa fa-wrench'></i> <span>UNID. OPERACIONES</span> <i
                        class="fa fa-angle-down pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="/"><i class="fa fa-file-pdf-o"></i> Próximamente</a></li>
                    <li><a href="/"><i class="fa fa-plus-circle"></i> -</a></li>
                </ul>
            </li>

            <li class="header">- OPCIONES DEL SISTEMA -</li>
            <li class="treeview">
                <a href="#"><i class='fa fa-gears'></i> <span>Mi Perfil</span> <i
                            class="fa fa-angle-down pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="/"><i class="fa fa-file-pdf-o"></i> Proximamente</a></li>
                    <li><a href="/"><i class="fa fa-file-pdf-o"></i> -</a></li>
                </ul>
            </li>
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
