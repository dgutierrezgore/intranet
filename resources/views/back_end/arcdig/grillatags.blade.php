@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Grilla Tags
@endsection

@section('contentheader_title')
    Grilla Tags
@endsection

@section('contentheader_description')
    - Búsqueda de Documentos por Tags
@endsection

@section('main-content')

    <div class="container-fluid spark-screen">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">

                <div class="panel panel-info">
                    <div class="panel-heading"><i class="fa fa-tags"></i> Grilla por búsqueda de Tags
                    </div>

                    <div class="panel-body">
                        <i class="fa fa-tags"></i> {{ $nombre_tag->nomtag }}
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="container-fluid spark-screen">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-info">
                    <div class="panel-body">
                        <table id="GrillaPrincipal2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Fecha</th>
                                <th>Tipo</th>
                                <th># Folio</th>
                                <th>Materia</th>
                            </tr>
                            </thead>
                            @foreach($doc_tag as $listado)
                                <tr>
                                    <td>{{ $listado->fechadocint }}</td>
                                    <td>{{ $listado->tipodocint }}</td>
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
    </div>

@endsection