<?php

namespace App\Http\Controllers;

use App\Entreprise;
use App\Image;
use App\Vol;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $vols = Vol::all();
        $this->authorize('viewAny',$vols); 
        return view('vols.index',['vols' => $vols]);  // vols est la variable qui va etre utiliser dans la vue vols.index
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $entreprises = Entreprise::all(); // sert à lister les entreprises li kaynin f la table 'entreprises' pour storer "entreprise_id" ds la table vols
        
        return view('vols.create',['entreprises' => $entreprises]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data['ville_dep'] = $request->ville_dep;
        $data['ville_arr'] = $request->ville_arr;
        $data['date_dep'] = $request->date_dep;
        $data['date_arr'] = $request->date_arr;
        $data['classe'] = $request->classe;
        $data['num_places'] = $request->num_places;
        $data['entreprise_id'] = $request->entreprise_id;
        $vol = Vol::create($data);

        $this->authorize('create',$vol);
        
        if($request->hasFile('image')){  // 'image' doit etre le name de l'input du file
            $path = Storage::disk('public')->put('vol_images',$request->file('image'));
            $image = Image::create(['path' => $path]);
            $vol->image()->save($image);
        }
       
        return redirect()->route('vols.index');
        }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vol = Vol::findOrFail($id); // on cherche le vol à afficher
        return view('vols.show',[ 'vol' => $vol]); // vol est la variable qui va etre utiliser dans la vue vols.show
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vol = Vol::findOrFail($id); // on cherche le vol à editer
        
        $this->authorize('update',$vol);

        return view('vols.edit',[ 'vol' => $vol]); 
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
       
        $vol = Vol::findOrFail($id);

        $this->authorize('update',$vol);

        if($request->hasFile('image')){
            $path = Storage::disk('public')->put('vol_images',$request->file('image'));
            if($vol->image){
                Storage::delete($vol->image->path);
                $vol->image->path = $path;
                $vol->image->save();
            }
            else{
                $image = Image::create(['path' => $path]);
                $vol->image()->save($image);
            }
        }

        $vol->ville_dep  = $request->ville_dep;
        $vol->ville_arr  = $request->ville_arr;
        $vol->date_dep = $request->date_dep;
        $vol->date_arr = $request->date_arr;
        $vol->classe = $request->classe;
        $vol->num_places = $request->num_places;
        $vol->entreprise_id = $request->entreprise_id;

        $vol->save();
        
        
        return  view('vols.show',['vol' => $vol]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $vol = Vol::findOrFail($id);
        $this->authorize('delete',$vol);
        $vol->delete();
        
        return redirect()->back();
    }
}
