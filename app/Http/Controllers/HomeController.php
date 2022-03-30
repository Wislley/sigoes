<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\Escola;
use App\Models\Ocorrencia;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $usuario = User::find(Auth::id());
        $ocorrencias = 0;
        $escolas = 0;
        $diretores = 0;

        if ($usuario->hasRole('diretor')) {
            $ocorrencias = Ocorrencia::whereHas('escola', function ($query) use ($usuario) {
                $query->where('user_id', $usuario->id);
            })->count();
        }

        if ($usuario->hasRole('admin')) {
            $escolas = Escola::count();
            $diretores = User::whereHas("roles", function($q){ $q->where("name", "diretor"); })
            ->count();
        }

        return view('home', compact('ocorrencias', 'escolas', 'diretores', 'usuario'));
    }
}
