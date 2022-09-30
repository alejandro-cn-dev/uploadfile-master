<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class SessionsController extends Controller
{
    public function create(){
        return view('auth.login');
    }
    public function store(){
        if(auth()->attempt(request(['email','password'])) == false){
            return back()->withErrors([
                'message' => 'Email o contraseña incorrectos, porfavor intente otra vez'
            ]);
        }else{
            if(auth()->user()->role == 'admin'){
                //return redirect()->route('admin.index');
                return redirect()->route('admin.index');
            }else if(auth()->user()->role == 'client'){
                return redirect()->route('client.index');
            }else{
                return redirect()->to('/');
            }
        }
        return redirect()->to('/');
    }
    public function destroy(){
        auth()->logout();
        return redirect()->to('/');
    }
}
