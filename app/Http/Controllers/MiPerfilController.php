<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;

class MiPerfilController extends Controller
{

    public function index()
    {

        $mi_perfil = DB::table('listado_funcionarios')
            ->where('idfunc', '=', Auth::user()->idunicfunc)
            ->first();

        return view('back_end.perfil.miperfil', [
            'mi_perfil' => $mi_perfil
        ]);

    }

}
