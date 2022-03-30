<?php

namespace App\Http\Controllers;

use App\Models\Escola;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class EscolaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $escolas = Escola::orderBy('nome')->get();
        return view('escolas.index', compact('escolas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('escolas.form');
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
            $escola = Escola::create($request->all());
            $response = [
                'status' => true,
                'mensagem' => 'Escola cadastrada com sucesso'
            ];
        } catch (Exception $ex) {
            Log::error($ex->getMessage());
            $response = [
                'status' => false,
                'erro' => 'Ocorreu um erro ao cadastrar a escola, verifique os dados e tente novamente'
            ];
        }

        if ($response['status'] == false)
            return redirect()->back()->with($response);

        return redirect()->route('escolas.index')->with($response);
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
        $escola = Escola::find($id);
        return view('escolas.form', compact('escola'));
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
            $escola = Escola::find($id);
            $escola->update($request->all());
            $response = [
                'status' => true,
                'mensagem' => 'Escola atualizada com sucesso'
            ];
        } catch (Exception $ex) {
            Log::error($ex->getMessage());
            $response = [
                'status' => false,
                'erro' => 'Ocorreu um erro ao atualizar a escola, verifique os dados e tente novamente'
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
