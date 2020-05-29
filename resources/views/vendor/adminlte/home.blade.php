@extends('adminlte::layouts.app')

@section('htmlheader_title')
    {{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')


    <div class="container-fluid spark-screen">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">

                <div class="panel panel-primary">
                    <div class="panel-heading"><i class="fa fa-home"></i> Inicio</div>

                    <div class="panel-body">
                        ¡Hola!, <strong>{{ \Illuminate\Support\Facades\Auth::user()->name }}</strong>, Bienvenido a la
                        <strong>Intranet Institucional</strong>.
                    </div>
                    <div class="panel-body">
                        Si tienes dudas, consultas o sugerencias, contáctate con Daniel Gutiérrez Fariña al anexo 782 ó
                        <br>
                        escribe
                        un correo a: dgutierrez@gorebiobio.cl.
                    </div>
                </div>

                <div class="panel panel-success">
                    <div class="panel-heading"><i class="fa fa-rocket"></i> Digitalización de Intranet Gobierno Regional
                    </div>

                    <div class="panel-body">
                        <button class="btn btn-xs btn-info" data-toggle="modal" data-target="#modal-ideas">
                            <i class="fa fa-lightbulb-o"></i> ¡Aportanos tu idea o comentario!.
                        </button>

                        @if($errors->any())
                            <span class="label label-success">{{$errors->first()}}</span>
                        @endif
                    </div>
                </div>

                <div class="panel panel-warning">
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
                            <i class="fa fa-check"></i> Se configura la hora del sistema a horario Santiago - Chile.
                            <br>
                            <i class="fa fa-check"></i> Se añade botón para
                            <strong>aportar ideas para la digitalización de la Intranet Institucional</strong>.
                        </ul>
                    </div>
                </div>

                <div class="panel panel-info">
                    <div class="panel-heading"><i class="fa fa-rocket"></i> Próximamente en Digitalización de Intranet Gobierno Regional
                    </div>

                    <div class="panel-body">
                        <div class="panel-body">
                            <ul>
                                <i class="fa fa-clock-o"></i> Se añadirá posibilidad de archivar documentos recibidos, dejando limpia la bandeja de entrada. <br>
                                <i class="fa fa-clock-o"></i> Se añadirá repositorio personal de documentos, catalogados
                                por División, Departamento y Unidad emisora. <br>
                                <i class="fa fa-clock-o"></i> Se añadirá posibilidad de configurar perfil con datos de cada uno de los funcionarios. <br>
                                <i class="fa fa-clock-o"></i> Se añadirá posibilidad de agendar reuniones con cuenta Zoom Institucional. <br>
                                <i class="fa fa-clock-o"></i> Se añadirá posibilidad de gestionar digitalmente algunos trámites de unidades y departamentos transversales DAF. <br>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-ideas">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Tu idea o comentario de digitalización.</h4>
                </div>
                <div class="modal-body">
                    <div class="box-body no-padding">
                        <div class="modal-content" id="resp_modal">

                        </div>
                        <form class="form-horizontal" id="form_not_err" method="POST" action="/Ideas">
                            <div class="box-body">
                                <div class="form-group">
                                    <textarea rows="5" id="obsbitdocint" name="ideas" class="form-control"
                                              required></textarea>
                                </div>
                            </div>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="box-footer">
                                <button type="submit" id="btn_cgr_ing" class="btn btn-primary pull-right"><i
                                            class="fa fa-send-o"></i>
                                    Envíar Idea / Sugerencia
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

@endsection
