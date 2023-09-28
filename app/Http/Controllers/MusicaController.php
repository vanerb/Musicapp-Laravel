<?php

namespace App\Http\Controllers;

use App\Models\Musica;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MusicaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $musica = Musica::where('id_usuario', '=', auth()->user()->id)->get();
        return view('musica.index', ['musicas' => $musica]);
    }

    public function allmusic(){
        $musica = Musica::all();
        return view('musica.all', ['musicas' => $musica]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|min:3',
            'pista'=>'required'
        ]);

        $musica = new Musica();

        $musica->name = $request->name;
        $musica->id_usuario = auth()->user()->id;

       if ($request->hasFile('pista')) {
            $imagePath = $request->file('pista')->store('public');
            $musica->pista = str_replace('public/', '', $imagePath);
        } else {
            $musica->pista = $request->pista;
        }

        $musica->save();
        return redirect()->route('musica.index')->with('success', 'Musica agregada correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $musica = Musica::find($id);

        return view('musica.show', ['musica'=>$musica]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $musica = Musica::find($id);
        $musica->name = $request->name;
        $musica->id_usuario = auth()->user()->id;

        if($request->hasFile('pista')){
            $prviousMusic = $musica->pista;

            $musica->pista = $request->file('pista')->store('public');
            $musica->pista = str_replace('public/', '', $musica->pista);

            $isImageInUse = Musica::where('pista', $prviousMusic)->where('id', '!=', $musica->id)->exists();
            if (!$isImageInUse) {
                Storage::delete('public/' . $prviousMusic);
            }
        }

        $musica->save();
        return redirect()->route('musica.index')->with('success', 'Musica actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $musica = Musica::find($id);
        $prviousMusic = $musica->pista;
        $isImageInUse = Musica::where('pista', $prviousMusic)->where('id', '!=', $musica->id)->exists();
        if (!$isImageInUse) {
            Storage::delete('public/' . $prviousMusic);
        }
        $musica->delete();
        return redirect()->route('musica.index')->with('success', 'Musica eliminada correctamente');
    }
}
