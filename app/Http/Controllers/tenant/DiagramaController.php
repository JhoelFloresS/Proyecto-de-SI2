<?php

namespace App\Http\Controllers\tenant;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\tenant\Diagrama;


class DiagramaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        return view('tenant.diagramas.index');
    }


    public function show(Request $request)
    {
        // $diagrama = Diagrama::where('id', $request->id)->first();

        $diagrama = Diagrama::all();
        return response()->json($diagrama,200);
    }
    

    public function store(Request $request){

        $diagrama = new Diagrama();
        $diagrama->nombre = $request->nombre;
        $diagrama->json = $request->json;
        $diagrama->save();
        return response()->json($diagrama,200);
    }

    public function update(Request $request, $id){
        
        \Log::debug($id);
        \Log::debug($request->all());

        $diagrama = Diagrama::find($id);
        $diagrama->nombre = $request->nombre;
        $diagrama->json = $request->json;
        $diagrama->save();
        return response()->json($diagrama,200);
    }

    public function destroy(Request $request, $id){
        $diagrama = Diagrama::find($id);
        $diagrama->delete();
        return response()->json($diagrama,200);
    }

}
