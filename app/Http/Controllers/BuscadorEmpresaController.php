<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
/* Model Tenant */
use App\Models\Tenant;
/* url */
use Illuminate\Support\Facades\URL;

class BuscadorEmpresaController extends Controller
{
    //
    public function index(Request $request)
    {
        /* dd($request->all()); */
        $empresa = $request->get('id');
        $tenants = Tenant::where('id', $empresa)->get();
        if ($tenants->count() > 0) {
            $id=$tenants[0]->id;
            return redirect($id.'/login');
        } else {
            /* Mensaje Error */
            return redirect()->route('login-buscador')->with('error', 'No se encontro la empresa');
            /* return view('central.login-buscador'); */
        }
        return view('buscadorEmpresa', compact('tenants'));
    }
}
