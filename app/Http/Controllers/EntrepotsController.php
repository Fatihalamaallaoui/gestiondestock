<?php

namespace App\Http\Controllers;
use App\Models\Entrepot;
use App\Models\Produit;
use Illuminate\Http\Request;

class EntrepotsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $entrepots = Entrepot::all();
        $cityentrepots = Entrepot::get('ville');
   
       

        return view('entrepots.index')->with([
            'entrepots' => $entrepots,'cityentrepots'=>$cityentrepots
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('entrepots.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          $this->validate($request, [
            'id' => 'required',
            'ville' => 'required',
            'adresse' => 'required',
            'phone' => 'required',
            
        ]);
        $data = $request->except(['_token']);
        Entrepot::create($data);
        return redirect()->route("entrepots.index")->with([
            "success" => "Entrepot added successfully"
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
         $entrepots= Entrepot::where('id', $id)->first();
         $produitentrepot = Produit::where('entrepot_id',$id)->get();
        $sommeqtyproduit = Produit::where('entrepot_id',$id)->sum('quantity');
       
        return view("entrepots.show")->with([
            "entrepots" => $entrepots,"produitentrepot"=>$produitentrepot,
            "sommeqtyproduit"=>$sommeqtyproduit
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
          $entrepots = Entrepot::where('id', $id)->first();
        return view("entrepots.edit")->with([
            "entrepots" => $entrepots
        ]);
    }

    /**s
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
             $entrepots = Entrepot::where('id', $id)->first();
        
        $request->validate([
           'id' => 'required',
            'ville' => 'required',
            'adresse' => 'required',
            'phone' => 'required',
            
             ]);
          $data = $request->except(['_token', '_method']);
          Entrepot::whereId($id)->update($data);
            return redirect()->route("entrepots.index")->with([
            "success" => "Entrepôt updated successfully"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $entrepots = Entrepot::all();
         
        $entrepots = Entrepot::where('id', $id)->first();
        $entrepots->delete();
        $entrepots = Entrepot::all();
        return view('entrepots.index')->with([
            'entrepots' => $entrepots ,
            'message'=> 'Successfully deleted!!'
        ]);
    }


    public function getbycity($city)
    {
        $cityentrepots = Entrepot::get('ville');
        
 
        $entrepots = Entrepot::where('ville',$city)->get();
 
       
 
       
 
        if($entrepots)
        {
         
       
            return view('entrepots.index')->with([
                'entrepots' => $entrepots,'cityentrepots'=>$cityentrepots
            ]);
     
     }
    }


}
