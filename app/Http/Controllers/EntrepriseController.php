<?php

namespace App\Http\Controllers;

use App\Entreprise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EntrepriseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ents=Entreprise::all();
        return view('entreprise.index',['ents'=>$ents]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::check()){
        if(auth()->user()->is_admin == false  )
            {
                return redirect('/entreprise');
            }
        }
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
        if(auth()->user()->is_admin == false  )
            {
                return redirect('/entreprise');
            }
     $data['Nom']=$request->Nom;
     $data['Description']=$request->Description;
     $data['user_id'] =auth()->user()->id;
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
        return view('entreprise.show',[ 'ent' => $ent]); 
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
        if(auth()->user()->id != $ent->user_id)
            {
                return redirect('/entreprise');
            }
            else{
        return view('entreprise.edit',[ 'ent' => $ent]);}
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
         if(auth()->user()->id !== $ent->user_id)
            {
                return redirect('/entreprise');
            }

         $ent->Nom=$request->Nom;
         $ent->Description=$request->Description;
         $ent->user_id =auth()->user()->ent;
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
      if(auth()->user()->id != $ent->user_id)
            {
                return redirect('/entreprise');
            }
            else{
      $ent->delete();
        return
        view('entreprise.index');}
    }
   
}

