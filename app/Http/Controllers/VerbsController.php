<?php

namespace App\Http\Controllers;

use App\Verb;
use Illuminate\Http\Request;


class VerbsController extends Controller
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
        return view('admin.verbs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $verb= new Verb($request->all());
        $verb->save();
        dd('guardado');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Verb  $verb
     * @return \Illuminate\Http\Response
     */
    public function show(Verb $verb)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Verb  $verb
     * @return \Illuminate\Http\Response
     */
    public function edit(Verb $verb)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Verb  $verb
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Verb $verb)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Verb  $verb
     * @return \Illuminate\Http\Response
     */
    public function destroy(Verb $verb)
    {
        //
    }
}
