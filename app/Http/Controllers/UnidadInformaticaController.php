<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;

class UnidadInformaticaController extends Controller
{

    public function documentos_publicos()
    {

        return view('back_end.unidinf.docspubs');
    }

    public function reservas()
    {

        $equipamiento = DB::table('inf_hard_res')
            ->where('estadohard', 1)
            ->get();

        return view('back_end.unidinf.reservas', [
            'equipamiento' => $equipamiento
        ]);
    }

    public function disponibilidad()
    {

        $retorno = DB::table('inf_dispo_hard')
            ->where([
                ['inf_hard_res_idinf_hard_res', $_POST['id']],
                ['estadodispo', 1]
            ])
            ->whereDate('fechadispo', '>=', date('Y-m-d'))
            ->get();

        return $retorno;
    }

    public function reservar(Request $request)
    {

        try {

            DB::table('inf_reservas_hard')->insert([
                'fecreshard' => date('Y-m-d H:i:s'),
                'condusohard' => $request->utilizacion,
                'obsreserhard' => $request->obshard,
                'unicreshard' => 'A',
                'estadoreshard' => 1,
                'inf_dispo_hard_idinfdispohard' => $request->disponibilidad,
                'inf_hard_res_idinf_hard_res' => $request->equipamiento,
                'users_id' => Auth::id(),
            ]);

            // CORREO

            return back()->with('status', 'Reserva realizada con éxito.');

        } catch (Throwable $e) {
            return back()->with('error', 'Reserva sin éxito.');
        }

    }

}
