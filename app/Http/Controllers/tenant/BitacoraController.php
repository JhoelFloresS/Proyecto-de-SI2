<?php

namespace App\Http\Controllers\tenant;

use App\Http\Controllers\Controller;
use App\Models\tenant\Bitacora;
use Illuminate\Http\Request;
use App\Events\tenant\RegistrarBitacoraTenant;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class BitacoraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $bitacoras = Bitacora::orderBy('id', 'DESC')->paginate('7');
        $bitacoras->load('user');
        return view('tenant.bitacoras.index', compact('bitacoras'));
    }

    
    public function downloadPdf()
    {
        $bitacoras = Bitacora::orderBy('id', 'DESC')->get();
        $bitacoras->load('user');
        $pdf = Pdf::loadView('tenant.bitacoras.downloadPDF', ['bitacoras' => $bitacoras]);
        event(new RegistrarBitacoraTenant([
            'accion' => 'Exportación de las bitacoras en pdf, por el usuario: '.Auth::user()->name,
        ]));
        return $pdf->download('bitacoras.pdf');
        
    }

}
