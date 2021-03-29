@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Unidad Informática
@endsection

@section('contentheader_title')
    Unidad Informática
@endsection

@section('contentheader_description')
    - Biblioteca de Información
@endsection

@section('main-content')

    <div class="row">
        <div class="col-md-12">
            <div class="box box-danger box-solid collapsed-box">
                <div class="box-header with-border">
                    <h3 class="box-title">[Unidad Informática] Incidencias de Seguridad / Alertas Públicas</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                        </button>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body" style="display: none;">
                    <div class="box">
                        <div class="box-body">
                            <table class="table table-bordered">
                                <tbody>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Documento</th>
                                    <th>Versión</th>
                                    <th>Criticidad Incidencia</th>
                                    <th>Fecha / Hora Inicio</th>
                                    <th>Fecha / Hora Término</th>
                                    <th style="width: 40px">
                                        <center><i class="fa fa-download"></i></center>
                                    </th>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>

    <hr>

    <div class="row">
        <div class="col-md-6">
            <div class="box box-primary box-solid collapsed-box">
                <div class="box-header with-border">
                    <h3 class="box-title">[Unidad Informática] Manual de Procedimientos</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                        </button>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body" style="display: none;">
                    <div class="box">
                        <div class="box-body">
                            <table class="table table-bordered">
                                <tbody>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Documento</th>
                                    <th>Versión</th>
                                    <th style="width: 40px">
                                        <center><i class="fa fa-download"></i></center>
                                    </th>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
        <div class="col-md-6">
            <div class="box box-success box-solid collapsed-box">
                <div class="box-header with-border">
                    <h3 class="box-title">[Unidad Informática] Políticas y Procedimientos</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                        </button>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body" style="display: none;">
                    <div class="box">
                        <div class="box-body">
                            <table class="table table-bordered">
                                <tbody>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Documento</th>
                                    <th>Versión</th>
                                    <th style="width: 40px">
                                        <center><i class="fa fa-download"></i></center>
                                    </th>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>

    <hr>

    <div class="row">
        <div class="col-md-6">
            <div class="box box-info box-solid collapsed-box">
                <div class="box-header with-border">
                    <h3 class="box-title">[Transformación Digital] Mesa Transformación Digital</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                        </button>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body" style="display: none;">
                    <div class="box">
                        <div class="box-body">
                            <table class="table table-bordered">
                                <tbody>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Documento</th>
                                    <th>Versión</th>
                                    <th style="width: 40px">
                                        <center><i class="fa fa-download"></i></center>
                                    </th>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>

    <hr>

    <div class="row">
        <div class="col-md-6">
            <div class="box box-warning box-solid collapsed-box">
                <div class="box-header with-border">
                    <h3 class="box-title">[Seguridad de la Información] Políticas Seguridad de la Información</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                        </button>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body" style="display: none;">
                    <div class="box">
                        <div class="box-body">
                            <table class="table table-bordered">
                                <tbody>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Documento</th>
                                    <th>Versión</th>
                                    <th style="width: 40px">
                                        <center><i class="fa fa-download"></i></center>
                                    </th>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>

@endsection