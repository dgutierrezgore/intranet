@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Unidad Informática
@endsection

@section('contentheader_title')
    Unidad Informática
@endsection

@section('contentheader_description')
    - Reserva de Equipamiento
@endsection

@section('main-content')

    <div class="row">
        <div class="col-md-6">
            <div class="alert alert-info alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-info"></i> Equipamiento Disponible!</h4>
                Proyector Multimedia - Notebooks - Sesión de Zoom Premium
            </div>
        </div>
    </div>

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="row">
        <div class="col-md-6">
            <div class="box box-success">
                <center><h4><strong>FORMULARIO DE RESERVA HARDWARE</strong></h4></center>
                <form class='form-horizontal' action="/UnidInformatica/GuardarReserva" method="POST">
                    <input type="hidden" name="tipodocint" value="1">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="box-body">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">Equipamiento</label>
                            <div class="col-sm-8">
                                <select class="form-control" id="combo_equi" name="equipamiento" required>
                                    <option value="">Seleccionar...</option>
                                    @foreach($equipamiento as $listado)
                                        <option value="{{ $listado->idinf_hard_res  }}">{{ $listado->nombrehard }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">Disponibilidad</label>
                            <div class="col-sm-8">
                                <select class="form-control" id="combo_dispo" name="disponibilidad" required>
                                    <option value="">Seleccionar...</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">Ubicación de Uso</label>
                            <div class="col-sm-8">
                                <select class="form-control" id="combo_ubic" name="utilizacion" required>
                                    <option value="">Seleccionar...</option>
                                    <option value="1">Edificio Institucional (Prat - Concepción)</option>
                                    <option value="2">Edificio UPP (Arauco - Biobío)</option>
                                    <option value="3">Otro Servicio Público</option>
                                    <option value="4">Terreno</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">Observaciones</label>
                            <div class="col-sm-8">
                                <textarea class="form-control" name="obshard" id="" cols="30" rows="4"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">Responsable</label>
                            <div class="col-sm-8">
                                <input class="form-control" type="text" value="{{Auth::user()->name}}" readonly>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">Fecha Solicitud</label>
                            <div class="col-sm-8">
                                <input class="form-control" type="text" value="{{ date('Y-m-d') }}" readonly>
                            </div>
                        </div>

                    </div>
                    <div class="box-footer">
                        <button type="reset" class="btn btn-default"><i class="fa fa-eraser"></i> Limpiar Formulario
                        </button>
                        <button type="submit" class="btn btn-primary pull-right"><i
                                    class="fa fa-save"></i> Reservar Equipamiento
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-6">
            <div class="box box-danger">
                <center><h4><strong>MIS RESERVAS DE EQUIPAMIENTO</strong></h4></center>
                <div class="box-body no-padding">
                    <table class="table table-condensed">
                        <tbody>
                        <tr>
                            <th style="width: 25px">#</th>
                            <th>Equipamiento</th>
                            <th>Fecha</th>
                            <th style="width: 200px">Acción</th>
                        </tr>
                        <tr>
                            <td>1.</td>
                            <td>Notebook Lenovo 1</td>
                            <td>15-01-2020 - 15:30 a 16:30</td>
                            <td>
                                <button class="btn btn-xs btn-warning" type="submit"><i
                                            class="fa fa-calendar-minus-o"></i> CANCELAR RESERVA
                                </button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>


@endsection

