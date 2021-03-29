@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Mi Perfil
@endsection

@section('contentheader_title')
    Mi Perfil
@endsection

@section('contentheader_description')
    - Intranet Institucional
@endsection

@section('main-content')

    <div class="container-fluid spark-screen">
        <div class="row">
            <div class="col-md-11">
                <div class="box box-success">
                    <form class='form-horizontal' action="/" method="POST"
                          enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="box-body">
                            <h4><strong>Datos Personales</strong></h4><br>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">RUT</label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" value="{{ $mi_perfil->rutfunc }}" id="rut"
                                           name="rut" required>
                                </div>
                                <label for="inputEmail3" class="col-sm-1 control-label">Ap. Paterno</label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" value="{{ $mi_perfil->paternofunc }}"
                                           id="ap_paterno"
                                           name="ap_paterno" required>
                                </div>
                                <label for="inputEmail3" class="col-sm-1 control-label">Ap. Materno</label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" value="{{ $mi_perfil->maternofunc }}"
                                           min="0" id="ap_materno"
                                           name="ap_materno" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Nombres</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" value="{{ $mi_perfil->nombresfunc }}"
                                           min="0" id="nombres"
                                           name="nombres" required>
                                </div>
                                <label for="inputEmail3" class="col-sm-2 control-label">Fecha de Nacimiento</label>
                                <div class="col-sm-2">
                                    <input type="date" class="form-control" value="" id="fec_nac"
                                           name="fec_nac" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Mail Institucional</label>
                                <div class="col-sm-3">
                                    <input type="email" class="form-control" value="{{ $mi_perfil->mailfunc }}"
                                           id="mail_ins"
                                           name="mail_ins" required>
                                </div>
                                <label for="inputEmail3" class="col-sm-2 control-label">Mail Personal</label>
                                <div class="col-sm-3">
                                    <input type="email" class="form-control" id="mail_per"
                                           name="mail_per" required>
                                </div>
                            </div>
                            <br>
                            <h4><strong>Datos Institucionales</strong></h4><br>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">División / Departamento /
                                    Unidad</label>
                                <div class="col-sm-8">
                                    <select class="form-control" name="idgrupintdocint[]">
                                        <option value="">Seleccionar...</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Cargo</label>
                                <div class="col-sm-4">
                                    <select class="form-control" name="idgrupintdocint[]">
                                        <option value="">Seleccionar...</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection