@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Grilla de Documentos Internos
@endsection

@section('contentheader_title')
    Resoluciones Exentas, Afectas y Ordinarios
@endsection

@section('contentheader_description')
    - Grilla 2020
@endsection

@section('main-content')

    <div class="col-sm-12">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class=""><a href="#distribucion" data-toggle="tab" aria-expanded="true"><i
                                class="fa fa-retweet"></i>
                        <strong>Recepción en Distribución</strong></a></li>
                <li class="active"><a href="#principal" data-toggle="tab" aria-expanded="false"><i
                                class="fa fa-user"></i>
                        <strong>Recepción Directa</strong></a></li>
                <li class=""><a href="#copia" data-toggle="tab" aria-expanded="false"><i
                                class="fa fa-copy"></i>
                        <strong>Solicitud de Copia</strong></a></li>
            </ul>

            <div class="tab-content">

                <div id="principal" class="tab-pane">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Grilla de Documentos Recibidos como Receptor Principal</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="GrillaPrincipal" class="table table-bordered table-hover">
                                            <thead>
                                            <tr>
                                                <th>Fecha</th>
                                                <th># Folio</th>
                                                <th>Tipo</th>
                                                <th>Materia</th>
                                            </tr>
                                            </thead>
                                            @foreach($docs_propios as $listado)
                                                <tr>
                                                    <td>{{ $listado->fechadocint }}<br>
                                                        @if($listado->lectfuncdocint == 0)
                                                            <small class="label bg-red">NO LEIDO</small>
                                                        @elseif($listado->lectfuncdocint == 1)
                                                            <small class="label bg-green">LEIDO</small>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <center>
                                                            <form action='/FichaDocsInt' method='POST'>
                                                                <input type='hidden' name='_token'
                                                                       value="{{ csrf_token() }}">
                                                                <input type='hidden' name='apertura'
                                                                       value="1">
                                                                <input type='hidden' name='idficdocint'
                                                                       value="{{ $listado->iddocint }}">
                                                                <button class='btn btn-xs btn-primary'><i
                                                                            class='fa fa-file-archive-o'></i> {{ $listado->foliocompdocint}}
                                                                </button>
                                                            </form>
                                                        </center>
                                                    </td>
                                                    <td>{{ $listado->tipodocint }}</td>
                                                    <td>{{ $listado->matdocint }}</td>
                                                </tr>
                                            @endforeach
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>

                <div class="tab-pane active" id="distribucion">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Grilla de Documentos Recibidos en Distribución</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="GrillaPrincipal2" class="table table-bordered table-hover">
                                            <thead>
                                            <tr>
                                                <th>Fecha</th>
                                                <th># Folio</th>
                                                <th>Tipo</th>
                                                <th>Materia</th>
                                            </tr>
                                            </thead>
                                            @foreach($docs_dist as $listado)
                                                <tr>
                                                    <td>{{ $listado->fechadocint }}</td>
                                                    <td>
                                                        @if($listado->lectfuncdocint == 0)
                                                            <center><small class="label bg-red">NO LEIDO</small>
                                                            </center>
                                                        @elseif($listado->lectfuncdocint == 1)
                                                            <center><small class="label bg-green">LEIDO</small></center>
                                                        @endif
                                                        <center>
                                                            <form action='/FichaDocsInt' method='POST'>
                                                                <input type='hidden' name='_token'
                                                                       value="{{ csrf_token() }}">
                                                                <input type='hidden' name='apertura'
                                                                       value="1">
                                                                <input type='hidden' name='idficdocint'
                                                                       value="{{ $listado->iddocint }}">
                                                                <button class='btn btn-xs btn-primary'><i
                                                                            class='fa fa-file-archive-o'></i> {{ $listado->foliocompdocint}}
                                                                </button>
                                                            </form>
                                                        </center>
                                                    </td>
                                                    <td>{{ $listado->tipodocint }}</td>
                                                    <td>{{ $listado->matdocint }}</td>
                                                </tr>
                                            @endforeach
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>

                <div class="tab-pane" id="copia">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Grilla de Documentos Recibidos en Copia</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="GrillaPrincipal3" class="table table-bordered table-hover">
                                            <thead>
                                            <tr>
                                                <th>Fecha</th>
                                                <th># Folio</th>
                                                <th>Tipo</th>
                                                <th>Materia</th>
                                                <th>Estado</th>
                                            </tr>
                                            </thead>
                                            @foreach($docs_copia as $listado)
                                                <tr>
                                                    <td>{{ $listado->fechadocint }}</td>
                                                    <td>
                                                        <center>
                                                            <form action='/FichaDocsInt' method='POST'>
                                                                <input type='hidden' name='_token'
                                                                       value="{{ csrf_token() }}">
                                                                <input type='hidden' name='apertura'
                                                                       value="1">
                                                                <input type='hidden' name='idficdocint'
                                                                       value="{{ $listado->iddocint }}">
                                                                <button class='btn btn-xs btn-primary'><i
                                                                            class='fa fa-file-archive-o'></i> {{ $listado->foliocompdocint}}
                                                                </button>
                                                            </form>
                                                        </center>
                                                    </td>
                                                    <td>{{ $listado->tipodocint }}</td>
                                                    <td>{{ $listado->matdocint }}</td>
                                                    <td>@if($listado->estadofucdocint == null)
                                                            <strong>NO LEIDO</strong>
                                                        @elseif($listado->estadofucdocint == 1)
                                                            <strong>APERTURADO</strong>
                                                        @elseif($listado->estadofucdocint == 2)
                                                            <strong>ARCHIVADO</strong>
                                                        @endif</td>
                                                </tr>
                                            @endforeach
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>

            </div>
        </div>
    </div>


@endsection
