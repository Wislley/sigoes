<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use Illuminate\Http\Request;

class AlunoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->busca) {
            $alunos = Aluno::where('nome', 'like', '%' . $request->busca . '%')
                ->orWhere('codigo', 'like', '%' . $request->busca . '%')
                ->get();
                return view('alunos.index', compact('alunos'));
        }

        return view('alunos.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('alunos.form');
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
            $aluno = Aluno::create($request->all());
            $response = [
                'status' => true,
                'mensagem' => 'Aluno cadastrado com sucesso',
                'aluno' => $aluno
            ];
        } catch (Exception $ex) {
            Log::error($ex->getMessage());
            $response = [
                'status' => false,
                'erro' => 'Ocorreu um erro ao cadastrar o Aluno, verifique os dados e tente novamente'
            ];
        }

        if ($response['status'] == false)
            return redirect()->back()->with($response);

        return redirect()->route('alunos.index')->with($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $aluno = Aluno::find($id);
        return view('alunos.form', compact('aluno'));
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
        try {
            $aluno = Aluno::find($id);
            $aluno->update($request->all());
            $response = [
                'status' => true,
                'mensagem' => 'Aluno atualizado com sucesso'
            ];
        } catch (Exception $ex) {
            Log::error($ex->getMessage());
            $response = [
                'status' => false,
                'erro' => 'Ocorreu um erro ao atualizar o Aluno, verifique os dados e tente novamente'
            ];
        }

        return redirect()->back()->with($response);
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
