<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Session;

class LoginController extends BaseController
{
    public function login_form()
    {
        if(Session::get('user_id'))
        {
            return redirect('home');
        }
        $error=Session::get('error');
        Session::forget('error');
        return view('login')->with('error',$error);
    }

    public function do_login()
    {
        if(Session::get('user_id'))
        {
            return redirect('home');
        }
        //validazione campi
        if(strlen(request('username'))==0 || strlen(request('password'))==0 )
        {
            Session::put('error',"campi_vuoti");
            return redirect('login')->withInput();
        }
        $user=User::where('username',request('username'))->first() ; 
        if(!$user || !password_verify(request('password'),$user->password))
        {
            Session::put('error',"errato");
            return redirect('login')->withInput();

        }
        //se va tutto bene
        return "ok";

        //Effettuo il login
        Session::put('user_id',user->id);

        //torniamo alla home
        return redirect('home');

    }
    public function register_form()
    {
        if(Session::get('user_id'))
        {
            return redirect('home');
        }
        $error=Session::get('error');
        Session::forget('error');
        return view('register')->with('error',$error);
    }

    public function do_register()
    {
        if(Session::get('user_id'))
        {
            return redirect('home');
        }
        //validazione campi
        if(strlen(request('username'))==0 || strlen(request('password'))==0 || strlen(request('nome'))==0 ||strlen(request('cognome'))==0
        || strlen(request('email'))==0 )
        {
            Session::put('error',"campi_vuoti");
            return redirect('register')->withInput();
        }
        else if(request('password') != request('confermaPassword'))
        {
            Session::put('error',"non_coincidono");
            return redirect('register')->withInput();

        }
        else if(User::where('username',request('username'))->first())
        {
            Session::put('error',"già_esistente");
            return redirect('register')->withInput();

        }
        //se va tutto bene
        return "ok";

        //creazione utente
        $user= new User;
        $user->nome=request('nome');
        $user->cognome=request('cognome');
        $user->email=request('email');
        $user->username=request('username');
        $user->password=password_hash(request('password'),PASSWORD_BCRYPT);
        $user->save();

        //Effettuo il login
        Session::put('user_id',user->id);

        //torniamo alla home
        return redirect('home');

    }

    public function logout()
    {
        //elimino sessione
        Session::flush();
        return redirect ('login');
    }
}
