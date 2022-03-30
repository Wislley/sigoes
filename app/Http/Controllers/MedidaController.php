<?php

namespace App\Http\Controllers;

use App\Models\Medida;
use Illuminate\Http\Request;

class MedidaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medidas = Medida::all();
        return view('medidas.index', compact('medidas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('medidas.form');
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
            $medida = Medida::create($request->all());
            $response = [
                'status' => true,
                'mensagem' => 'Medida cadastrada com sucesso',
                'medida' => $medida
            ];
        } catch (Exception $ex) {
            Log::error([
                'msg' => $ex->getMessage(),
                'linha' => $ex->getLine()
            ]);

            $response = [
                'status' => false,
                'erro' => 'Ocorreu um erro ao cadastrar Medida',
            ];
        }

        if ($response['status'] == false)
            return redirect()->back()->with($response);

        return redirect()->route('medidas.index')->with($response);
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
        $medida = Medida::find($id);
        return view('medidas.form', compact('medida'));
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
            $medida = Medida::find($id);
            $medida->update($request->all());

            $response = [
                'status' => true,
                'mensagem' => 'Medida atualizada com sucesso'
            ];
        } catch (Exception $ex) {
            Log::error([
                'msg' => $ex->getMessage(),
                'linha' => $ex->getLine()
            ]);

            $response = [
                'status' => false,
                'erro' => 'Ocorreu um erro ao atualizar Medida',
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
