@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Control de Versiones
@endsection

@section('contentheader_title')
    Control de Versiones
@endsection

@section('contentheader_description')
    - Última Versión V.03
@endsection

@section('main-content')

    <div class="container-fluid spark-screen">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">

                <div class="panel panel-warning">
                    <div class="panel-heading">
                        <i class="fa fa-newspaper-o"></i> <strong>Cuadro Panel de Novedades al 15 de Julio 2021</strong>
                        <small>V.03</small>
                    </div>

                    <div class="panel-body">
                        Hemos incorporado este panel de novedades para que revises los avances de digitalización
                        <span
                                class="pull-right-container">

              <small class="label bg-blue"><i class="fa fa-smile-o"> </i></small>
            </span>
                    </div>
                    <div class="panel-body">
                        <ul>
                            <i class="fa fa-check"></i> Se reinicia el folio, y se archivan los documentos 2021 y 2020.
                        </ul>
                    </div>
                </div>

                <div class="panel panel-info">
                    <div class="panel-heading">
                        <i class="fa fa-newspaper-o"></i> <strong>Cuadro Panel de Novedades al 29 de Mayo 2020</strong>
                        <small>V.02</small>
                    </div>

                    <div class="panel-body">
                        Hemos incorporado este panel de novedades para que revises los avances de digitalización
                        <span
                                class="pull-right-container">

              <small class="label bg-blue"><i class="fa fa-smile-o"> </i></small>
            </span>
                    </div>
                    <div class="panel-body">
                        <ul>
                            <i class="fa fa-check"></i> Se incorpora nuevo panel de novedades. <br>
                            <i class="fa fa-check"></i> Se rediseñó el menú lateral para que el acceso a recursos
                            institucionales sea más intuitivo.
                            <br>
                            <i class="fa fa-check"></i> Los Documentos Digitales provenientes de Of. de Partes se
                            ordenan por último en llegar.
                            <br>
                            <i class="fa fa-check"></i> Se incorpora la posibilidad de agregar tags personalizados a los
                            documentos
                            para
                            hacer más fácil su búsqueda.
                            <br>
                            <i class="fa fa-check"></i> Se añade repositorio personal de documentos, catalogados por
                            División, Departamento y Unidad emisora
                            <br>
                            <i class="fa fa-check"></i> Se añade botón para
                            <strong>aportar ideas para la digitalización de la Intranet Institucional</strong>.
                        </ul>
                    </div>
                </div>

                <div class="panel panel-info">
                    <div class="panel-heading">
                        <i class="fa fa-newspaper-o"></i> <strong>Cuadro Panel de Novedades al 12 de Febrero
                            2020</strong>
                        <small>V.01</small>
                    </div>

                    <div class="panel-body">
                        Fase Beta, inicio de marcha blanca con División de Planificación y Desarrollo Regional -
                        DIPLADE.
                        <span
                                class="pull-right-container">

              <small class="label bg-blue"><i class="fa fa-smile-o"> </i></small>
            </span>
                    </div>
                    <div class="panel-body">
                        <ul>
                            <i class="fa fa-check"></i> Hola Mundo. <br>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection