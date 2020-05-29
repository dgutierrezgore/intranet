@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Búsqueda de Documentos
@endsection

@section('contentheader_title')
    Búsqueda de Documentos
@endsection

@section('contentheader_description')
    - Tags Personales
@endsection

@section('main-content')

    <div class="container-fluid spark-screen">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">

                <div class="panel panel-success">
                    <div class="panel-heading"><i class="fa fa-tags"></i> Mis Tags</div>

                    <div class="panel-body">
                        @foreach($mis_tags as $listado)
                            @if($listado->icotag == 1)
                                @if($listado->coloricotag== 1)
                                    <div class="col-md-1">
                                        <form action='/GrillaTags' method='POST'>
                                            <input type='hidden' name='_token'
                                                   value="{{ csrf_token() }}">
                                            <input type='hidden' name='idtags'
                                                   value="{{$listado->idmistags }}">
                                            <button type="submit" class='btn btn-xs btn-danger'><i
                                                        class='fa fa-info'></i> {{ $listado->nomtag}}
                                            </button>
                                        </form>
                                    </div>
                                @elseif($listado->coloricotag== 2)
                                    <div class="col-md-1">
                                        <form action='/GrillaTags' method='POST'>
                                            <input type='hidden' name='_token'
                                                   value="{{ csrf_token() }}">
                                            <input type='hidden' name='idtags'
                                                   value="{{$listado->idmistags }}">
                                            <button type="submit" class='btn btn-xs btn-warning'><i
                                                        class='fa fa-info'></i> {{ $listado->nomtag}}
                                            </button>
                                        </form>
                                    </div>
                                @elseif($listado->coloricotag== 3)
                                    <div class="col-md-1">
                                        <form action='/GrillaTags' method='POST'>
                                            <input type='hidden' name='_token'
                                                   value="{{ csrf_token() }}">
                                            <input type='hidden' name='idtags'
                                                   value="{{$listado->idmistags }}">
                                            <button type="submit" class='btn btn-xs btn-success'><i
                                                        class='fa fa-info'></i> {{ $listado->nomtag}}
                                            </button>
                                        </form>
                                    </div>
                                @endif
                            @elseif($listado->icotag == 2)
                                @if($listado->coloricotag== 1)
                                    <div class="col-md-1">
                                        <form action='/GrillaTags' method='POST'>
                                            <input type='hidden' name='_token'
                                                   value="{{ csrf_token() }}">
                                            <input type='hidden' name='idtags'
                                                   value="{{$listado->idmistags }}">
                                            <button type="submit" class='btn btn-xs btn-danger'><i
                                                        class='fa fa-warning'></i> {{ $listado->nomtag}}
                                            </button>
                                        </form>
                                    </div>
                                @elseif($listado->coloricotag== 2)
                                    <div class="col-md-1">
                                        <form action='/GrillaTags' method='POST'>
                                            <input type='hidden' name='_token'
                                                   value="{{ csrf_token() }}">
                                            <input type='hidden' name='idtags'
                                                   value="{{$listado->idmistags }}">
                                            <button type="submit" class='btn btn-xs btn-warning'><i
                                                        class='fa fa-warning'></i> {{ $listado->nomtag}}
                                            </button>
                                        </form>
                                    </div>
                                @elseif($listado->coloricotag== 3)
                                    <div class="col-md-1">
                                        <form action='/GrillaTags' method='POST'>
                                            <input type='hidden' name='_token'
                                                   value="{{ csrf_token() }}">
                                            <input type='hidden' name='idtags'
                                                   value="{{$listado->idmistags }}">
                                            <button type="submit" class='btn btn-xs btn-success'><i
                                                        class='fa fa-warning'></i> {{ $listado->nomtag}}
                                            </button>
                                        </form>
                                    </div>
                                @endif
                            @elseif($listado->icotag == 3)
                                @if($listado->coloricotag== 1)
                                    <div class="col-md-1">
                                        <form action='/GrillaTags' method='POST'>
                                            <input type='hidden' name='_token'
                                                   value="{{ csrf_token() }}">
                                            <input type='hidden' name='idtags'
                                                   value="{{$listado->idmistags }}">
                                            <button type="submit" class='btn btn-xs btn-danger'><i
                                                        class='fa fa-search'></i> {{ $listado->nomtag}}
                                            </button>
                                        </form>
                                    </div>
                                @elseif($listado->coloricotag== 2)
                                    <div class="col-md-1">
                                        <form action='/GrillaTags' method='POST'>
                                            <input type='hidden' name='_token'
                                                   value="{{ csrf_token() }}">
                                            <input type='hidden' name='idtags'
                                                   value="{{$listado->idmistags }}">
                                            <button type="submit" class='btn btn-xs btn-warning'><i
                                                        class='fa fa-search'></i> {{ $listado->nomtag}}
                                            </button>
                                        </form>
                                    </div>
                                @elseif($listado->coloricotag== 3)
                                    <div class="col-md-1">
                                        <form action='/GrillaTags' method='POST'>
                                            <input type='hidden' name='_token'
                                                   value="{{ csrf_token() }}">
                                            <input type='hidden' name='idtags'
                                                   value="{{$listado->idmistags }}">
                                            <button type="submit" class='btn btn-xs btn-success'><i
                                                        class='fa fa-search'></i> {{ $listado->nomtag}}
                                            </button>
                                        </form>
                                    </div>
                                @endif
                            @endif
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection