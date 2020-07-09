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
        return view('entreprise.create');
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
     $data['Description']=$request->Description;
     $ent=Entreprise::create($data);
     return redirect()->route('entreprise.index');
        
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
        view('entreprise.show',[ 'ent' => $ent]); 
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
        view('entreprise.edit',[ 'ent' => $ent]); 
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
         $ent->Description=$request->Description;
         $ent->save();
         return view('entreprise',['ent'=> $ent]);

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
        view('entreprise.index');
    }
}
