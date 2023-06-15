<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inscricao;
use App\Models\Eventos;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class Inscrito extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $eventos_id = $user->inscricoes->pluck('eventos_id')->toArray();
        $eventos = Inscricao::select('eventos.*', 'inscricoes.*')
        ->join('eventos', 'eventos.id', '=', 'inscricoes.eventos_id')
        ->whereIn('eventos.id', $eventos_id)
        ->get();

        return view('inscricoes.index', compact('eventos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $eventos = Eventos::all();
        $usuarios = User::all();
        return view('inscricao.create', compact('eventos', 'usuarios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id = $request->user()->id;
        $evento_id = $request->input('id');

        Inscricao::create([
            'users_id' => $user_id,
            'eventos_id' => $evento_id,
        ]);

        return back()->with('success', 'Inscrição realizada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $inscricao = Inscricao::find($id);
        return view('inscricao.show', compact('inscricao'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $inscricao = Inscricao::find($id);
        $eventos = Eventos::all();
        $usuarios = User::all();
        return view('inscricao.edit', compact('inscricao', 'eventos', 'usuarios'));
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
        $inscricao = Inscricao::find($id);
        $inscricao->update($request->all());
        return redirect()->route('inscricao.show', $inscricao->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $inscricao = Inscricao::find($id);
        $inscricao->delete();
        return back()->with('success', 'Inscrição removida com sucesso!');
    }
}
