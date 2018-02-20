<?php

namespace App\Http\Controllers;

use App\Verb;
use Illuminate\Http\Request;
use Alert;


class VerbsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$verbs=Verb::orderBy('id','ASC')->paginate(6);
        return view('admin.verbs.index');

    }
    public function listar(){
        $verbs=Verb::orderBy('id','ASC')->get();
        return $verbs;
    }
    public function eliminar(Request $request){
        $verb=Verb::find($request->id)->delete();
        if($verb){
          $data=[
              'status'=>'1',
              'msg'=>'success'
          ];
      }else{
          $data=[
              'status'=>'0',
              'msg'=>'fail'
          ];
      }
        return $data;
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
        $verb=Verb::where('verb','=',$request->verb)->get();
        $verbPresent=Verb::where('present','=',$request->present)->get();
        $verbGerund=Verb::where('gerund','=',$request->gerund)->get();
        $verbPast=Verb::where('past','=',$request->past)->get();
        $verbParticiple=Verb::where('participle','=',$request->participle)->get();
        $respuesta="";
        $existe=false;
        if(count($verb)>0){
          $respuesta.="Verb ".$request->verb." ya existe \n";
          $existe=true;
        }
        if(count($verbPresent)>0){
          $respuesta.="Verb ".$request->present." ya existe \n";
          $existe=true;
        }
        if(count($verbGerund)>0){
          $respuesta.="Verb ".$request->gerund." ya existe \n";
          $existe=true;
        }
        if(count($verbPast)>0){
          $respuesta.="Verb ".$request->past." ya existe \n";
          $existe=true;
        }
        if(count($verbParticiple)>0){
          $respuesta.="Verb ".$request->participle." ya existe \n";
          $existe=true;
        }
        if($existe){
          $data=['status'=>'0' , 'res'=>$respuesta];
          return  $data;
        }else{
          $data=['status'=>'1'];
          $verb= new Verb($request->all());
          $verb->save();
          return  $data;
        }
    }
    public function getVerb(Request $request)
    {
        if ($request->ajax()) {
        $verb=Verb::where('id','=',$request->id)->get();
        return $verb;
      }

    }
    public function storeAjax(Request $request)
    {
        $verb= new Verb($request->all());
        $verb->save();
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

     public function guardarVerbo(Request $request)
     {
       $verb=Verb::where('verb','=',$request->verb)
                   ->where('id','!=',$request->id)->get();
       $verbPresent=Verb::where('present','=',$request->present)
                         ->where('id','!=',$request->id)->get();
       $verbGerund=Verb::where('gerund','=',$request->gerund)
                         ->where('id','!=',$request->id)->get();
       $verbPast=Verb::where('past','=',$request->past)
                       ->where('id','!=',$request->id)->get();
       $verbParticiple=Verb::where('participle','=',$request->participle)
                           ->where('id','!=',$request->id)->get();
       $respuesta="";
       $existe=false;
       if(count($verb)>0){
         $respuesta.="Verb ".$request->verb." ya existe \n";
         $existe=true;
       }
       if(count($verbPresent)>0){
         $respuesta.="Verb ".$request->present." ya existe \n";
         $existe=true;
       }
       if(count($verbGerund)>0){
         $respuesta.="Verb ".$request->gerund." ya existe \n";
         $existe=true;
       }
       if(count($verbPast)>0){
         $respuesta.="Verb ".$request->past." ya existe \n";
         $existe=true;
       }
       if(count($verbParticiple)>0){
         $respuesta.="Verb ".$request->participle." ya existe \n";
         $existe=true;
       }
       if($existe){
           $data=['status'=>'0' , 'res'=>$respuesta];
           return $data;
       }else{
         $verb=Verb::find($request->id);
         $verb->fill($request->all());
         $verb->save();
        $data=['status'=>'1'];
        return $data;
       }
     }
    public function update(Request $request, $id)
    {
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
