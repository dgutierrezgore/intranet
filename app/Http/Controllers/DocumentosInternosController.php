<?php

namespace App\Http\Controllers;

use Ajaxray\PHPWatermark\Watermark;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\AvisoDocumentoInterno;
use App\Mail\AvisoReEnvioDocumentoInterno;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Stmt\TryCatch;

class DocumentosInternosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function oficina_partes()
    {

        $id_func = Auth::user()->idunicfunc;

        // Documentos Propios

        $docs_propios = DB::table('op_lec_doc_int')
            ->join('op_documentos_internos', 'op_documentos_internos.iddocint', 'op_lec_doc_int.op_documentos_internos_iddocint')
            ->join('op_tipos_docs_internos', 'op_tipos_docs_internos.iddocsint', 'op_documentos_internos.tipos_docs_internos_iddocsint')
            ->where([
                ['op_lec_doc_int.listado_funcionarios_idfunc', $id_func],
                ['estadolectdocint', 1],
                ['op_lec_doc_int.disdocintfunc', 1]
            ])
            ->get();

        $docs_dist = DB::table('op_lec_doc_int')
            ->join('op_documentos_internos', 'op_documentos_internos.iddocint', 'op_lec_doc_int.op_documentos_internos_iddocint')
            ->join('op_tipos_docs_internos', 'op_tipos_docs_internos.iddocsint', 'op_documentos_internos.tipos_docs_internos_iddocsint')
            ->where([
                ['op_lec_doc_int.listado_funcionarios_idfunc', $id_func],
                ['estadolectdocint', 1],
                ['op_lec_doc_int.disdocintfunc', 2]
            ])
            ->get();

        $docs_copia = DB::table('op_lec_doc_int')
            ->join('op_documentos_internos', 'op_documentos_internos.iddocint', 'op_lec_doc_int.op_documentos_internos_iddocint')
            ->join('op_tipos_docs_internos', 'op_tipos_docs_internos.iddocsint', 'op_documentos_internos.tipos_docs_internos_iddocsint')
            ->where([
                ['op_lec_doc_int.listado_funcionarios_idfunc', $id_func],
                ['estadolectdocint', 1],
                ['op_lec_doc_int.disdocintfunc', 3]
            ])
            ->get();

        return view('back_end.arcdig.home', [
            'docs_propios' => $docs_propios,
            'docs_dist' => $docs_dist,
            'docs_copia' => $docs_copia
        ]);

    }

    public
    function ficha_docs_interno(Request $request)
    {

        $id_func = Auth::user()->idunicfunc;

        $grilla_1 = $request->apertura;
        $id = $request->idficdocint;

        if ($grilla_1 == 1) {
            DB::table('op_lec_doc_int')
                ->where([
                    ['op_documentos_internos_iddocint', $id],
                    ['listado_funcionarios_idfunc', $id_func],
                    ['prilecfundocint', null]
                ])
                ->update([
                    'lectfuncdocint' => 1,
                    'prilecfundocint' => date('Y-m-d H:i:s'),
                ]);
        }

        $tipo_doc = DB::table('op_documentos_internos')
            ->select('tipos_docs_internos_iddocsint')
            ->where('iddocint', '=', $id)
            ->get();

        if ($tipo_doc[0]->tipos_docs_internos_iddocsint == 1) {
            $bitacora = DB::table('op_documentos_internos')
                ->join('op_bitacora_docs_internos', 'op_documentos_internos.iddocint', 'op_bitacora_docs_internos.documentos_internos_iddocint')
                ->join('op_tipos_docs_internos', 'op_tipos_docs_internos.iddocsint', 'op_documentos_internos.tipos_docs_internos_iddocsint')
                ->join('listado_funcionarios', 'listado_funcionarios.idfunc', 'op_documentos_internos.listado_funcionarios_idfunc')
                ->join('users', 'users.id', 'op_documentos_internos.users_id')
                ->where('iddocint', '=', $id)
                ->orderby('op_bitacora_docs_internos.idbitdocint', 'DESC')
                ->get();

        } elseif ($tipo_doc[0]->tipos_docs_internos_iddocsint == 2) {
            $bitacora = DB::table('op_documentos_internos')
                ->join('op_bitacora_docs_internos', 'op_documentos_internos.iddocint', 'op_bitacora_docs_internos.documentos_internos_iddocint')
                ->join('op_tipos_docs_internos', 'op_tipos_docs_internos.iddocsint', 'op_documentos_internos.tipos_docs_internos_iddocsint')
                ->join('users', 'users.id', 'op_documentos_internos.users_id')
                ->where('iddocint', '=', $id)
                ->orderby('op_bitacora_docs_internos.idbitdocint', 'DESC')
                ->get();
        } elseif ($tipo_doc[0]->tipos_docs_internos_iddocsint == 3) {
            $bitacora = DB::table('op_documentos_internos')
                ->join('op_bitacora_docs_internos', 'op_documentos_internos.iddocint', 'op_bitacora_docs_internos.documentos_internos_iddocint')
                ->join('op_tipos_docs_internos', 'op_tipos_docs_internos.iddocsint', 'op_documentos_internos.tipos_docs_internos_iddocsint')
                ->join('users', 'users.id', 'op_documentos_internos.users_id')
                ->where('iddocint', '=', $id)
                ->orderby('op_bitacora_docs_internos.idbitdocint', 'DESC')
                ->get();
        }

        $dist_interna = DB::table('op_det_dist_docs_int')
            ->join('op_grupos_dis_internos', 'op_grupos_dis_internos.idgrpdisint', 'op_det_dist_docs_int.grupos_dis_internos_idgrpdisint')
            ->select('nomgrpdisint')
            ->where('documentos_internos_iddocint', $id)
            ->get();

        $dist_externa = DB::table('op_det_dist_docs_ext')
            ->join('op_grupos_dis_externos', 'op_grupos_dis_externos.idgrpdisext', 'op_det_dist_docs_ext.grupos_dis_externos_idgrpdisext')
            ->where('documentos_internos_iddocint', $id)
            ->get();

        $pdf = DB::table('op_documentos_internos')
            ->where('iddocint', '=', $id)
            ->first();

        $bit_pers = DB::table('op_documentos_internos')
            ->join('op_bitacora_docs_internos', 'op_documentos_internos.iddocint', 'op_bitacora_docs_internos.documentos_internos_iddocint')
            ->where([
                ['iddocint', '=', $id],
                ['tipoaccbitdocint', 5],
                ['op_bitacora_docs_internos.users_id', Auth::id()]
            ])
            ->orderby('op_bitacora_docs_internos.idbitdocint', 'DESC')
        ->get();

        return view('back_end.arcdig.fic_doc_int', [
            'bitacora' => $bitacora,
            'dis_int' => $dist_interna,
            'dis_ext' => $dist_externa,
            'pdf' => $pdf,
            'bit_pers' => $bit_pers
        ]);

    }

    public function guarda_obs_pers(Request $request)
    {

        // Bitácora //
        DB::table('op_bitacora_docs_internos')->insert([
            'accbitdocint' => 'Observaciones Personales',
            'tipoaccbitdocint' => 5,
            'fecbitdocint' => date('Y-m-d'),
            'horabitdocint' => date('h:i:s'),
            'obsenvficdocint' => null,
            'forsoldocint' => null,
            'refsolenvdocint' => null,
            'obspostdocint' => $request->obsbitdocint,
            'segobspostint' => $request->segobsintdocint,
            'cpbitdocint' => null,
            'documentos_internos_iddocint' => $request->iddocint,
            'users_id' =>  Auth::id(),                                            //PENDIENTE AUTH !!!
        ]);

        echo '1';
    }
}

