<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\Escola;
use App\Models\Medida;
use App\Models\Ocorrencia;
use App\Models\TipoOcorrencia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OcorrenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $escolas = Escola::all()->pluck('nome', 'id');
        $escolas = $escolas->prepend('Selecione uma escola', '')->toArray();
        $turnos = Ocorrencia::turnos;

        if ($request->all()) {
            $ocorrencias = Ocorrencia::where(function($query) use ($request) {
                if ($request->nome_aluno) {
                    $query->orWhereHas('aluno', function($q) use ($request) {
                        $q->where('nome', 'like', '%'. $request->nome_aluno . '%');
                    });
                }

                if ($request->created_at) {
                    $query->orWhere('created_at', $request->created_at);
                }

                if ($request->escola) {
                    $query->where('escola_id', $request->escola);
                }

            })->orderByDesc('created_at')->paginate(10);
            return view('ocorrencias.index', compact('ocorrencias', 'escolas', 'turnos'));
        }

        return view('ocorrencias.index', compact('escolas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $escolas = Escola::all()->pluck('nome', 'id');
        $alunos = Aluno::all()->pluck('nome', 'id');
        $user = Auth::user();

        $tiposOcorrencia = TipoOcorrencia::whereStatus(true)
            ->get()
            ->pluck('nome', 'id');
        $medidas = Medida::whereStatus(true)
            ->get()
            ->pluck('nome', 'id');

        return view('ocorrencias.form', compact('escolas', 'alunos', 'tiposOcorrencia', 'medidas', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $ocorrencia = Ocorrencia::create($request->all());
            $response = [
                'status' => true,
                'mensagem' => 'Ocorrência cadastrada com sucesso',
                'aluno' => $ocorrencia
            ];
        } catch (Exception $ex) {
            Log::error($ex->getMessage());
            $response = [
                'status' => false,
                'erro' => 'Ocorreu um erro ao cadastrar a Ocorrência, verifique os dados e tente novamente'
            ];
        }

        if ($response['status'] == false)
            return redirect()->back()->with($response);

        return redirect()->route('ocorrencias.show', $ocorrencia->id)->with($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ocorrencia  = Ocorrencia::find($id);
        $turnos = Ocorrencia::turnos;
        return view('ocorrencias.visualizar', compact('ocorrencia', 'turnos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
