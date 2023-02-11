<?php

namespace App\Http\Controllers;

use App\Models\Libros;
use App\Models\Autores;
use Illuminate\Http\Request;

class ControladorLibros extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Libros::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'titulo' => 'required|max:50|alpha',
            'f_publicacion' => 'nullable|date_format:d/m/Y',
            ]);
    
            Libros::create($request->all());
            return redirect('/libros');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Libros  $libros
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Libros::with('autor')->find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Libros  $libros
     * @return \Illuminate\Http\Response
     */
    public function edit(Libros $libros)
    {
        //
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        if(preg_match('/^[a-zA-Z\s]+$/', $query)) {
            return Libros::where('titulo', 'LIKE', "%{$query}%")->get();
        } else {
            return "Error: el parametro query debe contener solo letras.";
        }
        
    }

    public function searchVista()
    {
        return view('search-vista');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Libros  $libros
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Libros $libros)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Libros  $libros
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        {
            $libro = Libros::find($id);
            $libro->delete();
            return redirect('/libros');
        }
    }
}
