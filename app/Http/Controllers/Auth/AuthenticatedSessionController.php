<?php

namespace App\Http\Controllers\Auth;

use App\Events\RegistrarBitacora;
use App\Events\tenant\RegistrarBitacoraTenant;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        if (empty(tenant('id')))
            return view('central.auth.login');
        else
            return view('tenant.auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();

        // Auth::user()->session->get('ip_address');

        if(empty(tenant('id')))
            event(new RegistrarBitacora([
                'accion' => 'Inició sesión el usuario: '.Auth::user()->name
            ])); 
        else
            event(new RegistrarBitacoraTenant([
                'accion' => 'Inició sesión el usuario: '.Auth::user()->name,
            ]));
            
        
        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::getHome());
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        if(empty(tenant('id')))
            event(new RegistrarBitacora([
                'accion' => 'Cerró sesión el usuario: '.Auth::user()->name
            ])); 
        else
            event(new RegistrarBitacoraTenant([
                'accion' => 'Cerró sesión el usuario: '.Auth::user()->name
            ]));

        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $tenant = tenant('id');

        if (empty($tenant))
            return redirect('/');
        else
            return redirect($tenant . '/login');
    }
}
