<?php

namespace App\Http\Controllers;

use Ajaxray\PHPWatermark\Watermark;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\AvisoErrorEnDocumento;
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
            ->orderby('fechadocint', 'desc')
            ->get();

        $docs_dist = DB::table('op_lec_doc_int')
            ->join('op_documentos_internos', 'op_documentos_internos.iddocint', 'op_lec_doc_int.op_documentos_internos_iddocint')
            ->join('op_tipos_docs_internos', 'op_tipos_docs_internos.iddocsint', 'op_documentos_internos.tipos_docs_internos_iddocsint')
            ->where([
                ['op_lec_doc_int.listado_funcionarios_idfunc', $id_func],
                ['estadolectdocint', 1],
                ['op_lec_doc_int.disdocintfunc', 2]
            ])
            ->orderby('fechadocint', 'desc')
            ->get();

        $docs_copia = DB::table('op_lec_doc_int')
            ->join('op_documentos_internos', 'op_documentos_internos.iddocint', 'op_lec_doc_int.op_documentos_internos_iddocint')
            ->join('op_tipos_docs_internos', 'op_tipos_docs_internos.iddocsint', 'op_documentos_internos.tipos_docs_internos_iddocsint')
            ->where([
                ['op_lec_doc_int.listado_funcionarios_idfunc', $id_func],
                ['estadolectdocint', 1],
                ['op_lec_doc_int.disdocintfunc', 3]
            ])
            ->orderby('fechadocint', 'desc')
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

        $mis_tags = DB::table('op_mis_tags')
            ->where('users_id', '=', Auth::id())
            ->get();

        $tag_docu = DB::table('op_tag_docs_int')
            ->join('op_mis_tags', 'op_mis_tags.idmistags', 'op_tag_docs_int.op_mis_tags_idmistags')
            ->where([
                ['op_documentos_internos_iddocint', '=', $id],
                ['op_mis_tags_users_id', Auth::id()]
            ])
            ->get();

        return view('back_end.arcdig.fic_doc_int', [
            'bitacora' => $bitacora,
            'dis_int' => $dist_interna,
            'dis_ext' => $dist_externa,
            'pdf' => $pdf,
            'bit_pers' => $bit_pers,
            'mis_tags' => $mis_tags,
            'tag_docu' => $tag_docu
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
            'users_id' => Auth::id(),                                            //PENDIENTE AUTH !!!
        ]);

        echo '1';
    }

    public function notifica_error_partes(Request $request)
    {

        if ($request->tipo_err == 1) {
            $error = 'Error Digitalizacion';
        } elseif ($request->tipo_err == 2) {
            $error = 'Error Materia';
        } elseif ($request->tipo_err == 3) {
            $error = 'Error Distribución';
        } elseif ($request->tipo_err == 4) {
            $error = 'Otro Error';
        }

        // Error //
        DB::table('op_error_docs_int')->insert([
            'fecreperrint' => date('Y-m-d h:i:s'),
            'tipoerror' => $error,
            'estadoerrdocint' => '0',
            'listado_funcionarios_idfunc' => Auth::user()->idunicfunc,
            'op_documentos_internos_iddocint' => $request->iddocint
        ]);

        // Bitácora //
        DB::table('op_bitacora_docs_internos')->insert([
            'accbitdocint' => 'Notificación de Error',
            'tipoaccbitdocint' => 6,
            'fecbitdocint' => date('Y-m-d'),
            'horabitdocint' => date('h:i:s'),
            'obsenvficdocint' => null,
            'forsoldocint' => null,
            'refsolenvdocint' => null,
            'obspostdocint' => $request->tipo_err,
            'cpbitdocint' => null,
            'documentos_internos_iddocint' => $request->iddocint,
            'users_id' => Auth::id(),
        ]);

        $documento = DB::table('op_documentos_internos')
            ->where('iddocint', $request->iddocint)
            ->first();

        $reporta = DB::table('users')
            ->where('id', Auth::id())
            ->first();

        $data_correo = array(
            'fecha' => date('Y-m-d'),
            'tipoerror' => $request->tipo_err,
            'numdoc' => $request->iddocint,
            'foliocompdocint' => $documento->foliocompdocint,
            'reporta' => $reporta->name
        );

        Mail::to('dgutierrez@gorebiobio.cl')
            ->cc('partes@gorebiobio.cl')
            ->send(new AvisoErrorEnDocumento($data_correo));

        echo '1';

    }

    public function ideas(Request $request)
    {

        DB::table('sys_ideas_digital')->insert([
            'fecidea' => date('Y-m-d h:i:s'),
            'idea' => $request->ideas,
            'estadoidea' => 1,
            'users_id' => Auth::id(),
        ]);

        return back()->withErrors(['mensaje' => ['Gracias por dejarnos tu mensaje.']]);

    }

    public function creatag(Request $request)
    {

        DB::table('op_mis_tags')->insert([
            'feccreatag' => date('Y-m-d h:i:s'),
            'nomtag' => $request->nombre_tag,
            'icotag' => $request->icotag,
            'coloricotag' => $request->color_tag,
            'tipotag' => 1,
            'estadotag' => 1,
            'users_id' => Auth::id(),
        ]);

        echo '1';
    }

    public function agrega_tag_doc(Request $request)
    {

        DB::table('op_tag_docs_int')->insert([
            'fectagdocint' => date('Y-m-d h:i:s'),
            'idunictag' => $request->iddocint . '-' . $request->tag_personal,
            'esttagdocint' => 1,
            'op_mis_tags_idmistags' => $request->tag_personal,
            'op_documentos_internos_iddocint' => $request->iddocint,
            'op_mis_tags_users_id' => Auth::id(),
        ]);

        echo '1';
    }

    public function busq_tags()
    {

        $mis_tags = DB::table('op_mis_tags')
            ->where('users_id', '=', Auth::id())
            ->get();

        return view('back_end.arcdig.bus_tag', [
            'mis_tags' => $mis_tags
        ]);

    }

    public function listado_tags(Request $request)
    {

        $id_usuario = Auth::id();
        $id_tag = $request->idtags;

        $nombre_tag = DB::table('op_mis_tags')
            ->where('idmistags', '=', $id_tag)
            ->first();

        $documentos_tags = DB::table('op_tag_docs_int')
            ->join('op_documentos_internos', 'op_documentos_internos.iddocint', 'op_tag_docs_int.op_documentos_internos_iddocint')
            ->join('op_tipos_docs_internos', 'op_tipos_docs_internos.iddocsint', 'op_documentos_internos.tipos_docs_internos_iddocsint')
            ->where([
                ['op_mis_tags_idmistags', '=', $id_tag],
                ['op_mis_tags_users_id', Auth::id()]
            ])
            ->get();

        return view('back_end.arcdig.grillatags', ['doc_tag' => $documentos_tags, 'nombre_tag' => $nombre_tag]);

    }

    public function versiones()
    {

        return view('back_end.versiones');

    }
}

