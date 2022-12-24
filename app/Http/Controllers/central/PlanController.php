<?php

namespace App\Http\Controllers\central;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $planes = Plan::all(); 
        return view('central.planes.index' ,compact('planes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('central.planes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'descripcion'=>'required',
            'precio'=>'required',
        ]);
        
        $plan= new Plan();
        $plan->nombre = $request->name;
        $plan->descripcion = $request->descripcion;
        $plan->precio = $request->precio;
        $plan->descuento = $request->descuento;
        $plan->save();
        

        return redirect()->route('central.planes');  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Plan $plan)
    {
        return view('central.planes.edit',compact('plan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Plan $plan)
    {
        $request->validate([
            'name'=>'required',
            'descripcion'=>'required',
            'precio'=>'required',
        ]);
        
        
        $plan->nombre = $request->name;
        $plan->descripcion = $request->descripcion;
        $plan->precio = $request->precio;
        $plan->descuento = $request->descuento;
        $plan->save();
        

        return redirect()->route('central.planes'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plan $plan)
    {
        $plan->delete();
        return redirect()->route('central.planes');
    }
}
