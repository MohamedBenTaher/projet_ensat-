<?php

namespace App\Http\Controllers;

use App\Entreprise;
use Illuminate\Http\Request;

class EntrepriseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ent=Entreprise::all();
        return view('ent.index',['ent'=>$ent]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Entreprise.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     $data['Nom']=$request->Nom;
     $data['description']=$request->description;
     $ent=Entreprise::create($data);
     return redirect()->route('entreprises.index');
        
    }

    /**
     * Disp'lay the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ent= Entreprise::findOrFail($id);  
        return 
        view('Entreprise.show',[ 'ent' => $ent]); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ent = Entreprise::findOrFail($id); 
        return
        view('Entreprise.edit',[ 'ent' => $ent]); 
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
         $ent=Entreprise::findOrFail($id);
         $ent->Nom=$request->Nom;
         $ent->description=$request->description;
         $ent->save();
         return view('Entreprise',['ent'=> $ent]);

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $ent=Entreprise::findOrFail($id);
      $ent->delete();
        return
        view('Entreprise.index');
    }
}
