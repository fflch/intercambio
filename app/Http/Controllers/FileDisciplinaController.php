<?php

namespace App\Http\Controllers;

use App\Models\FileDisciplina;
use Illuminate\Http\Request;

class FileDisciplinaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $request->file('file')->getClientMimeType();

        $request->validate([

            'file'     => 'required|mimes:pdf|max:10000',
            'disciplina_id' => 'required|integer|exists:disciplinas,id'
        ]);
        $file = new FileDisciplina;
        $file->disciplina_id = $request->disciplina_id;
        $file->original_name = $request->file('file')->getClientOriginalName();
        $file->path = $request->file('file')->store('.');
        $file->save();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FileDisciplina  $fileDisciplina
     * @return \Illuminate\Http\Response
     */
    public function show(FileDisciplina $fileDisciplina)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FileDisciplina  $fileDisciplina
     * @return \Illuminate\Http\Response
     */
    public function edit(FileDisciplina $fileDisciplina)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FileDisciplina  $fileDisciplina
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FileDisciplina $fileDisciplina)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FileDisciplina  $fileDisciplina
     * @return \Illuminate\Http\Response
     */
    public function destroy(FileDisciplina $fileDisciplina)
    {
        //
    }
}
