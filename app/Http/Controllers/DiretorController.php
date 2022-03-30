<?php

namespace App\Http\Controllers;

use App\Models\Escola;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DiretorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $diretores = User::whereHas("roles", function($q){ $q->where("name", "diretor"); })
            ->paginate(10);

        return view('diretores.index', compact('diretores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $escolas = Escola::whereNull('user_id')
            ->get()
            ->pluck('nome', 'id');

        return view('diretores.form', compact('escolas'));
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
            $diretor = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            $diretor->assignRole('diretor');

            if (isset($request->escola_id)) {
                $escola = Escola::find($request->escola_id);
                $escola->update(
                    ['user_id' => $diretor->id ]
                );
            }

            $response = [
                'status' => true,
                'mensagem' => 'Diretor cadastrado com sucesso'
            ];

        } catch (Exception $ex) {
            Log::error([
                'erro' => $ex->getMessage(),
                'linha' => $ex->getLine()
            ]);
        }

        if ($response['status'] == false)
            return redirect()->back()->with($response);

        return redirect()->route('diretores.index')->with($response);
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
        $escolas = Escola::where('user_id', $id)
            ->orWhereNull('user_id')
            ->get()
            ->pluck('nome', 'id');
        $diretor = User::find($id);

        return view('diretores.form', compact('diretor', 'escolas'));
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
            $diretor = User::find($id);
            $data = $request->all();
            $data['password'] =  Hash::make($request->password);
            $diretor->update($data);

            if (isset($request->escola_id)) {
                $escola = Escola::find($request->escola_id);
                $escola->update(
                    ['user_id' => $diretor->id ]
                );
            }

            $response = [
                'status' => true,
                'mensagem' => 'Diretor atualizado com sucesso'
            ];
        } catch (Exception $ex) {
            Log::error($ex->getMessage());
            $response = [
                'status' => false,
                'erro' => 'Ocorreu um erro ao atualizar o diretor, verifique os dados e tente novamente'
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
