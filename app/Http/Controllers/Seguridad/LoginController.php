<?php

namespace App\Http\Controllers\Seguridad;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


class LoginController extends Controller
{
    use AuthenticatesUsers;
    protected $redirectTo = '/';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

     
    public function index()
    {
        return view('seguridad.index');
    }

    
    
    protected function authenticated(Request $request, $user)
    {   
        $roles1 = $user->roles1()->get();
        if ($roles1->isNotEmpty()) {
            $user->setSession();
        }else{
            $this->guard()->logout();
            $request->session()->invalidate();
            return redirect('seguridad/login')->withErrors(['error'=>'Este usuario no tiene rol activo']);
        }
    }

    public function username()
    {
        return 'usuario';
    }
}
