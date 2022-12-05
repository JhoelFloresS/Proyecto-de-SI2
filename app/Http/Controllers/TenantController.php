<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Tenant;
use App\Models\tenant\Departamento;
use Illuminate\Http\Request;

class TenantController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function create(Request $request)
    {
        $tenant = new Tenant();
        $tenant->name = $request->nombre;
        $tenant->id = $request->identificador;
        $tenant->email = $request->email;
        $tenant->save();

        $tenant->run( function() {
            
        });
        return redirect()->route('tenant.view');
    }
}
