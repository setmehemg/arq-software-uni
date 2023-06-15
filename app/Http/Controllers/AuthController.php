<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Usuarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function index()
    {
        if (Auth::check())
        {
            return redirect()->intended('/');
        }
        else
        {
            return view('login');
        }
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required'
        ],
        $messages = [
            'username.required' => 'O campo "usuário" é obrigatório.',
            'password.required' => 'O campo "senha" é obrigatório.'
        ]);

        if ( $validator->fails() ) {
            return back()->withErrors($validator)->withInput($request->all());
        }

        $credentials = $validator->validated();
        try {
            if (Auth::attempt($credentials)) 
            {
                $request->session()->regenerate();

                return redirect('/');
            }

            return back()->withErrors([
                'username' => 'A credencial fornecida está incorreta.',
            ])->onlyInput('username');

        } catch (\Exception $e) {
            Log::error('[AuthController]: '.$e);
        }
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();

        return redirect('/');
    }

    public function indexRegistro()
    {
        if (Auth::check())
        {
            return redirect()->intended('/');
        }
        else
        {
            return view('register');
        }
    }

    public function registro(Request $request)
    {
        $username_exist = User::whereRaw('lower(username) = ?', array(strtolower($request->input('username'))))->exists();
       
        if ( !$username_exist)
        {    
            //Cria o usuário
            $this->create(array(
                'name' => $request->input('name'),
                'username' => $request->input('username'),
                'password' => $request->input('password'),
            ));
        }
        else
        {
            return back()->withErrors('Este usuário Já existe!')->withInput();
        }

        $myuser = User::whereRaw('lower(username) = ?', array(strtolower($request->input('username'))))->first();

        Auth::login($myuser);

        return redirect('/');
    }

    /**
     * Create a new username instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $username = User::create([
            'name' => $data['name'],
            'username' => $data['username'],
            'password' => bcrypt($data['password']),
        ]);

        // return redirect()->route('usuario.perfil', ['username' => $username->username]);
    }

    public function home()
    {
        return view('home');
    }
}