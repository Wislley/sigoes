<?php

namespace App\Http\Controllers;

use App\Models\TipoOcorrencia;
use Exception;
use Illuminate\Http\Request;

class TipoOcorrenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tiposOcorrencia = TipoOcorrencia::all();
        return view('tipos_ocorrencia.index', compact('tiposOcorrencia'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tipos_ocorrencia.form');
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
            $tipoOcorrencia = TipoOcorrencia::create($request->all());
            $response = [
                'status' => true,
                'mensagem' => 'Tipo de OcorrĂȘncia cadastrado com sucesso',
                'tipoOcorrencia' => $tipoOcorrencia
            ];
        } catch (Exception $ex) {
            Log::error([
                'msg' => $ex->getMessage(),
                'linha' => $ex->getLine()
            ]);

            $response = [
                'status' => false,
                'erro' => 'Ocorreu um erro ao cadastrar o Tipo de OcorrĂȘncia',
            ];
        }

        if ($response['status'] == false)
            return redirect()->back()->with($response);

        return redirect()->route('tipos_ocorrencia.index')->with($response);
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
    public function edit($id)
    {
        $tipoOcorrencia = TipoOcorrencia::find($id);
        return view('tipos_ocorrencia.form', compact('tipoOcorrencia'));
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
            $tipoOcorrencia = TipoOcorrencia::find($id);
            $tipoOcorrencia->update($request->all());

            $response = [
                'status' => true,
                'mensagem' => 'Tipo de OcorrĂȘncia atualizado com sucesso'
            ];
        } catch (Exception $ex) {
            Log::error([
                'msg' => $ex->getMessage(),
                'linha' => $ex->getLine()
            ]);

            $response = [
                'status' => false,
                'erro' => 'Ocorreu um erro ao atualizar o Tipo de OcorrĂȘncia',
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
